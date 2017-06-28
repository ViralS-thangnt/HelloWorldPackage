<?php

namespace ThangNT\HelloWorldPackage\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ShippingDetail;

class CheckCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'code' => 'required',
        ];
    }


    public function messages()
    {
        return [
            // 'code.required'   => 'Please select file to upload.',
        ];
    }

    public function response(array $errors)
    {
        return response()->json([
            'code' => 500,
            'message'  => 'Validation Fails'
        ]);
    }
}
