<?php

namespace App\Http\Controllers\Admin;
use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateHomePageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Models\Blog;
use App\Models\MainCarousel;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function __construct(IImageService $imageService)
    {
        $this->_imageService = $imageService;
    }

    public function index()
    {
        $images = DB::table('main_carousels')->paginate(10);
        return view('admin.homepage.index', [
            'images' => $images
        ]);
    }

    public function create()
    {
        return view('admin.homepage.create');
    }

    public function store(HomePageRequest $request)
    {
        $validated = $request->validated();
        $carousel = new MainCarousel($validated);
        $carousel->main_cover = $this->_imageService->upload($request->main_cover, 'home');
        $carousel->save();

        return response()->redirectToRoute('admin.homepage.index');
    }

    public function edit($id)
    {
        return view('admin.homepage.edit')->with('image', MainCarousel::where('id', $id)->first());
    }

    public function update(UpdateHomePageRequest $request, $id)
    {
        $validated = $request->validated();
        $carousel = MainCarousel::find($id);
        if ($request->main_cover) {
            $this->_imageService->delete($carousel->main_cover);
        }
        $carousel->fill($validated);
        if ($request->main_cover) {
            $newImage = $this->_imageService->upload($request->main_cover, 'home');
            $carousel->main_cover = $newImage;
        }
        $carousel->save();
        return response()->redirectToRoute('admin.homepage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MainCarousel::find($id)->delete();
        return back();
    }

    public function uploadImage(\Illuminate\Http\Request $request) {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images/home'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/home/'.$fileName);
            $msg = 'Изображение успешно загружено';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
