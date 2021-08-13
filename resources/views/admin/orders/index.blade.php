@extends('admin.layouts.base')

@section('content')
    <h1>Главная страница</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.orders.index')}}">Список заказов</a></li>
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
                    Список заказов
                </div>
                <div class="card-body">
                    <div class="table-wrapper">
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Номер</th>
                                <th scope="col">Дополнительный номер</th>
                                <th scope="col">Никнейм</th>
                                <th scope="col">Город</th>
                                <th scope="col">Адрес</th>
                                <th scope="col">Инфо о ПВЗ</th>
                                <th scope="col">Способ доставки</th>
                                <th scope="col">Обхват груди</th>
                                <th scope="col">Обхват под грудью</th>
                                <th scope="col">Обхват талии</th>
                                <th scope="col">Обхват бедер</th>
                                <th scope="col">Размер лифа</th>
                                <th scope="col">Тип груди</th>
                                <th scope="col">Стоимость</th>
                                <th scope="col">Откуда заказ</th>
                                <th scope="col">Узнали о нас!</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$order->fio}}</td>
                                    <td>{{$order->number}}</td>
                                    <td>{{$order->number2}}</td>
                                    <td>{{$order->inst_nickname}}</td>
                                    <td>{{$order->city}}</td>
                                    @if($order->type == 'ПВЗ CDEK')
                                        <td>{{$order->address}}</td>
                                    @else
                                        <td>{{$order->address}}, Индекс: {{$order->index}}</td>
                                    @endif
                                    <td>{{$order->pvz}}</td>
                                    <td>{{$order->type}}</td>
                                    <td>{{$order->boobs_size}}</td>
                                    <td>{{$order->under_boobs_size}}</td>
                                    <td>{{$order->waist_size}}</td>
                                    <td>{{$order->hips_size}}</td>
                                    <td>{{$order->bra_size}}</td>
                                    <td>{{$order->boobs_type}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->where_order}}</td>
                                    <td>{{$order->about_us}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ URL::route('admin.orders.destroy', $order->id) }}" method="POST" class="btn btn-danger">
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
                    {{ $orders->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
