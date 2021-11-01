<?php

namespace App\Http\Requests\Client\Tranfers;

use Illuminate\Foundation\Http\FormRequest;

class TranferRequest extends FormRequest
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
            'to_account' => 'required|exists:accounts,code',
            'amounts' => 'required|min:5',
            'content' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'to_account.required' => 'Vui lòng nhập tài khoản',
            'to_account.exists' => 'Tài khoản không tồn tại',
            'amounts.required' => 'Vui lòng nhập số tiền',
            'amounts.min' => 'Số tiền không hợp lệ',
            'content.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
