<?php

namespace App\Http\Requests\Admin\TransactionCustomers;

use Illuminate\Foundation\Http\FormRequest;

class CardsRequest extends FormRequest
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
            'PIN' => 'required',
            'code' => 'required|unique:cards,code,' . $this->id,
            'period' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'PIN.required' => 'Vui lòng nhập mã PIN',
            'code.required' => 'Vui lòng nhập mã thẻ',
            'code.unique' => 'Mã thẻ đã tồn tại',
            'period.required' => 'Vui lòng nhập kỳ hạn thẻ',
        ];
    }
}
