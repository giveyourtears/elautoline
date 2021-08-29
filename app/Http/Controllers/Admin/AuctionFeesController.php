<?php

namespace App\Http\Controllers\Admin;

use App\Core\Services\Infrastructure\IImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBraRequest;
use App\Http\Requests\Admin\AddReferenceRequest;
use App\Http\Requests\Admin\AuctionPageRequest;
use App\Http\Requests\Admin\CityPageRequest;
use App\Http\Requests\Admin\DeliveryPageRequest;
use App\Http\Requests\Admin\HomePageRequest;
use App\Models\AuctionFees;
use App\Models\Cities;
use App\Models\Delivery;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionFeesController extends Controller
{
    public function index()
    {
        $fees = DB::table('auction_fees')->paginate(10);
        return view('admin.auction.index', [
            'fees' => $fees
        ]);
    }

    public function store(AuctionPageRequest $request)
    {
        $validated = $request->validated();
        $fee = new AuctionFees($validated);
        $fee->save();

        return response()->redirectToRoute('admin.auction.index', ['success' => true]);
    }

    public function create()
    {
        return view('admin.auction.create');
    }

    public function edit($id)
    {
        return view('admin.auction.edit')->with('fee', AuctionFees::where('id', $id)->first());
    }

    public function update(AuctionPageRequest $request, $id)
    {
        $validated = $request->validated();
        $city = AuctionFees::find($id);
        $city->fill($validated);
        $city->save();

        return response()->redirectToRoute('admin.auction.index', ['success' => true]);
    }

    public function destroy($id)
    {
        AuctionFees::find($id)->delete();
        return back();
    }
}
