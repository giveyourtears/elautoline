<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PointPricesPageRequest extends FormRequest
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
            'port_id' => 'Порт',
            'type_id' => 'Тип',
            'city_id' => 'Город',
            'price_city' => 'Цена город',
            'price_type' => 'Цена тип машины'
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
            'port_id' => "required|numeric",
            'type_id' => "required|numeric",
            'city_id' => "required|numeric",
            'price_city' => "required|numeric",
            'price_type' => "required|numeric"
        ];
    }
}
