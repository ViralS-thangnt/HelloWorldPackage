<?php

namespace ThangNT\HelloWorldPackage\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;
    protected $table   = "coupons";
    protected $guarded = ["id"];
    protected $dates   = ['deleted_at'];


    public function getThumbnailImage()
    {
        $link = url('') . '/images/coupons/';
        if ($img = $this->thumbnailImage) {
            return $link .= $img->name;
        }

        return getLinkNoImage();
    }

    public static function getPublicCouponActive($customerId = null)
    {
        $coupons = static::with('customers', 'thumbnailImage')
                    ->whereType(COUPON_TYPE_PUBLIC)
                    ->where('expired_date', '>', date('Y-m-d H:i:s'))
                    ->where('start_date', '<=', date('Y-m-d H:i:s'));

        // if ($customerId) {
        //     $coupons->whereHas('customers', functions($q) {
        //         $q->whereId($customerId);
        //     });
        // }

        $coupons = $coupons->get();

        return $coupons;
    }

    public static function sendCouponMailToCustomer($coupon)
    {
        foreach ($coupon->customers()->get() as $customer)
            $customer->notify(new \App\Notifications\SendCouponMailNotification($coupon));

        // foreach ($customers as $customer) {
        //     \Mail::to($customer->email)->queue(new \App\Mail\SendCouponMail($coupon));
        // }

    }

    /**
     * Relationships
     */
    public function thumbnailImage()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'coupon_customer')->withPivot('status');
    }

    // public function images()
    // {
    //     return $this->hasOne('App\Models\Team', 'id', 'team_id');
    // }


}
