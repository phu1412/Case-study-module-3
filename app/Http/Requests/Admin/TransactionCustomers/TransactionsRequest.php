<?php

namespace App\Http\Requests\Admin\TransactionCustomers;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsRequest extends FormRequest
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
            'transaction_amount' => 'required',
            'transaction_fee' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'transaction_amount.required' => 'Vui lòng nhập số tiền giao dịch',
            'transaction_fee.required' => 'Vui lòng nhập phí giao dịch',
            'content.required' => 'Vui lòng nhập nội dung giao dịch',
        ];
    }
}
