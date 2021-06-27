<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubDistrictRequest extends FormRequest
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
            'subdistrict_fa'=>'required|string|max:100|unique:subdistrict',
            'subdistrict_en'=>'required|string|max:100|unique:subdistrict',
        ];
    }

    public function attributes()
    {
        return [
            'subdistrict_fa'=>'نام شهر',
            'subdistrict_en'=>'نام لاتین شهر',
        ];
    }
}
