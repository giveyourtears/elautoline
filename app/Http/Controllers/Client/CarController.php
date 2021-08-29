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
    public function index($id)
    {
        $car = Car::all()->where('id', $id)->first();
        $car_images = CarImage::all()->where('carId', $id);
        return $this->view("client.car.index", [
            'car' => $car,
            'car_images' => $car_images
        ]);
    }
}
