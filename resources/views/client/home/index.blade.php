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
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="card">
                        <div class="view view-cascade">
                            <img src="https://images.unsplash.com/photo-1597404294360-feeeda04612e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="..."/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">FORD MUSTANG</a></h5>
                            <div style="display: flex; justify-content: space-around">
                                <p class="card-text" ><strong>$2000</strong></p>
                                <p class="card-text" ><i class="fa fa-car"></i><strong> 40000км</strong></p>
                                <p class="card-text" ><i class="fa fa-fire"></i><strong> Бензин</strong></p>
                                <p class="card-text" ><i class="fa fa-calendar"></i><strong> 2016г</strong></p>
                            </div>
                            <p class="card-text" style="font-size: 14px">Цена указана без учёта растаможки</p>
                            <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Посмотреть</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="card">
                        <div class="view view-cascade">
                            <img src="https://images.unsplash.com/photo-1494905998402-395d579af36f?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="..."/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">FORD MUSTANG</a></h5>
                            <div style="display: flex; justify-content: space-around">
                                <p class="card-text" ><strong>$2000</strong></p>
                                <p class="card-text" ><i class="fa fa-car"></i><strong> 40000км</strong></p>
                                <p class="card-text" ><i class="fa fa-fire"></i><strong> Бензин</strong></p>
                                <p class="card-text" ><i class="fa fa-calendar"></i><strong> 2016г</strong></p>
                            </div>
                            <p class="card-text" style="font-size: 14px">Цена указана без учёта растаможки</p>
                            <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Посмотреть</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="card">
                        <div class="view view-cascade">
                            <img src="https://images.unsplash.com/photo-1541443131876-44b03de101c5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="..."/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">BMW</a></h5>
                            <div style="display: flex; justify-content: space-around">
                                <p class="card-text" ><strong>$2000</strong></p>
                                <p class="card-text" ><i class="fa fa-car"></i><strong> 40000км</strong></p>
                                <p class="card-text" ><i class="fa fa-fire"></i><strong> Бензин</strong></p>
                                <p class="card-text" ><i class="fa fa-calendar"></i><strong> 2016г</strong></p>
                            </div>
                            <p class="card-text" style="font-size: 14px">Цена указана без учёта растаможки</p>
                            <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Посмотреть</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
