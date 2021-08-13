@extends('admin.layouts.base')

@section('content')
    <h1>Главная страница</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.homepage.index')}}">Редактирование главной
                    страницы</a></li>
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
                    <span class="bi bi-list-ul"></span>
                    Главная страница
                </div>
                <div class="card-body">
                    <form action="{{route('admin.homepage.update')}}" method="POST" class="form py-4" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true">Контент страницы</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <input type="hidden" class="form-control" name="id"
                                       value="{{ isset($data) ? $data->id : '' }}">
                                <div class="form-group row border-bottom py-3">
                                    <label for="main_title" class="col-sm-2 col-form-label">
                                        Главный заголовок
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="main_title" id="main_title"
                                               value="{{ isset($data) ? $data->main_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label class="col-sm-2 col-form-label">Главное изображение</label>
                                    <div class="image-upload-container" style="max-width:600px;">
                                        <div class="image-edit">
                                            <input class="image-upload" name="main_cover" type='file'
                                                   accept=".png, .jpg, .jpeg, .gif, .svg"/>
                                            <label class="btn-image-upload"> <span class="bi bi-card-image"></span></label>
                                        </div>
                                        <div class="image-preview-container"
                                             style="width: 300px; height: 150px; position: relative;">
                                            <div class="image-preview" data-init-image="{{assetImage($data->main_cover)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="main_subtitle" class="col-sm-2 col-form-label">
                                        Подзаголовок
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="main_subtitle" id="main_subtitle"
                                               value="{{ isset($data) ? $data->main_subtitle : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="fio_title" class="col-sm-2 col-form-label">
                                        ФИО заголовок
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fio_title" id="fio_title"
                                               value="{{ isset($data) ? $data->fio_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="fio_subtitle" class="col-sm-2 col-form-label ">
                                        ФИО подзаголовок
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fio_subtitle"
                                               id="fio_subtitle"
                                               value="{{ isset($data) ? $data->fio_subtitle : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="number_title" class="col-sm-2 col-form-label ">
                                        Номер телефона
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="number_title"
                                               id="number_title"
                                               value="{{ isset($data) ? $data->number_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="number_subtitle" class="col-sm-2 col-form-label ">
                                        Описание телефон
                                    </label>
                                    <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="number_subtitle" id="number_subtitle"
                                          rows="5">{{ isset($data) ? $data->number_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="number_title2" class="col-sm-2 col-form-label ">
                                        Дополнительный номер телефона
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="number_title2" id="number_title2"
                                               value="{{ isset($data) ? $data->number_title2 : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="number_subtitle2" class="col-sm-2 col-form-label ">
                                        Описание доп номера
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="number_subtitle2"
                                               id="number_subtitle2"
                                               value="{{ isset($data) ? $data->number_subtitle2 : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="inst_title" class="col-sm-2 col-form-label ">
                                        Заголовок inst
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inst_title"
                                               id="inst_title"
                                               value="{{ isset($data) ? $data->inst_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="inst_subtitle" class="col-sm-2 col-form-label ">
                                        Описание inst
                                    </label>
                                    <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="inst_subtitle" id="inst_subtitle"
                                          rows="5">{{ isset($data) ? $data->inst_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="city_title" class="col-sm-2 col-form-label ">
                                        Заголовок город
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="city_title"
                                               id="city_title"
                                               value="{{ isset($data) ? $data->city_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="city_subtitle" class="col-sm-2 col-form-label ">
                                        Описание города
                                    </label>
                                    <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="city_subtitle" id="city_subtitle"
                                          rows="5">{{ isset($data) ? $data->city_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="params_title" class="col-sm-2 col-form-label">
                                        Заголовок параметры для пошива
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="params_title" id="params_title"
                                               value="{{ isset($data) ? $data->params_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="params_subtitle" class="col-sm-2 col-form-label ">
                                        Описание параметров
                                    </label>
                                    <div class="col-sm-10">
                                     <textarea type="text" class="form-control" name="params_subtitle" id="params_subtitle"
                                               rows="5">{{ isset($data) ? $data->params_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label class="col-sm-2 col-form-label">Изображение "Обхват талии"</label>
                                    <div class="image-upload-container" style="max-width:600px;">
                                        <div class="image-edit">
                                            <input class="image-upload" name="waist_cover" type='file'
                                                   accept=".png, .jpg, .jpeg, .gif, .svg"/>
                                            <label class="btn-image-upload"> <span class="bi bi-card-image"></span></label>
                                        </div>
                                        <div class="image-preview-container"
                                             style="width: 300px; height: 150px; position: relative;">
                                            <div class="image-preview" data-init-image="{{assetImage($data->waist_cover)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label class="col-sm-2 col-form-label">Изображение "Обхват бёдер"</label>
                                    <div class="image-upload-container" style="max-width:600px;">
                                        <div class="image-edit">
                                            <input class="image-upload" name="hips_cover" type='file'
                                                   accept=".png, .jpg, .jpeg, .gif, .svg"/>
                                            <label class="btn-image-upload"> <span class="bi bi-card-image"></span></label>
                                        </div>
                                        <div class="image-preview-container"
                                             style="width: 300px; height: 150px; position: relative;">
                                            <div class="image-preview" data-init-image="{{assetImage($data->hips_cover)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="size_title" class="col-sm-2 col-form-label">
                                        Размер лифа
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="size_title" id="size_title"
                                               value="{{ isset($data) ? $data->size_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="size_subtitle" class="col-sm-2 col-form-label ">
                                        Описание лифа
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="size_subtitle"
                                               id="size_subtitle"
                                               value="{{ isset($data) ? $data->size_subtitle : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="secure_title" class="col-sm-2 col-form-label">
                                        Заголовок безопасность
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="secure_title" id="secure_title"
                                               value="{{ isset($data) ? $data->secure_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="secure_subtitle" class="col-sm-2 col-form-label ">
                                        Описание безопасность
                                    </label>
                                    <div class="col-sm-10">
                                     <textarea type="text" class="form-control" name="secure_subtitle"
                                               id="secure_subtitle"
                                               rows="5">{{ isset($data) ? $data->secure_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="about_title" class="col-sm-2 col-form-label">
                                        Заголовок Импланты
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="about_title" id="about_title"
                                               value="{{ isset($data) ? $data->about_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="price_title" class="col-sm-2 col-form-label">
                                        Заголовок стоимость
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price_title" id="price_title"
                                               value="{{ isset($data) ? $data->price_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="price_subtitle" class="col-sm-2 col-form-label ">
                                        Описание стоимость
                                    </label>
                                    <div class="col-sm-10">
                                     <textarea type="text" class="form-control" name="price_subtitle"
                                               id="price_subtitle"
                                               rows="5">{{ isset($data) ? $data->price_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="order_title" class="col-sm-2 col-form-label">
                                        Заголовок "Где сделали заказ"
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="order_title" id="order_title"
                                               value="{{ isset($data) ? $data->order_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="order_subtitle" class="col-sm-2 col-form-label ">
                                        Описание "Где сделали заказ"
                                    </label>
                                    <div class="col-sm-10">
                                     <textarea type="text" class="form-control" name="order_subtitle"
                                               id="order_subtitle"
                                               rows="5">{{ isset($data) ? $data->order_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="where_title" class="col-sm-2 col-form-label">
                                        Заголовок "Рекомендации"
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="where_title" id="where_title"
                                               value="{{ isset($data) ? $data->where_title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="where_subtitle" class="col-sm-2 col-form-label ">
                                        Описание "Рекомендации"
                                    </label>
                                    <div class="col-sm-10">
                                     <textarea type="text" class="form-control" name="where_subtitle"
                                               id="where_subtitle"
                                               rows="5">{{ isset($data) ? $data->where_subtitle : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="boobs_link" class="col-sm-2 col-form-label">
                                        Youtube ссылка "Обхват груди"
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="boobs_link" id="boobs_link"
                                               value="{{ isset($data) ? $data->boobs_link : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="under_boobs_link" class="col-sm-2 col-form-label">
                                        Youtube ссылка "Обхват под грудью"
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="under_boobs_link" id="under_boobs_link"
                                               value="{{ isset($data) ? $data->under_boobs_link : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label class="col-sm-2 col-form-label">Изображение "Рекомендации"</label>
                                    <div class="image-upload-container" style="max-width:600px;">
                                        <div class="image-edit">
                                            <input class="image-upload" name="advice_cover" type='file'
                                                   accept=".png, .jpg, .jpeg, .gif, .svg"/>
                                            <label class="btn-image-upload"> <span class="bi bi-card-image"></span></label>
                                        </div>
                                        <div class="image-preview-container"
                                             style="width: 300px; height: 150px; position: relative;">
                                            <div class="image-preview" data-init-image="{{assetImage($data->advice_cover)}}">
                                            </div>
                                        </div>
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
