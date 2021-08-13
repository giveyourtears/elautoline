@extends('admin.layouts.base')

@section('content')
    <h1>Админ-панель</h1>
    <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="bi bi-list-ul"></span>
                    Dashboard
                </div>
                <div class="card-body">
                    @if(auth()->user()->is_admin)
                        @forelse($notifications as $notification)
                            <div class="alert alert-success" role="alert">
                                [{{ $notification->created_at }}] User {{ $notification->data['name'] }} {{ $notification->data['last_name'] }} ({{ $notification->data['email'] }}) has just registered.
                                <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                Пометить как прочитанное
                                </a>
                            </div>
                            @if($loop->last)
                                <a href="#" id="mark-all">
                                  Пометить все как прочитанные
                                </a>
                            @endif
                        @empty
                          Новые уведомления отстутствуют
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
