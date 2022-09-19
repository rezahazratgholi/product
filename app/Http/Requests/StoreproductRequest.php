<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'product_name'=>'required|string',
            'color'=>'required|string',
            'image'=>'image|mimes:jpg,png,svg|max:5000',
            'available'=>'required|',
            'price'=>'required|min_digits:4|max_digits:7',
        ];
    }
    public function messages()
    {
        return [

            'product_name.required'=>'مقدار اجباری میباشد',
            'image.required'=>'مقدار اجباری میباشد',
            'product_name.string'=>'صحیح وارد کنید',
            'image.string'=>'صحیح وارد کنید',
            'image.mimes'=>'فرمت باید jpg png svg باشد',
            'image.image'=>'عکس وارد کنید',
            'image.max'=>'حجم فایل باید نهایتا 5 مگ باشد',
            'available.required'=>'موجودی را مشخص کنید',
            'price.required'=>'قیمت را مشخص کنید',
            'price.min_digits'=>'قیمت باید حداقل هزار تومان باشید',
            'price.max_digits'=>'قیمت باید کمتر از ده میلیون تومان باشید',
        ];
    }
}
