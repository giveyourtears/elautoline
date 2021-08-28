@extends('admin.layouts.base')

@section('content')
    <h1>Главная страница</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.homepage.index')}}">Автомобили</a></li>
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
                    Список автомобилей
                </div>
                <div class="card-body">
                    <a href="{{route('admin.cars.create')}}" class="btn btn-primary">
                        <span class="bi bi-plus"></span>
                        Добавить
                    </a>
                    <div class="table-wrapper">
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Год</th>
                                <th scope="col">Пробег</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Объем</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$car->title}}</td>
                                    <td>{{$car->price}}</td>
                                    <td>{{$car->year}}</td>
                                    <td>{{$car->mileage}}</td>
                                    <td>{{$car->description}}</td>
                                    <td>{{$car->volume}}</td>
                                    <td>{{$car->type}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/admin/cars/{{$car->id}}/edit" class="btn btn-success mr-1">
                                                <span class="bi bi-pencil-fill"></span>
                                            </a>
                                            <a href="{{ URL::route('admin.images.index', $car->id) }}" class="btn btn-success mr-1">
                                                <span class="bi bi-card-image"></span>
                                            </a>
                                            <form action="{{ URL::route('admin.cars.destroy', $car->id) }}" method="POST" class="btn btn-danger">
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
                    {{ $cars->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
