<?php

namespace ThangNT\HelloWorldPackage\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ThangNT\HelloWorldPackage\Services\CouponService;
// use App\Services\CartService;

use ThangNT\HelloWorldPackage\Models\Coupon;
// use Cart;

class CouponsController extends Controller
{
    public function __construct(CouponService $service
        // TODO: Temporary comment
        // , CartService $cartService
        )
    {
        $this->service = $service;
        // TODO: Temporary comment
        // $this->cartService = $cartService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Check coupon is exist in cart
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        // // Validate data
        // // App\Libs\FrontEnd\Coupon\CheckCouponValidator
        // if ($validate = $this->validateDataApiWebForm($request->all(), 'FrontEnd\Coupon\CheckCouponValidator'))
        //     return $validate;

        // Check exist coupon
        $coupon = $this->service->checkCouponCode(trim($request->code));
        if (!$coupon)
            return $this->respondErrorJsonAjax('Coupon is not exist');

        // Check coupon is expired
        if (strtotime($coupon->expired_date) < time()) {
            return $this->respondErrorJsonAjax('Coupon is expired !');
        }

        // // Check coupon used by current customer
        // if ($this->service->checkCouponUsed($coupon))
        //     return $this->respondErrorJsonAjax('Coupon is applied success in other order. Can\'t continue to use.', $coupon);

        // TODO: Temporary comment
        // // TODO: Push this to Event Model
        // $this->cartService->addCoupon($coupon);

        return $this->respondSuccessJsonAjax('Apply Success.', $coupon);
    }

    /**
     * Remove coupon from cart
     *
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        // Validate data
        // App\Libs\FrontEnd\Coupon\CheckCouponValidator
        if ($validate = $this->validateDataApiWebForm($request->all(), 'FrontEnd\Coupon\CheckCouponValidator'))
            return $validate;

        $coupon = $this->service->checkCouponCode(trim($request->code));
        if (!$coupon) {
            return $this->respondErrorJsonAjax('Coupon is not exist');
        }

        // // TODO: Temporary comment
        // // TODO: Push this to Event Model
        // $this->cartService->removeCoupon($coupon);

        return $this->respondSuccessJsonAjax('Remove Success');
    }



}







