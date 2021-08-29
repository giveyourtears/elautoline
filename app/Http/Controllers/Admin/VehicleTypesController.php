<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\VehiclePageRequest;
use App\Models\Cities;
use App\Models\Delivery;
use App\Models\ReferenceGuide;
use App\Models\VehicleTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleTypesController extends Controller
{
    public function index()
    {
        $vehicle_types = DB::table('vehicle_types')->paginate(10);
        return view('admin.vehicles.index', [
            'vehicles' => $vehicle_types
        ]);
    }

    public function store(VehiclePageRequest $request)
    {
        $validated = $request->validated();
        $type = new VehicleTypes($validated);
        $type->save();

        return response()->redirectToRoute('admin.vehicles.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function edit($id)
    {
        return view('admin.vehicles.edit')->with('type', VehicleTypes::where('id', $id)->first());
    }

    public function update(VehiclePageRequest $request, $id)
    {
        $validated = $request->validated();
        $type = VehicleTypes::find($id);
        $type->fill($validated);
        $type->save();

        return response()->redirectToRoute('admin.vehicles.index', ['success' => true]);
    }

    public function destroy($id)
    {
        VehicleTypes::find($id)->delete();
        return back();
    }
}
