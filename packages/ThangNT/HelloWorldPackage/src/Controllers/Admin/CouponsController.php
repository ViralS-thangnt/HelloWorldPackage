<?php

namespace ThangNT\HelloWorldPackage\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ThangNT\HelloWorldPackage\Services\CouponService;

class CouponsController extends Controller
{
    public $package_name = "hello-world-package";

    public function __construct(CouponService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->service->paginated();

        if ($request->ajax() || $request->wantsJson()) {
            return $this->service->getJSONData();
        }

        return view($this->package_name . '::index')->with('items', $items);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $items = $this->service->search($request->search);
        // return view($this->package_name . '::index')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        if ($validate = $this->validateDataApiWebForm($request->all(), 'CreateUpdateCouponValidator'))
            return $validate;

        if ($result = $this->service->create($request->except('_token')))
            return $this->respondSuccessJsonAjax('Successfully created');

        return $this->respondErrorJsonAjax('Failed to create');
    }

    /**
     * Show the form for editing the coupons.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        return response()->json($data);
    }

    /**
     * Update the coupons in storage.
     *
     * @param  \Illuminate\Http\CouponRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate data
        if ($validate = $this->validateDataApiWebForm($request->all(), 'CreateUpdateCouponValidator'))
            return $validate;

        if ($this->service->update($id, $request->except('_token', '_method')))
            return $this->respondSuccessJsonAjax('Successfully updated');

        return $this->respondErrorJsonAjax('Failed to update');
    }

    /**
     * Remove the coupons from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->service->destroy($id))
            return $this->respondSuccessJsonAjax('Successfully deleted');

        return $this->respondErrorJsonAjax('Failed to delete');
    }


    /**
     * @param $message
     * @return mixed
     */
    public function respondWithError($message = 'Server Error. Something wrong is happending...')
    {
        return response()->json(apiErrorJsonFormat($message, $this->getStatusCode()), 200);
    }

    /** Helper functions for API */
    public function apiErrorJsonFormat($msg, $status)
    {
        return [
                    'data' => null,
                    'meta' => [
                        'status_code' => $status,
                        'message'     => $msg,
                    ]
                ];
    }


    /**
     * Display the users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function getJSONData()
    // {
    //     return $this->service->getJSONData();
    // }
}
