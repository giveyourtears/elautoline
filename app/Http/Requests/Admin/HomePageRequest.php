<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomePageRequest extends FormRequest
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
            'id' => "",
            'main_title' => "required|string|max:255",
            'main_cover' => "image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            'hips_cover' => "image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            'waist_cover' => "image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            'main_subtitle' => "required|string|max:255",
            'fio_title' => "required|string|max:255",
            'fio_subtitle' => "required|string|max:255",
            'number_title' => "required|string|max:255",
            'number_subtitle' => "required|string",
            'number_title2' => "required|string|max:255",
            'number_subtitle2' => "required|string",
            'inst_title' => "required|string|max:255",
            'inst_subtitle' => "required|string",
            'city_title' => "required|string|max:255",
            'city_subtitle' => "required|string",
            'params_title' => "required|string|max:255",
            'params_subtitle' => "required|string",
            'boobs_link' => "required|string|max:255",
            'under_boobs_link' => "required|string|max:255",
            'size_title' => "required|string|max:255",
            'size_subtitle' => "required|string|max:255",
            'secure_title' => "required|string",
            'secure_subtitle' => "required|string",
            'about_title' => "required|string|max:255",
            'price_title' => "required|string|max:255",
            'price_subtitle' => "required|string|max:255",
            'order_title' => "required|string|max:255",
            'order_subtitle' => "required|string|max:255",
            'where_title' => "required|string|max:255",
            'where_subtitle' => "required|string|max:255",
            'advice_cover' => "image|mimes:jpg,png,jpeg,gif,svg|max:2048",
        ];
    }
}
