@extends('admin.layouts.base')

@section('content')

    <h1>Добавление</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.deliverypage.index')}}">Список изображений</a></li>
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
                    <form action="{{route('admin.homepage.store')}}" method="POST" class="form py-4"
                          enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание изображения</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row border-bottom py-3">
                                    <label for="main_title" class="col-sm-2 col-form-label">
                                        Заголовок</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="main_title" id="main_title">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label for="main_description" class="col-sm-2 col-form-label">
                                        Описание</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="main_description" id="main_description">
                                    </div>
                                </div>
                                <div class="form-group row border-bottom py-3">
                                    <label class="col-sm-2 col-form-label">Изображение</label>
                                    <div class="image-upload-container" style="max-width:600px;">
                                        <div class="image-edit">
                                            <input class="image-upload" name="main_cover" type='file'
                                                   accept=".png, .jpg, .jpeg, .gif, .svg"/>
                                            <label class="btn-image-upload"> <span class="bi bi-card-image"></span></label>
                                        </div>
                                        <div class="image-preview-container"
                                             style="width: 300px; height: 150px; position: relative;">
                                            <div class="image-preview" data-init-image="">
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
{{--    <script type="text/javascript">--}}
{{--        CKEDITOR.config.allowedContent = true;--}}
{{--        CKEDITOR.config.defaultLanguage = 'en';--}}
{{--        CKEDITOR.replace('content', {--}}
{{--            filebrowserUploadUrl: "{{route('admin.blog.upload', ['_token' => csrf_token() ])}}",--}}
{{--            filebrowserUploadMethod: 'form',--}}
{{--        });--}}
{{--    </script>--}}
@endsection
