<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BraSize extends Model
{
    use HasFactory;

    protected $fillable = ['name_size'];

    public $timestamps = false;
}
