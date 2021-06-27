<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
            'district_fa'=>'required|string|max:100',
            'district_en'=>'required|string|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'district_fa'=>'نام استان',
            'district_en'=>'نام استان',
        ];
    }
}
