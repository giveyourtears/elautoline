<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\PortPageRequest;
use App\Models\Delivery;
use App\Models\Ports;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortsController extends Controller
{
    public function index()
    {
        $ports = DB::table('ports')->paginate(10);
        return view('admin.ports.index', [
            'ports' => $ports
        ]);
    }

    public function store(PortPageRequest $request)
    {
        $validated = $request->validated();
        $port = new Ports($validated);
        $port->save();

        return response()->redirectToRoute('admin.ports.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.ports.create');
    }

    public function edit($id)
    {
        return view('admin.ports.edit')->with('port', Ports::where('id', $id)->first());
    }

    public function update(PortPageRequest $request, $id)
    {
        $validated = $request->validated();
        $port = Ports::find($id);
        $port->fill($validated);
        $port->save();

        return response()->redirectToRoute('admin.ports.index', ['success' => true]);
    }

    public function destroy($id)
    {
        Ports::find($id)->delete();
        return back();
    }
}
