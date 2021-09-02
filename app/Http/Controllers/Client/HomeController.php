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
use phpDocumentor\Reflection\Type;
use function GuzzleHttp\Promise\all;

class HomeController extends ClientControllerBase
{
    public function index(Request $request)
    {
        $type = $request->get('type');
        if ($type == null) $type = 'our';
        $deliveries = Delivery::all();
        $carousel_images = MainCarousel::all();
        $cars = Car::all()->where('type', '=', $type);
        $cars_images = CarImage::all();
        $images = array();
        foreach ($cars as $car)
            foreach ($cars_images as $image)
                if ($car->id == $image->carId) {
                    array_push($images, $image);
                    break;
                }
        return $this->view("client.home.index", [
            'deliveries' => $deliveries,
            'carousels' => $carousel_images,
            'cars' => $cars,
            'images' => $images,
            'type' => $type
        ]);
    }
}
