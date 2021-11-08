<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointPrices extends Model
{
    use HasFactory;

    protected $fillable = ['port_id', 'type_id', 'city_id', 'price_city', 'city_at_id'];

    public function _construct(int $port_id, int $type_id, int $city_id, float $price_city, int $city_at_id)
    {
        $this->port_id = $port_id;
        $this->type_id = $type_id;
        $this->city_id = $city_id;
        $this->price_city = $price_city;
        $this->city_at_id = $city_at_id;
    }
    public $timestamps = false;
}
