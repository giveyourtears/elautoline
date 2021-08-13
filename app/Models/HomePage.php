<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $fillable = ['main_title', 'main_cover', 'main_subtitle', 'fio_title', 'fio_subtitle', 'number_title',
        'number_subtitle', 'number_title2', 'number_subtitle2', 'inst_title', 'inst_subtitle', 'city_title', 'city_subtitle',
        'params_title', 'params_subtitle', 'boobs_link', 'under_boobs_link', 'size_title', 'waist_cover', 'hips_cover',
        'size_subtitle', 'secure_title', 'secure_subtitle', 'about_title', 'price_title', 'price_subtitle',
        'order_title', 'order_subtitle', 'where_title', 'where_subtitle', 'advice_cover'];

    public $timestamps = false;
}
