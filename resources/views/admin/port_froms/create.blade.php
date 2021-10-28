@extends('admin.layouts.base')

@section('content')

    <h1>Добавление</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.port_froms.index')}}">Список портов</a></li>
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
                    <form action="{{route('admin.port_froms.store')}}" method="POST" class="form py-4"
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
                                    <label for="name" class="col-sm-2 col-form-label">
                                        Название</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="claipeda" class="col-sm-2 col-form-label">
                                        Клайпеда</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="claipeda" id="claipeda">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="minsk" class="col-sm-2 col-form-label">
                                        Минск</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="minsk" id="minsk">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="odessa" class="col-sm-2 col-form-label">
                                        Одесса</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="odessa" id="odessa">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="bremer" class="col-sm-2 col-form-label">
                                        Бремерхафен</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="bremer" id="bremer">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="poti" class="col-sm-2 col-form-label">
                                        Поти</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="poti" id="poti">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="price_water" class="col-sm-2 col-form-label">
                                        ФИКС ЦЕНА</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price_water" id="price_water">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="type" class="col-sm-2 col-form-label">
                                        Тип</label>
                                    <div class="col-sm-10">
                                        <input type="text" hidden class="form-control" name="type" id="type2">
                                        <select class="form-select" aria-label="Default select example" id="type2_select">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
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
    {{--    <script type="text/javascript">--}}
    {{--        CKEDITOR.config.allowedContent = true;--}}
    {{--        CKEDITOR.config.defaultLanguage = 'en';--}}
    {{--        CKEDITOR.replace('content', {--}}
    {{--            filebrowserUploadUrl: "{{route('admin.blog.upload', ['_token' => csrf_token() ])}}",--}}
    {{--            filebrowserUploadMethod: 'form',--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
