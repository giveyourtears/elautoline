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
                            {{$abouts[0]->description}}
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
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
