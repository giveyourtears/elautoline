@extends('admin.layouts.base')

@section('content')

    <h1>Добавление</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.prices.index')}}">Сборы</a></li>
        </ol>
    </nav>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <b>Ошибки:</b>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(!empty(request()->get('success')))
        <div class="alert alert-success">
            Данные успешно сохранены!
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="bi bi-pencil-fill"></span>
                    Добавление
                </div>
                <div class="card-body">
                    <form action="{{route('admin.prices.store')}}" method="POST" class="form py-4"
                          enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Цены</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="port_id" class="col-sm-2 col-form-label">
                                        Город</label>
                                    <div class="col-sm-10">
                                        <input type="text" hidden class="form-control" name="port_id" id="port_id">
                                        <select class="form-select" aria-label="Default select example" id="port_select">
                                            @foreach($ports as $port)
                                                <option value="{{$port->id}}">{{$port->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="city_id" class="col-sm-2 col-form-label">
                                        Порт</label>
                                    <div class="col-sm-10">
                                        <input type="text" hidden class="form-control" name="city_id" id="city_id">
                                        <select class="form-select" aria-label="Default select example" id="city_select">
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="type_id" class="col-sm-2 col-form-label">
                                        Тип</label>
                                    <div class="col-sm-10">
                                        <input type="text" hidden class="form-control" name="type_id" id="type_id">
                                        <select class="form-select" aria-label="Default select example" id="type_select">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="price_city" class="col-sm-2 col-form-label">
                                        Цена по суше</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="any" class="form-control" name="price_city" id="price_city">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
