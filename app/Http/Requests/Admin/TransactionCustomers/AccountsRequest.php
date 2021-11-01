<?php

namespace App\Http\Requests\Admin\TransactionCustomers;

use Illuminate\Foundation\Http\FormRequest;

class AccountsRequest extends FormRequest
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
            'code' => 'required|unique:accounts,code,' . $this->id,
            'type_of_account' => 'required',
            'brand_account' => 'required',
            'amounts' => 'required',
            'place_of_creation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type_of_account.required' => 'Vui lòng nhập loại tài khoản',
            'code.required' => 'Vui lòng nhập số tài khoản',
            'code.unique' => 'Số tài khoản đã tồn tại',
            'brand_account.required' => 'Vui lòng nhập hạng tài khoản',
            'amounts.required' => 'Vui lòng nhập số dư',
            'place_of_creation.required' => 'Vui lòng nhập nơi tạo',
        ];
    }
}
