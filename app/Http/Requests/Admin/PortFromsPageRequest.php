<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PortFromsPageRequest extends FormRequest
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
            'name' => 'Название',
            'claipeda' => 'Цена Клайпеды',
            'minsk' => 'Цена Минск',
            'odessa' => 'Цена Одессы',
            'bremer' => 'Цена Бремерхафен',
            'poti' => 'Цена Поти',
            'price_water' => 'Цена по воде',
            'type' => 'Тип транспорта',
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
            'id' => "",
            'name' => "required|string|max:255",
            'claipeda' => "required|numeric",
            'minsk' => "required|numeric",
            'odessa' => "required|numeric",
            'bremer' => "required|numeric",
            'poti' => "required|numeric",
            'price_water' => "required|numeric",
            'type' => "required|numeric",
        ];
    }
}
