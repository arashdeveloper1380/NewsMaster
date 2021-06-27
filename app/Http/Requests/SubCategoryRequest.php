<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'subcategory_fa'=>'required|max:100|string',
            'subcategory_en'=>'required|max:100|string',
        ];
    }

    public function attributes()
    {
        return [
            'subcategory_fa'=>'نام زیر دسته',
            'subcategory_fa'=>'نام لاتین زیر دسته'
        ];
    }
}
