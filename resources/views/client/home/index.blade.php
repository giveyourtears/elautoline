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
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://images.unsplash.com/photo-1471479917193-f00955256257?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=2048&q=100" alt="First slide"/>
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 18px">Доставка из США</h5>
                    <p style="font-size: 30px">В кратчайшие сроки</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://images.unsplash.com/photo-1545056003-1f67120eceb4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2082&q=80" alt="Second slide"/>
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 30px">Растаможка авто из США</h5>
                    <p style="font-size: 18px">Окажем помощь в этом!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://wallpaperaccess.com/full/3723585.jpg" alt="Third slide"/>
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 30px">Услуги по подбору авто</h5>
                    <p style="font-size: 18px">Быстрая и профессиональная помощь в подборе автомобильного транспорта из США</p>
                </div>
            </div>
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
                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
                    <span>01</span>
                    <h4>Процесс покупки</h4>
                    <p>Внесение депозита. Участие и покупка по всей стране. Оплата за автомобиль.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                    <span>02</span>
                    <h4>Транспортировка в порт</h4>
                    <p>Транспортировка автомобиля в порт при помощи транспортных компаний. Средний срок доставки от
                        2 до 10 дней.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
                    <span>03</span>
                    <h4>Погрузка в контейнер</h4>
                    <p>Таможня США, примерный срок от 3 до 12 дней. Погрузка в контейнер. Предоставление номера
                        контейнера, по которому вы сможете отследить движение.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
                    <span>04</span>
                    <h4>Перевозка автомобиля по морю</h4>
                    <p>Контейнер погружается на корабль. Средний срок доставки от 30 до 60 дней.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
                    <span>05</span>
                    <h4>Таможня</h4>
                    <p>Прибытие автомобиля в таможенный пункт заказчика. Таможенное оформление. Стоимость
                        растаможки</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
                    <span>06</span>
                    <h4>Получение авто</h4>
                    <p>От клиента нужны оригиналы техпаспорта (Title), документ подтверждения приобретения (Bill of Sale/ invoice ), транспортная накладная (Bill of Landing).</p>
                </div>
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
