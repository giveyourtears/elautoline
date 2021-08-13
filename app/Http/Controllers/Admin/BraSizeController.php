<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\Blog\AddBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\BraPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\ReferencePageRequest;
use App\Models\Blog;
use App\Models\BraSize;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BraSizeController extends Controller
{
    public function index()
    {
        $bra_sizes = DB::table('bra_sizes')->paginate(10);
        return view('admin.bra.index', [
            'sizes' => $bra_sizes
        ]);
    }

    public function store(AddBraRequest $request)
    {
        $validated = $request->validated();
        $bra = new BraSize($validated);
        $bra->save();

        return response()->redirectToRoute('admin.bra.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.bra.create');
    }

    public function edit($id)
    {
        return view('admin.bra.edit')->with('bra', BraSize::where('id', $id)->first());
    }

    public function update(BraPageRequest $request, $id)
    {
        $validated = $request->validated();
        $bra = BraSize::find($id);
        $bra->fill($validated);
        $bra->save();

        return response()->redirectToRoute('admin.bra.index', ['success' => true]);
    }

    public function destroy($id)
    {
        BraSize::find($id)->delete();
        return back();
    }
}
