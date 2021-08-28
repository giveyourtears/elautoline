<?php

namespace App\Http\Controllers\Client;

use App\Core\Services\Infrastructure\IMailService;
use App\Http\Controllers\Client\Base\ClientControllerBase;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Delivery;
use App\Models\MainCarousel;
use App\Models\ReferenceGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends ClientControllerBase
{
    public function index(Request $request)
    {
        $deliveries = Delivery::all()->all();
        $carousel_images = MainCarousel::all()->all();
        $cars = Car::all();
        $cars_images = CarImage::all();
        return $this->view("client.home.index", [
            'deliveries' => $deliveries,
            'carousels' => $carousel_images,
            'cars' => $cars,
            'cars_images' => $cars_images
        ]);
    }
}
