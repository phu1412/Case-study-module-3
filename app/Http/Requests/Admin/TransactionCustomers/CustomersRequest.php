<?php

namespace App\Http\Requests\Admin\TransactionCustomers;

use Illuminate\Foundation\Http\FormRequest;

class CustomersRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required',
            'email' => 'required|unique:customers,email,' . $this->id,
            'phone' => 'required|unique:customers,email,' . $this->id,
            'birthday' => 'required',
            'address' => 'required',
            'citizen_identification' => 'required',
            'job' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'birthday.required' => 'Vui lòng nhập ngày sinh',
            'address.required' => 'Vui lòng nhập địa chỉ nơi ở',
            'citizen_identification.required' => 'Vui lòng nhập số CCCD',
            'job.required' => 'Vui lòng nhập nghề nghiệp',
        ];
    }
}
