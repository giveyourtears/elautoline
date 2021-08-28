@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
            <h1 class="is-Chosen">Наши покупки</h1>
            <h1 class="is-Chosen">В наличии</h1>
            <h1 class="is-Chosen">Лот по BY NOW</h1>
        </div>
        <div class="container">
            <div class="row" style="display: flex;">
                @foreach($cars as $car)
                    @foreach($cars_images as $image)
                        @if($image->carId==$car->id)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="card">
                                <div class="view view-cascade">
                                        <img
                                            src="{{assetImage($image->cover)}}"
                                            class="card-img-top" alt="..."/>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">{{$car->title}}</a></h5>
                                    <div style="display: flex; justify-content: space-around">
                                        <p class="card-text"><strong>{{$car->price}}</strong></p>
                                        <p class="card-text"><i class="fa fa-car"></i><strong> {{$car->mileage}}</strong></p>
                                        <p class="card-text"><i class="fa fa-fire"></i><strong> {{$car->value}}</strong></p>
                                        <p class="card-text"><i class="fa fa-calendar"></i><strong> {{$car->year}}</strong></p>
                                    </div>
                                    <p class="card-text" style="font-size: 14px">Цена указана без учёта растаможки</p>
                                    <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Посмотреть</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endsection
