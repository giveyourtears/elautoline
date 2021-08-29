<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionFees extends Model
{
    use HasFactory;

    protected $fillable = ['price_start', 'price_end', 'fee', 'type'];

    public $timestamps = false;
}
