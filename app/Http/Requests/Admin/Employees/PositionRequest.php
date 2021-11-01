<?php

namespace App\Http\Requests\Admin\Employees;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'position' => 'required',
            'branch' => 'required',
            'basic_salary' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'position.required' => 'Vui lòng nhập vị trí công việc',
            'branch.required' => 'Vui lòng nhập chi nhánh',
            'basic_salary.required' => 'Vui lòng nhập lương cơ bản',
        ];
    }
}
