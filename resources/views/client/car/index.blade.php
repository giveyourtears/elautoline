@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <main id="main">
        <div class="container" id="header2">
            <div class="d-flex justify-content-between align-items-center">
                <h2>{{$car->title}}</h2>
            </div>
        </div>

        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                <div id="slider" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators"
                                            data-slide-to="0"
                                            class="active"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($car_images as $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img class="d-block w-100"
                                                     src="{{assetImage($image->cover)}}"
                                                     alt="carImage{{$loop->iteration}}"/>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#slider" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Предыдущая</span>
                                    </a>
                                    <a class="carousel-control-next" href="#slider" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Следующая</span>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>{{$car->title}}</h3>
                            <ul>
                                <li><strong>Объем</strong>: {{$car->volume}}</li>
                                <li><strong>Цена</strong>: {{$car->price}}$</li>
                                <li><strong>Год</strong>: {{$car->year}}</li>
                                <li><strong>Пробег</strong>: {{$car->mileage}}км</li>
                            </ul>
                            {{--                            <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Заказать</a>--}}
                        </div>
                        <div class="portfolio-description">
                            <h2>Информация</h2>
                            <p>
                                {{$car->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
