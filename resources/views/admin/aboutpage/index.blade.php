@extends('admin.layouts.base')

@section('content')
    <h1>Главная страница</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.aboutpage.index')}}">Редактирование справочника "О нас"</a></li>
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
                    Справочник "О нас"
                </div>
                <div class="card-body">
                    <a href="{{route('admin.aboutpage.create')}}" class="btn btn-primary">
                        <span class="bi bi-plus"></span>
                        Добавить
                    </a>
                    <div class="table-wrapper">
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$about->title}}</td>
                                    <td>{{$about->description}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/aboutpage/{{$about->id}}/edit" class="btn btn-success">
                                                <span class="bi bi-pencil-fill"></span>
                                            </a>
                                            <form action="{{ URL::route('admin.aboutpage.destroy', $about->id) }}" method="POST" class="btn btn-danger">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="delete-button bi bi-trash-fill"></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $abouts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
