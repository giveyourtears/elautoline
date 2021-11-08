<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\AuctionPageRequest;
use App\Http\Requests\Admin\CityPageRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\PointPricesPageRequest;
use App\Models\AuctionFees;
use App\Models\Cities;
use App\Models\Delivery;
use App\Models\PointPrices;
use App\Models\PortFroms;
use App\Models\Ports;
use App\Models\ReferenceGuide;
use App\Models\VehicleTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointPricesController extends Controller
{
    public function index()
    {
        $prices = DB::table('point_prices')
            ->join('ports', 'point_prices.port_id', '=', 'ports.id')
            ->join('port_froms', 'point_prices.city_id', '=', 'port_froms.id')
            ->join('cities', 'point_prices.city_at_id', '=', 'cities.id')
            ->join('vehicle_types', 'point_prices.type_id', '=', 'vehicle_types.id')
            ->select('point_prices.*', 'ports.name as portName', 'cities.name as city', 'port_froms.name as cityName', 'vehicle_types.name as typeName')
            ->paginate(10);
        return view('admin.prices.index', [
            'prices' => $prices
        ]);
    }

    public function store(PointPricesPageRequest $request)
    {
        $port = PortFroms::where([['name', '=', $request->city_id], ['type', '=', $request->type_id]])->first();
        $newCityId = $port->getAttributes()['id'];

        $priceMinsk = new PointPrices();
        $priceMinsk->fill(array('port_id' => $request->port_id, 'type_id' => $request->type_id, 'city_id' => $newCityId, 'price_city' => $request->price_city + $port->getAttributes()['minsk'] + $port->getAttributes()['price_water'], 'city_at_id' => 2));
        $priceMinsk->save();

        $priceClaipeda = new PointPrices();
        $priceClaipeda->fill(array('port_id' => $request->port_id, 'type_id' => $request->type_id, 'city_id' => $newCityId, 'price_city' => $request->price_city + $port->getAttributes()['claipeda'] + $port->getAttributes()['price_water'], 'city_at_id' => 1));
        $priceClaipeda->save();

        $priceOdessa = new PointPrices();
        $priceOdessa->fill(array('port_id' => $request->port_id, 'type_id' => $request->type_id, 'city_id' => $newCityId, 'price_city' => $request->price_city + $port->getAttributes()['odessa'] + $port->getAttributes()['price_water'], 'city_at_id' => 3));
        $priceOdessa->save();

        $priceBremer = new PointPrices();
        $priceBremer->fill(array('port_id' => $request->port_id, 'type_id' => $request->type_id, 'city_id' => $newCityId, 'price_city' => $request->price_city + $port->getAttributes()['bremer'] + $port->getAttributes()['price_water'], 'city_at_id' => 4));
        $priceBremer->save();

        $priceBatumi = new PointPrices();
        $priceBatumi->fill(array('port_id' => $request->port_id, 'type_id' => $request->type_id, 'city_id' => $newCityId, 'price_city' => $request->price_city + $port->getAttributes()['poti'] + $port->getAttributes()['price_water'], 'city_at_id' => 5));
        $priceBatumi->save();


        return response()->redirectToRoute('admin.prices.index', ['success' => true]);
    }

    public function create()
    {
        $cities = $users = DB::table('port_froms')
            ->select('name')
            ->groupBy('name')
            ->get();
        $ports = Ports::all();
        $types = VehicleTypes::all();
        return view('admin.prices.create', [
            'cities' => $cities,
            'ports' => $ports,
            'types' => $types
        ]);
    }

    public function edit($id)
    {
        $cities = $users = DB::table('port_froms')
            ->select('name')
            ->groupBy('name')
            ->get();
        $ports = Ports::all();
        $temp = match ($_GET["city"]) {
            "Минск" => "minsk",
            "Клайпеда" => "claipeda",
            "Одесса" => "odessa",
            "Бремерхафен" => "bremer",
            "Поти" => "poti",
            default => "",
        };
        $types = VehicleTypes::all();
        return view('admin.prices.edit', [
            'cities' => $cities,
            'ports' => $ports,
            'test' => $temp,
            'types' => $types])->with('price', PointPrices::where('id', $id)->first());
    }

    public function update(PointPricesPageRequest $request, $id)
    {
        $price = PointPrices::find($id);
        $port = PortFroms::where([['id', '=', $request->city_id], ['type', '=', $request->type_id]])->first();
        $priceFix = intval($port->getAttributes()['price_water']);
        $priceCity = floatval($port->toArray()[$request->city_name]);
        $port_id = intval($request->port_id);
        $type_id = intval($request->type_id);
        $city_id = intval($request->city_id);
        $city_at_id = intval($request->type_id);
        $price_city = floatval($request->price_city) + $priceCity + $priceFix;
        $price->fill(array('port_id' => $port_id, 'type_id' => $type_id, 'city_id' => $city_id, 'price_city' => $price_city, 'city_at_id' => $city_at_id));
        $price->save();

        return response()->redirectToRoute('admin.prices.index', ['success' => true]);
    }

    public function destroy($id)
    {
        PointPrices::find($id)->delete();
        return back();
    }
}
