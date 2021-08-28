@extends('admin.layouts.base')

@section('content')

    <h1>Редактирование</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.cars.index')}}">Список автомобилей</a></li>
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
                    Редактирование
                </div>
                <div class="card-body">
                    <form action="{{route('admin.cars.update', [$car])}}" method="POST" class="form py-4"
                          enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание автомобиля</a>
                            </li>
                        </ul>
                        @method('PATCH')
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="title" class="col-sm-2 col-form-label">
                                        Название</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" id="title" value="{{$car->title}}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="price" class="col-sm-2 col-form-label">
                                        Цена</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price" id="price" value="{{$car->price}}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="year" class="col-sm-2 col-form-label">
                                        Год</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="year" id="year" value="{{$car->year}}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="mileage" class="col-sm-2 col-form-label">
                                        Пробег</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mileage" id="mileage" value="{{$car->mileage}}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="description" class="col-sm-2 col-form-label">
                                        Описание</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="description" id="description" value="{{$car->description}}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="volume" class="col-sm-2 col-form-label">
                                        Объём</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="volume" id="volume" value="{{$car->volume}}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="type" class="col-sm-2 col-form-label">
                                        Тип</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="type" id="type" value="{{$car->type}}">
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
{{--    <script type="text/javascript">--}}
{{--        CKEDITOR.config.allowedContent = true;--}}
{{--        CKEDITOR.config.defaultLanguage = 'en';--}}
{{--        CKEDITOR.replace('content', {--}}
{{--            filebrowserUploadUrl: "{{route('admin.blog.upload', ['_token' => csrf_token() ])}}",--}}
{{--            filebrowserUploadMethod: 'form',--}}
{{--        });--}}
{{--    </script>--}}
@endsection
