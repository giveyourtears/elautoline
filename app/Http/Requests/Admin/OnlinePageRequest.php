<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OnlinePageRequest extends FormRequest
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
            'price_start' => 'Начальная цена',
            'price_end' => 'Конечная цена',
            'fee' => 'Аукционный сбор'
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
            'price_start' => "required|numeric",
            'price_end' => "required|numeric",
            'fee' => "required|numeric",
            'type' => "string|max:255"
        ];
    }
}
