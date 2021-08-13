<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('meta-title')</title>
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Jost:wght@300;400&display=swap" rel="stylesheet">
    <link href="{{ mix('/css/client/app.css') }}" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" integrity="sha512-F7WyTLiiiPqvu2pGumDR15med0MDkUIo5VTVyyfECR5DZmCnDhti9q5VID02ItWjq6fvDfMaBaDl2J3WdL1uxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js" integrity="sha512-NWNl2ZLgVBoi6lTcMsHgCQyrZVFnSmcaa3zRv0L3aoGXshwoxkGs3esa9zwQHsChGRL4aLDnJjJJeP6MjPX46Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script defer src="{{mix("/js/client/vendor.js")}}"></script>
    <script defer src="{{mix("/js/client/app.js")}}"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('js')
    @yield('css')
</head>
<body>
<div>
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="fa fa-envelope"></i><a href="mailto:contact@example.com" class="mr-3">elautoline@gmail.com</a>
                <i class="fa fa-phone"></i><a href="tel:+375291111111">+375 29 111-11-11</a>
            </div>
            <div class="social-links d-none d-md-block">
                <a href="/vk" class="vk"><i class="fa fa-vk"></i></a>
                <a href="/instagram" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="/telegram" class="telegram"><i class="fa fa-telegram"></i></a>
            </div>
        </div>
    </section>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div class="logo me-auto">
                <a href=""><img src="/public/logo.jpg" alt="logo" class="img-fluid"/></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="">Главная</a></li>
                    <li><a class="nav-link scrollto" href="/about">О нас</a></li>
                    <li><a class="nav-link scrollto" href="/contacts">Контакты</a></li>
                    <li><a class="nav-link scrollto" href="/calcdelievery">Доставка</a></li>
{{--                    {/* <li><a class="nav-link scrollto" href="#team">Team</a></li> */}--}}
{{--                    {/* <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">Drop Down 1</a></li>--}}
{{--                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">Deep Drop Down 1</a></li>--}}
{{--                                    <li><a href="#">Deep Drop Down 2</a></li>--}}
{{--                                    <li><a href="#">Deep Drop Down 3</a></li>--}}
{{--                                    <li><a href="#">Deep Drop Down 4</a></li>--}}
{{--                                    <li><a href="#">Deep Drop Down 5</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="#">Drop Down 2</a></li>--}}
{{--                            <li><a href="#">Drop Down 3</a></li>--}}
{{--                            <li><a href="#">Drop Down 4</a></li>--}}
{{--                        </ul>--}}
{{--                    </li> */}--}}
{{--                    {/* <li><a class="nav-link scrollto" href="#contact">Contact</a></li> */}--}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row d-flex justify-content-center justify-content-md-between">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>elAutoline</h3>
                            <p>
                                Московский <br />
                                тестовый текст
                                <br />
                                <br />
                                <strong>Телефон:</strong> +375 29 111 11 11
                                <br />
                                <strong>Email:</strong> elAutoline@gmail.com
                                <br />
                            </p>
                            <div class="social-links mt-3">
                                <a href="/vk" class="vk">
                                    <i class="fa fa-vk"></i>
                                </a>
                                <a href="/instagram" class="instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="/telegram" class="telegram">
                                    <i class="fa fa-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Навигация</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Главная</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">О нас</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Услуги</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Контакты</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Что-то придумаем</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Наши услуги</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Машины</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Машины</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Машины</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Машины</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Машины</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Подписаться на обновления</h4>
                        <p>какой-то текст</p>
                        <form action="" method="post">
                            <input type="email" name="email" />
                            <input type="submit" value="Подписаться!" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright
                <strong>
                    <span>elAutoLine</span>
                </strong>
                . All Rights Reserved
            </div>
            <div class="credits">
                Create by
                <a href="https://instagram.com/giveyourtears">giveyourtears</a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
