<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentRequest extends FormRequest
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
            'address' => 'required',
            'objectif' => 'required',
            'amount' => 'required|integer|min:10000',
            'group' => 'required',
            'period1' => 'required',
            'number' => 'required',
            'income' => 'required',
            'business_plan' => 'mimes:csv,txt,xlx,xls,pdf|max:2048'
        ];
    }
}
