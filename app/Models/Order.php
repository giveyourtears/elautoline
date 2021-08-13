<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['fio', 'number', 'number2', 'inst_nickname', 'city', 'type', 'address', 'index',
        'pvz', 'boobs_size', 'under_boobs_size', 'waist_size', 'hips_size', 'bra_size', 'boobs_type',
        'price', 'where_order', 'about_us'];

    public $timestamps = false;
}
