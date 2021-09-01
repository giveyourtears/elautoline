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

    public function resultAuction(Request $request)
    {
        $online = DB::table('online_fees')
            ->where('price_start', '<', $request->price)
            ->where('price_end', '>', $request->price)
            ->first();
        $auction = DB::table('auction_fees')
            ->where('price_start', '<', $request->price)
            ->where('price_end', '>', $request->price)
            ->first();

        return response()->json(59 + $online->fee + $auction->fee);
    }

    public function resultDelivery(Request $request)
    {
        $delivery = DB::table('point_prices')
            ->where('port_id', '=', $request->port_id)
            ->where('type_id', '=', $request->type_id)
            ->where('city_id', '=', $request->city_id)
            ->first();

        return response()->json(800 + $delivery->price_type + $delivery->price_city);
    }
}
