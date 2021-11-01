<?php

namespace App\Http\Requests\Admin\Employees;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesInfoRequest extends FormRequest
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
            'name' => 'required',
            'personal_email' => 'required|unique:employees_info,personal_email,' . $this->id,
            'phone' => 'required|unique:customers,email,' . $this->id,
            'birthday' => 'required',
            'address' => 'required',
            'citizen_identification' => 'required',
            'join_company_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'personal_email.required' => 'Vui lòng nhập email',
            'personal_email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'birthday.required' => 'Vui lòng nhập ngày sinh',
            'address.required' => 'Vui lòng nhập địa chỉ nơi ở',
            'citizen_identification.required' => 'Vui lòng nhập số CCCD',
            'join_company_date.required' => 'Vui lòng nhập ngày gia nhập công ty',
        ];
    }
}
