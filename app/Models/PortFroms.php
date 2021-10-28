<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortFroms extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'claipeda', 'minsk', 'odessa', 'bremer', 'poti', 'price_water', 'type'];


    public $timestamps = false;
}
