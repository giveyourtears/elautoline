<?php

namespace App\Http\Controllers\Client;

use App\Core\Services\Infrastructure\IMailService;
use App\Http\Controllers\Client\Base\ClientControllerBase;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends ClientControllerBase
{
    public function index(Request $request)
    {
        $cars = Car::all();
        $cars_images = CarImage::all();
        return $this->view("client.home.index", [
            'cars' => $cars,
            'cars_images' => $cars_images
        ]);
    }
}
