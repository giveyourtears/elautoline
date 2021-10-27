<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Http\Requests\Admin\PortFromsPageRequest;
use App\Http\Requests\Admin\PortPageRequest;
use App\Models\Delivery;
use App\Models\PortFroms;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortFromsController extends Controller
{
    public function index()
    {
        $ports = DB::table('port_froms')->paginate(10);
        return view('admin.port_froms.index', [
            'ports' => $ports
        ]);
    }

    public function store(PortFromsPageRequest $request)
    {
        $validated = $request->validated();
        $port = new PortFroms($validated);
        $port->save();

        return response()->redirectToRoute('admin.port_froms.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.port_froms.create');
    }

    public function edit($id)
    {
        return view('admin.port_froms.edit')->with('port', PortFroms::where('id', $id)->first());
    }

    public function update(PortFromsPageRequest $request, $id)
    {
        $validated = $request->validated();
        $port = PortFroms::find($id);
        $port->fill($validated);
        $port->save();

        return response()->redirectToRoute('admin.port_froms.index', ['success' => true]);
    }

    public function destroy($id)
    {
        PortFroms::find($id)->delete();
        return back();
    }
}
