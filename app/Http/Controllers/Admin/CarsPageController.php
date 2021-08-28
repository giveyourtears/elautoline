<?php

namespace App\Http\Controllers\Admin;
use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarsPageRequest;
use App\Http\Requests\Admin\UpdateCarsPageRequest;
use App\Http\Requests\Admin\UpdateHomePageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Models\Car;
use App\Models\MainCarousel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarsPageController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')->paginate(10);
        return view('admin.cars.index', [
            'cars' => $cars
        ]);
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(CarsPageRequest $request)
    {
        $validated = $request->validated();
        $car = new Car($validated);
        $car->save();

        return response()->redirectToRoute('admin.cars.index');
    }

    public function edit($id)
    {
        return view('admin.cars.edit')->with('car', Car::where('id', $id)->first());
    }

    public function update(UpdateCarsPageRequest $request, $id)
    {
        $validated = $request->validated();
        $car = Car::find($id);
        $car->fill($validated);
        $car->save();
        return response()->redirectToRoute('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::find($id)->delete();
        return back();
    }
}
