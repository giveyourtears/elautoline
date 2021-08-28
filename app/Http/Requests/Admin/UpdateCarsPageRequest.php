<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarsPageRequest extends FormRequest
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

    public function attributes()
    {
        return [
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "string|max:255",
            'price' => "string|max:255",
            'mileage' => "string|max:255",
            'description' => "string|max:255",
            'volume' => "string|max:255",
            'year' => "string|max:255",
            'type' => "string|max:255"
        ];
    }
}
