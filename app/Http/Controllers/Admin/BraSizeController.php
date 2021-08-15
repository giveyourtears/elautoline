<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\ReferencePageRequest;
use App\Models\Delivery;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BraSizeController extends Controller
{
    public function index()
    {
        $deliveries = DB::table('deliveries')->paginate(10);
        return view('admin.bra.index', [
            'deliveries' => $deliveries
        ]);
    }

    public function store(DeliveryPageRequest $request)
    {
        $validated = $request->validated();
        $delivery = new Delivery($validated);
        $delivery->save();

        return response()->redirectToRoute('admin.bra.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.bra.create');
    }

    public function edit($id)
    {
        return view('admin.bra.edit')->with('delivery', Delivery::where('id', $id)->first());
    }

    public function update(DeliveryPageRequest $request, $id)
    {
        $validated = $request->validated();
        $delivery = Delivery::find($id);
        $delivery->fill($validated);
        $delivery->save();

        return response()->redirectToRoute('admin.bra.index', ['success' => true]);
    }

    public function destroy($id)
    {
        Delivery::find($id)->delete();
        return back();
    }
}
