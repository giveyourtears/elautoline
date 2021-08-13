<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\HomepageValues\AddValueRequest;
use App\Http\Requests\Admin\HomepageValues\UpdateValueRequest;
use App\Models\HomePageValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = DB::table('home_page_values')->paginate(10);
        return view('admin.homepage.index_values', [
            'values' => $values
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage.create_value');
    }


    public function store(AddValueRequest $request)
    {
        $validated = $request->validated();
        $image = $request->file('icon')->store('public/images/values');
        $value = new HomePageValues($validated);
        $value->icon = substr(Storage::url($image), 1);
        $value->save();

        return response()->redirectToRoute('admin.values.edit', ['value' => $value->id, 'success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.homepage.edit_value')->with('value', HomePageValues::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValueRequest $request, $id)
    {
        $validated = $request->validated();
        $value = HomePageValues::find($id);
        if ($request->file('icon')) {
            $image = $request->file('icon')->store('public/images/values');
        }
        $value->fill($validated);
        if ($request->file('icon')) {
            $value->icon = substr(Storage::url($image), 1);
        }
        $value->save();
        return response()->redirectToRoute('admin.values.edit', ['value' => $id, 'success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomePageValues::find($id)->delete();
        return back();
    }
}
