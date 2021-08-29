@extends('admin.layouts.base')

@section('content')

    <h1>Добавление</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.online.index')}}">Список онлайн сборов</a></li>
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
                    <form action="{{route('admin.online.store')}}" method="POST" class="form py-4"
                          enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание порта</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="price_start" class="col-sm-2 col-form-label">
                                        Начальная цена</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="any" class="form-control" name="price_start" id="price_start">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="price_end" class="col-sm-2 col-form-label">
                                        Конечная цена</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="any" class="form-control" name="price_end" id="price_end">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="fee" class="col-sm-2 col-form-label">
                                        Аукционный сбор</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="any" class="form-control" name="fee" id="fee">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="type" class="col-sm-2 col-form-label">
                                        Тип сбора</label>
                                    <div class="col-sm-10">
                                        <input type="text" hidden class="form-control" name="type" id="type">
                                        <select class="form-select" aria-label="Default select example" id="type_online">
                                            <option value="iaai">IAAI</option>
                                            <option value="copart">Copart</option>
                                        </select>
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
