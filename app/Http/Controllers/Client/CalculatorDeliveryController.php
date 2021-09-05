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
            ->where('price_start', '<', $request->get('price'))
            ->where('price_end', '>', $request->get('price'))
            ->where('type', '=', $request->get('auctions'))
            ->first();

        $auction = DB::table('auction_fees')
            ->where('price_start', '<', $request->get('price'))
            ->where('price_end', '>', $request->get('price'))
            ->where('type', '=', $request->get('auctions'))
            ->first();
        if ($request->get('price') > 7500 && $request->get('price') <= 19999 && $request->get('auctions') == 'iaai') {
            $percent = 1 / 100;
            return response()->json(59 + $online->fee + 500 + ($percent * $request->get('price')));
        }
        if ($request->get('price') >= 20000 && $request->get('auctions') == 'iaai') {
            $percent = 4 / 100;
            return response()->json(59 + $online->fee + 500 + ($percent * $request->get('price')));
        }
        if ($request->get('price') >= 15000 && $request->get('auctions') == 'copart') {
            $percent = 5.5 / 100;
            return response()->json(59 + $online->fee + ($percent * $request->get('price')));
        }
        return response()->json(59 + $online->fee + $auction->fee);
    }

    public function resultDelivery(Request $request)
    {
        $delivery = DB::table('point_prices')
            ->where('port_id', '=', $request->get('port_id'))
            ->where('type_id', '=', $request->get('type_id'))
            ->where('city_id', '=', $request->get('city_id'))
            ->first();

        return response()->json(800 + $delivery->price_type + $delivery->price_city);
    }
}
