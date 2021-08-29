@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <div class="container" id="main2">
        <h1>Калькулятор доставки</h1>
        <div class="col-4">
            <p style="text-align: left">Введите стоимость:</p>
            <div style="display: flex">
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <p>Тип:</p>
            <select class="form-select" aria-label="Default select example">
                    <option value="iaai">IAAI</option>
                    <option value="copart">Copart</option>
            </select>
        </div>
        <div class="col-4">
            <p>Выберите порт отправки:</p>
            <select class="form-select" aria-label="Default select example">
                @foreach($ports as $port)
                    <option value="{{$port->id}}">{{$port->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <p>Выберите тип транспорта:</p>
            <select class="form-select" aria-label="Default select example">
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-4 mb-3">
            <p>Выберите пункт назначения:</p>
            <select class="form-select" aria-label="Default select example">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn mb-3">Рассчитать</button>

        <div class="col-lg-5">
            <div class="portfolio-info2">
                <h2>Итоговая цена</h2>
                <h3>1360 $</h3>
            </div>
        </div>
    </div>
@endsection
