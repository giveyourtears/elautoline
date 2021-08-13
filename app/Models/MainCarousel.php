<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCarousel extends Model
{
    use HasFactory;

    protected $fillable = ['main_cover', 'main_title', 'main_description'];

    public $timestamps = false;
}
