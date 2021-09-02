@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($carousels as $carousel)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}"
                    class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($carousels as $carousel)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{assetImage($carousel->main_cover)}}" alt="carousel"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="font-size: 18px">{{$carousel->main_title}}</h5>
                        <p style="font-size: 30px">{{$carousel->main_description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <section class="about-lists mb-3">
        <div class="container">
            <div class="row no-gutters">
                @foreach($deliveries as $delivery)
                    <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
                        <span>0{{$loop->iteration}}</span>
                        <h4>{{$delivery->title}}</h4>
                        <p>{{$delivery->description}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="more-services section">
        <div class="container mb-2" style="display: flex; justify-content: space-around">
            <form method="POST" id="our" action="{{route('client.home')}}">
                @csrf
                <h1 class="{{ $type == 'our' ? 'is-Chosen' : '' }} type">Наши покупки</h1>
                <input type="hidden" name="type" value="our"/>
            </form>
            <form method="POST" id="stock" action="{{route('client.home')}}">
                @csrf
                <h1 class="{{ $type == 'stock' ? 'is-Chosen' : '' }} type">В наличии</h1>
                <input type="hidden" name="type" value="stock"/>
            </form>
            <form method="POST" id="now" action="{{route('client.home')}}">
                @csrf
                <h1 class="{{ $type == 'now' ? 'is-Chosen' : '' }} type">Лот по BY NOW</h1>
                <input type="hidden" name="type" value="now"/>
            </form>
        </div>
        <div class="container">
            <div class="row" style="display: flex;">
                @foreach($cars as $car)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="card">
                            <div class="view view-cascade">
                                @foreach($images as $image)
                                    @if($image->carId==$car->id)
                                        <img
                                            src="{{assetImage($image->cover)}}"
                                            class="card-img-top" alt="..."/>
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">{{$car->title}}</a></h5>
                                <div style="display: flex; justify-content: space-around">
                                    <p class="card-text"><strong>{{$car->price}}</strong></p>
                                    <p class="card-text"><i
                                            class="fa fa-car"></i><strong> {{$car->mileage}}</strong></p>
                                    <p class="card-text"><i
                                            class="fa fa-fire"></i><strong> {{$car->value}}</strong></p>
                                    <p class="card-text"><i
                                            class="fa fa-calendar"></i><strong> {{$car->year}}</strong></p>
                                </div>
                                <p class="card-text" style="font-size: 14px">Цена указана без учёта
                                    растаможки</p>
                                <a href="{{route('client.car.index', $car->id)}}" class="btn"><i
                                        class="fa fa-shopping-cart"></i> Посмотреть</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
