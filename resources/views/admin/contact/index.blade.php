@extends('admin.layouts.base')

@section('content')
    <h1>Обратная связь</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.contact.index')}}">Обратная связь</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="bi bi-list-ul"></span>
                  Категории
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Тема</th>
                                <th scope="col">Сообщение</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$request->name}}</td>
                                    <td>{{$request->phone}}</td>
                                    <td>{{$request->email}}</td>
                                    <td>{{$request->theme}}</td>
                                    <td>{{$request->message}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $requests->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
