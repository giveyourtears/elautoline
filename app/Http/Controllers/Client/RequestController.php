<?php

namespace App\Http\Controllers\Client;


use App\Core\Services\Infrastructure\IMailService;

use App\Http\Controllers\Client\Base\ClientControllerBase;
use App\Http\Requests\Client\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class RequestController extends ClientControllerBase
{

    /**

     * @var IMailService

     */

    private $_mailService;

    public function __construct(IMailService $mailService)

    {
        $this->_mailService = $mailService;
    }

    public function add(Request $request)
    {
        $type = $request->get('type');
        if($type == "ПВЗ CDEK")
        {
            $validated = $request->validate([
                'id' => "",
                'fio' => "required|string|max:255",
                'number' => "required|string|max:255",
                'number2' => "nullable",
                'inst_nickname' => "required|string|max:255",
                'city' => "required|string",
                'address' => "required|string",
                'index' => "nullable",
                'pvz' => "required|string",
                'type' => "string|max:255",
                'boobs_size' => "required|string|max:255",
                'under_boobs_size' => "required|string|max:255",
                'waist_size' => "required|string|max:255",
                'hips_size' => "required|string|max:255",
                'bra_size' => "required|string|max:255",
                'boobs_type' => "nullable",
                'price' => "required|string|max:255",
                'where_order' => "required|string|max:255",
                'about_us' => "nullable"
            ]);
        }
        else
        {
            $validated = $request->validate([
                'id' => "",
                'fio' => "required|string|max:255",
                'number' => "required|string|max:255",
                'number2' => "nullable",
                'inst_nickname' => "required|string|max:255",
                'city' => "required|string",
                'address' => "required|string",
                'index' => "required|string",
                'pvz' => "nullable",
                'type' => "string|max:255",
                'boobs_size' => "required|string|max:255",
                'under_boobs_size' => "required|string|max:255",
                'waist_size' => "required|string|max:255",
                'hips_size' => "required|string|max:255",
                'bra_size' => "required|string|max:255",
                'boobs_type' => "nullable",
                'price' => "required|string|max:255",
                'where_order' => "required|string|max:255",
                'about_us' => "nullable"
            ]);
        }
        $data = Order::create($validated);
        $msg=
            "Новый заказ\n" .
            "Размеры:\n" .
            "Обхват груди: {$request->get('under_boobs_size')}\n" .
            "Обхват под грудью : {$request->get('boobs_size')}\n" .
            "Обхват талии: {$request->get('waist_size')}\n" .
            "Обхват бедер: {$request->get('hips_size')}\n" .
            "Размер лифа: {$request->get('bra_size')}\n" .
            "Цена: {$request->get('price')}\n" .
            "\n" .
            "Данные плательщика:\n" .
            "ФИО: {$request->get('fio')}\n" .
            "Номер: {$request->get('number')}\n" .
            "Instagram: {$request->get('inst_nickname')}\n" .
            "\n" .
            "Информация о доставке:\n" .
            "Город: {$request->get('city')}\n" .
            "Адрес: {$request->get('address')}\n" .
            "Индекс: {$request->get('index')}\n" .
            "Инфо о пвз: {$request->get('pvz')}";


        $telegramBot='1901797929:AAEvaSP2rOjDXW2Z7jkBXcKzuIm6LuUSjvE';
        $telegramChatId=187387498;
        $url='https://api.telegram.org/bot'.$telegramBot.'/sendMessage';$data=array('chat_id'=>$telegramChatId,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return response()->json('ok');
    }
}
