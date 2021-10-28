<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointPrices extends Model
{
    use HasFactory;

    protected $fillable = ['port_id', 'type_id', 'city_id', 'price_city'];

    public $timestamps = false;
}
