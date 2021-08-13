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
use App\Models\Order;
use App\Models\ReferenceGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->paginate(10);
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return back();
    }
}
