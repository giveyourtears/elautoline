<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomePageRequest;
use App\Models\Blog;
use App\Models\BraSize;
use App\Models\Delivery;
use App\Models\HomePage;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainCarouselController extends Controller
{
    public function __construct(IImageService $imageService)
    {
        $this->_imageService = $imageService;
    }
    public function index()
    {
        $data = Delivery::all()->first();
        return view('admin.homepage.index',[
            'data' => $data
        ]);
    }

    public function update(HomePageRequest $request)
    {
        $validated = $request->validated();
        if(!isset($request->id)) {
            $data = HomePage::create($validated);
            $data->main_cover = $this->_imageService->upload($request->main_cover, 'home');
            $data->hips_cover = $this->_imageService->upload($request->hips_cover, 'home');
            $data->waist_cover = $this->_imageService->upload($request->waist_cover, 'home');
            $data->advice_cover = $this->_imageService->upload($request->advice_cover, 'home');
            $data->save();
            return response()->redirectToRoute('admin.homepage.index', ['success' => true]);
        } else {
            $data = HomePage::findOrFail($request->id);
            if ($request->main_cover) {
                $this->_imageService->delete($data->main_cover);
            }
            if ($request->hips_cover) {
                $this->_imageService->delete($data->hips_cover);
            }
            if ($request->waist_cover) {
                $this->_imageService->delete($data->waist_cover);
            }
            if ($request->advice_cover) {
                $this->_imageService->delete($data->advice_cover);
            }
            $data->fill($validated);
            if ($request->main_cover) {
                $newImage = $this->_imageService->upload($request->main_cover, 'home');
                $data->main_cover = $newImage;
            }
            if ($request->hips_cover) {
                $newImage = $this->_imageService->upload($request->hips_cover, 'home');
                $data->hips_cover = $newImage;
            }
            if ($request->waist_cover) {
                $newImage = $this->_imageService->upload($request->waist_cover, 'home');
                $data->waist_cover = $newImage;
            }
            if ($request->advice_cover) {
                $newImage = $this->_imageService->upload($request->advice_cover, 'home');
                $data->advice_cover = $newImage;
            }
            $data->save();

            return response()->redirectToRoute('admin.homepage.index', ['success' => true]);
        }
    }
}
