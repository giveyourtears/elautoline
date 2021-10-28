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
                ->join('vehicle_types', 'point_prices.type_id', '=', 'vehicle_types.id')
                ->select('point_prices.*', 'ports.name as portName', 'port_froms.name as cityName', 'vehicle_types.name as typeName')
                ->paginate(10);
        return view('admin.prices.index', [
            'prices' => $prices
        ]);
    }

    public function store(PointPricesPageRequest $request)
    {
        $validated = $request->validated();
        $port = PortFroms::where([['name', '=', $request->city_id],['type', '=', $request->type_id]])->first();
        dd($port->getAttributes()['name']);

        $price = new PointPrices($validated);
        $price->save();

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
        $cities = PortFroms::all();
        $ports = Ports::all();
        $types = VehicleTypes::all();
        return view('admin.prices.edit', [
            'cities' => $cities,
            'ports' => $ports,
            'types' => $types])->with('price', PointPrices::where('id', $id)->first());
    }

    public function update(PointPricesPageRequest $request, $id)
    {
        $validated = $request->validated();
        $price = PointPrices::find($id);
        $price->fill($validated);
        $price->save();

        return response()->redirectToRoute('admin.prices.index', ['success' => true]);
    }

    public function destroy($id)
    {
        PointPrices::find($id)->delete();
        return back();
    }
}
