<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecommentRequest extends FormRequest
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

                  'fullname'=>'required|string',
                  'email'=>'required|email',
                  'comment'=>'required|string',
              ];
    }
    public function messages()
    {
        return [

            'fullname.required'=>'مقدار اجباری میباشد',
            'email.required'=>'مقدار اجباری میباشد',
            'fullname.string'=>'صحیح وارد کنید',
            'email.string'=>'ایمیل صحیح وارد کنید',
            'comment.required'=>'مقدار اجباری میباشد',
            'comment.string'=>'مفدار اجباری میباشد',
        ];
    }
}
