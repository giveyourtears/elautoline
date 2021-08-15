@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch">
                    <div class="content">
                        <h3>{{$abouts[0]->title}}</h3>
                        <p>
                            {{$abouts[0]->description}} <strong>Вы</strong> выбрали именно нас.
                        </p>
                        <a href="/" class="about-btn"><span>Главная</span> <i class="fa fa-arrow-right"
                                                                              style="font-size: 12px; padding-left: 10px"></i></a>
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            @for($i=1; $i < count($abouts); $i++)
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="fa fa-car"></i>
                                <h4>{{$abouts[$i]->title}}</h4>
                                <p>{{$abouts[$i]->description}}</p>
                            </div>
{{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">--}}
{{--                                <i class="fa fa-car"></i>--}}
{{--                                <h4>Поможем с выбором--}}
{{--                                </h4>--}}
{{--                                <p>Приобрести машину в наше время легко, а вот выбрать именно то транспортное средство,--}}
{{--                                    которое удовлетворит всем пожеланиям, требованиям и запросам – невероятно--}}
{{--                                    сложно.<br/> Мы поможем и подберем для вас лучший вариант!</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">--}}
{{--                                <i class="fa fa-get-pocket"></i>--}}
{{--                                <h4>Торги на всех аукционах--}}
{{--                                </h4>--}}
{{--                                <p>Мы учавствуем на всех аукционах и сможем выбрать самый выгодный вариант для вас!--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">--}}
{{--                                <i class="fa fa-truck"></i>--}}
{{--                                <h4>Надежная доставка--}}
{{--                                </h4>--}}
{{--                                <p>Доставим в любой порт. Рассчитываем несколько вариантов доставки в зависимости от--}}
{{--                                    места расположения аукциона.--}}
{{--                                </p>--}}
{{--                            </div>--}}
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
