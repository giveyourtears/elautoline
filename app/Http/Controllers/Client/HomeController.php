<?php

namespace App\Http\Controllers\Client;

use App\Core\Services\Infrastructure\IMailService;
use App\Http\Controllers\Client\Base\ClientControllerBase;
use App\Models\Blog;
use App\Models\BraSize;
use App\Models\Decor;
use App\Models\Design;
use App\Models\HomePage;
use App\Models\HomePageValues;
use App\Models\Interior;
use App\Models\Landscape;
use App\Models\Oversight;
use App\Models\Package;
use App\Models\Project;
use App\Models\ReferenceGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends ClientControllerBase
{
    public function index(Request $request)
    {
        $data = HomePage::all()->first();
        $data->boobs_link = substr(strrchr($data->boobs_link, '/'), 1 );
        $data->under_boobs_link = substr(strrchr($data->under_boobs_link, '/'), 1 );
        $sizes = BraSize::all();
        $references = ReferenceGuide::all();
        return $this->view("client.home.index", [
            'data' => $data,
            'sizes' => $sizes,
            'references' => $references
        ]);
    }
}
