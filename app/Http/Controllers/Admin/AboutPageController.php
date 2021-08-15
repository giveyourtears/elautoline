<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutPageRequest;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\ReferencePageRequest;
use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutPageController extends Controller
{
    public function index()
    {
        $abouts = DB::table('abouts')->paginate(10);
        return view('admin.aboutpage.index', [
            'abouts' => $abouts
        ]);
    }

    public function store(AboutPageRequest $request)
    {
        $validated = $request->validated();
        $about = new About($validated);
        $about->save();

        return response()->redirectToRoute('admin.aboutpage.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.aboutpage.create');
    }

    public function edit($id)
    {
        return view('admin.aboutpage.edit')->with('about', About::where('id', $id)->first());
    }

    public function update(AboutPageRequest $request, $id)
    {
        $validated = $request->validated();
        $about = About::find($id);
        $about->fill($validated);
        $about->save();

        return response()->redirectToRoute('admin.aboutpage.index', ['success' => true]);
    }

    public function destroy($id)
    {
        About::find($id)->delete();
        return back();
    }
}
