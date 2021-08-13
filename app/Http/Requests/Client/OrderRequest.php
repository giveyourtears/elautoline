<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'index' => '"Индекс"',
            'fio' => '"ФИО"',
            'number' => '"Номер телефона"',
            'inst_nickname' => '"Ник в instagram"',
            'city' => '"Город"',
            'address' => '"Адрес"',
            'boobs_size' => '"Обхват груди"',
            'under_boobs_size' => '"Обхват под грудью"',
            'waist_size' => '"Обхват талии"',
            'hips_size' => '"Обхват бедер"',
            'bra_size' => '"Размер лифа"',
            'price' => '"Стоимость"',
            'where_order' => '"Где Вы делали заказ"'
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
            'fio' => "required|string|max:255",
            'number' => "required|string|max:255",
            'number2' => "nullable",
            'inst_nickname' => "required|string|max:255",
            'city' => "required|string",
            'address' => "required|string",
            'index' => "required|string",
            'pvz' => "nullable",
            'type' => "string|max:255",
            'boobs_size' => "required|string|max:255",
            'under_boobs_size' => "required|string|max:255",
            'waist_size' => "required|string|max:255",
            'hips_size' => "required|string|max:255",
            'bra_size' => "required|string|max:255",
            'boobs_type' => "nullable",
            'price' => "required|string|max:255",
            'where_order' => "required|string|max:255",
            'about_us' => "nullable"
        ];
    }
}
