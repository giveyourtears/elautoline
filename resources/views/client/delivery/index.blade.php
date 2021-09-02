@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <div class="container" style="display: flex; justify-content: space-between; padding-top: 100px">
        <form class="auction_form-form" id="auction-form" method="POST" style="display: flex; flex-direction: column; align-items: center">
            @csrf
            <h1>Калькулятор аукционного сбора</h1>
            <div class="col-9">
                <p style="text-align: left">Введите стоимость транспортного средства:</p>
                <div style="display: flex">
                    <input type="text" class="form-control" id="price" name="price" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                </div>
            </div>
            <div class="col-9 mb-3">
                <p>Тип:</p>
                <select class="form-select" name="auctions" id="auctions" aria-label="Default select example">
                    <option value="iaai">IAAI</option>
                    <option value="copart">Copart</option>
                </select>
            </div>
            <button id="submit_button" type="submit" class="btn mb-3">
                Отправить
            </button>
        </form>

        <form class="online__form-form" id="online-form" method="POST" style="display: flex; flex-direction: column; align-items: center">
            @csrf
            <h1>Калькулятор доставки</h1>
            <div class="col-9">
                <p>Выберите порт отправки:</p>
                <select class="form-select" name="port_id" id="port_id"  aria-label="Default select example">
                    @foreach($ports as $port)
                        <option value="{{$port->id}}">{{$port->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-9">
                <p>Выберите тип транспорта:</p>
                <select class="form-select" name="type_id" id="type_id" aria-label="Default select example">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-9 mb-3">
                <p>Выберите пункт назначения:</p>
                <select class="form-select" name="city_id" id="city_id" aria-label="Default select example">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <button id="submit_button" type="submit" class="btn mb-3">
                Отправить
            </button>
        </form>
    </div>
    <div class="container" id="main2">
        <input id="auction_price" hidden>
        <input id="delivery_price" hidden>
        <div class="col-lg-5">
            <div class="portfolio-info2">
                <h2>Итоговая цена</h2>
                <div style="display: flex; justify-content: center; align-items: center">
                    <h3 id="final_price">0</h3><h3>$</h3>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
