<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\Blog\AddBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\ReferencePageRequest;
use App\Models\Blog;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ReferenceGuideController extends Controller
{
    public function index()
    {
        $references = DB::table('reference_guides')->paginate(10);
        return view('admin.reference.index', [
            'references' => $references
        ]);
    }

    public function store(AddReferenceRequest $request)
    {
        $validated = $request->validated();
        $reference = new ReferenceGuide($validated);
        $reference->save();

        return response()->redirectToRoute('admin.reference.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.reference.create');
    }

    public function edit($id)
    {
        return view('admin.reference.edit')->with('reference', ReferenceGuide::where('id', $id)->first());
    }

    public function update(ReferencePageRequest $request, $id)
    {
        $validated = $request->validated();
        $reference = ReferenceGuide::find($id);
        $reference->fill($validated);
        $reference->save();

        return response()->redirectToRoute('admin.reference.index', ['success' => true]);
    }

    public function destroy($id)
    {
        ReferenceGuide::find($id)->delete();
        return back();
    }
}
