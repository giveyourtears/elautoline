<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarImagePageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\Project\AddProjectRequest;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Delivery;
use App\Models\HomePage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarImagesController extends Controller
{
    public function __construct(IImageService $imageService)
    {
        $this->_imageService = $imageService;
    }

    public function index($id)
    {
        $images = DB::table('car_images')->where('carId', $id)->paginate(10);
        return view('admin.images.index', [
            'images' => $images,
            'id' => $id
        ]);
    }

    public function create($id)
    {
        return view('admin.images.create',
            [
                'id' => $id
            ]);
    }

    public function store(CarImagePageRequest $request, $id)
    {
        $validated = $request->validated();
        $image = new CarImage($validated);
        $image->carId = $id;
        $image->cover = $this->_imageService->upload($request->cover, 'carImages');
        $image->save();

        return response()->redirectToRoute('admin.images.index', $id);
    }

    public function destroy($id)
    {
        $car = CarImage::find($id);
        if ($car->cover) {
            $this->_imageService->delete($car->cover);
        }
        CarImage::find($id)->delete();
        return back();
    }
}
