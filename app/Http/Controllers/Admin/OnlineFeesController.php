<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\CityPageRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\OnlinePageRequest;
use App\Models\Cities;
use App\Models\Delivery;
use App\Models\OnlineFees;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineFeesController extends Controller
{
    public function index()
    {
        $fees = DB::table('online_fees')->paginate(10);
        return view('admin.online.index', [
            'fees' => $fees
        ]);
    }

    public function store(OnlinePageRequest $request)
    {
        $validated = $request->validated();
        $fee = new OnlineFees($validated);
        $fee->save();

        return response()->redirectToRoute('admin.online.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.online.create');
    }

    public function edit($id)
    {
        return view('admin.online.edit')->with('fee', OnlineFees::where('id', $id)->first());
    }

    public function update(OnlinePageRequest $request, $id)
    {
        $validated = $request->validated();
        $city = OnlineFees::find($id);
        $city->fill($validated);
        $city->save();

        return response()->redirectToRoute('admin.online.index', ['success' => true]);
    }

    public function destroy($id)
    {
        OnlineFees::find($id)->delete();
        return back();
    }
}
