<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
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
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'   => 'integer|required',
            'name'          => 'required',  
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Categoría es requerida',
            'category_id.integer'  => 'Categoría es requerida INT',
            'name.required'        => 'Nombre de la subcategoría es abligatorio',
        ];
    }
}
