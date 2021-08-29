<?php

namespace App\Http\Controllers\Client;

use App\Core\Services\Infrastructure\IMailService;
use App\Http\Controllers\Client\Base\ClientControllerBase;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Cities;
use App\Models\Ports;
use App\Models\VehicleTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatorDeliveryController extends ClientControllerBase
{
    public function index()
    {
        $cities = Cities::all();
        $ports = Ports::all();
        $types = VehicleTypes::all();
        return $this->view("client.delivery.index", [
            'cities' => $cities,
            'ports' => $ports,
            'types' => $types
        ]);
    }
}
