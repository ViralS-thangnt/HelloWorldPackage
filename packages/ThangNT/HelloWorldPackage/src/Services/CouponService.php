<?php

namespace ThangNT\HelloWorldPackage\Services;

use Datatables;
use Illuminate\Support\Facades\Schema;
use ThangNT\HelloWorldPackage\Models\Image;
use ThangNT\HelloWorldPackage\Models\Coupon;
// use App\Models\Customer;

class CouponService
{
    /**
     * Service Model
     *
     * @var Model
     */
    public $model;

    /**
     * Pagination
     *
     * @var integer
     */
    public $pagination;

    /**
     * Service Constructor
     *
     * @param Coupon $coupon
     */
    public function __construct(Coupon $coupon)
    {
        $this->model        = $coupon;
        $this->pagination   = env('PAGINATION', 25);
    }

    /**
     * All Model Items
     *
     * @return array
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Paginated items
     *
     * @return LengthAwarePaginator
     */
    public function paginated()
    {
        return $this->model->paginate($this->pagination);
    }

    /**
     * Search the model
     *
     * @param  mixed $payload
     * @return LengthAwarePaginator
     */
    public function search($payload)
    {
        $query = $this->model->orderBy('created_at', 'desc');
        $query->where('id', 'LIKE', '%'.$payload.'%');

        $columns = Schema::getColumnListing('coupons');

        foreach ($columns as $attribute) {
            $query->orWhere($attribute, 'LIKE', '%'.$payload.'%');
        };

        return $query->paginate($this->pagination)->appends([
            'search' => $payload
        ]);
    }

    /**
     * Create the model item
     *
     * @param  array $payload
     * @return Model
     */
    public function create($payload)
    {
        $customers = $payload['customers'];
        $originData = $payload;
        unset($payload['customers']);
        $res = $this->model->create($payload);

        // Update relationship
        $this->updateCustomerRelationship($res, $originData);

        $imageIds = json_decode($payload['images']);
        $images = \App\Models\Image::whereIn('id', $imageIds)->get();
        foreach ($images as $image) {
            $image->relation_id = $res->id;
            $image->save();
        }

        return $res;
    }

    /**
     * Find Model by ID
     *
     * @param  integer $id
     * @return Model
     */
    public function find($id)
    {
        $model = $this->model
                        ->with('customers')
                        ->with(['thumbnailImage' => function ($q) {
                            $q->select('id', 'name');
                        }])
                        ->select('id', 'code', 'discount_rate', 'discount_rate_type', 'image_id',
                         'applied', 'expired_date', 'start_date', 'status', 'type', 'images', 'customer_applied')
                        ->find($id);

        $images = json_decode($model->images);
        $model->images = Image::whereIn('id', $images)
                                ->select('id', 'name')
                                ->get();
        return $model;
    }

    /**
     * Model update
     *
     * @param  integer $id
     * @param  array $payload
     * @return Model
     */
    public function update($id, $payload)
    {
        // Update images relationship
        $imageIds = json_decode($payload['images']);
        $images = \App\Models\Image::whereIn('id', $imageIds)->get();
        foreach ($images as $image) {
            $image->relation_id = $id;
            $image->save();
        }

        // Update customer relationship
        $model = $this->find($id);
        $this->updateCustomerRelationship($model, $payload);

        unset($payload['customers']);

        return $model->update($payload);
    }

    /**
     * Destroy the model
     *
     * @param  integer $id
     * @return bool
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }


    public function getJSONData()
    {
        $items = $this->model->with('thumbnailImage')
                    ->select('id', 'code', 'discount_rate', 'discount_rate_type', 'image_id',
                         'applied', 'expired_date', 'start_date', 'status', 'type', 'images')
                    ->get();

        return Datatables::of($items)
            ->setRowId('id')
            ->make(true);

            // ->add_column('actions',function($coupon) {
            //     $actions = '<a href="javascript:void(0)" onclick="getEditCoupon('. $coupon->id .')"><i class="livicon" data-name="info" data-size="24" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>   ';

            //     $actions .= '<a href="javascript:void(0)" onclick="destroyCoupon('. $coupon->id .')"><i class="livicon" data-name="trash" data-size="24" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>';

            //     return $actions;
            // })

    }

    private function updateCustomerRelationship($model, $payload)
    {
        // Update customer relationship
        if ($payload['type'] == COUPON_TYPE_PUBLIC) return $model->customers()->sync([]);

        $customerIds = json_decode($payload['customers']);
        $model->customers()->sync($customerIds);

        \Event::fire(new \App\Events\Coupon\CouponCreatedOrUpdated($model));
        // $this->sendCouponMailToCustomer($model, Customer::whereIn('id', $customerIds)->get());
    }

    /**
     * Check coupon code is exist
     *
     * @access public
     * @author ThangNT
     * @return boolean
     */
    public function checkCouponCode($code)
    {
        return $this->model->whereCode($code)->first();
    }

    /**
     * Check coupon used by current customer
     *
     * @access public
     * @author ThangNT
     * @return boolean
     */
    public function checkCouponUsed($coupon)
    {
        $listCustomerApplied = json_decode($coupon->customer_applied);

        return in_array(\Auth::guard('customers')->user()->id, $listCustomerApplied);
    }



}
