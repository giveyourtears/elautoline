<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\CityPageRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Models\Cities;
use App\Models\Delivery;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = DB::table('cities')->paginate(10);
        return view('admin.cities.index', [
            'cities' => $cities
        ]);
    }

    public function store(CityPageRequest $request)
    {
        $validated = $request->validated();
        $city = new Cities($validated);
        $city->save();

        return response()->redirectToRoute('admin.cities.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function edit($id)
    {
        return view('admin.cities.edit')->with('city', Cities::where('id', $id)->first());
    }

    public function update(CityPageRequest $request, $id)
    {
        $validated = $request->validated();
        $city = Cities::find($id);
        $city->fill($validated);
        $city->save();

        return response()->redirectToRoute('admin.cities.index', ['success' => true]);
    }

    public function destroy($id)
    {
        Cities::find($id)->delete();
        return back();
    }
}
