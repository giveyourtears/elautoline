<?php

namespace App\Http\Controllers\Client;

use App\Core\Services\Infrastructure\IMailService;
use App\Http\Controllers\Client\Base\ClientControllerBase;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\Delivery;
use App\Models\MainCarousel;
use App\Models\ReferenceGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Type;
use function GuzzleHttp\Promise\all;

class FindController extends ClientControllerBase
{
    public function index(Request $request)
    {
        return $this->view("client.find.index");
    }
}
