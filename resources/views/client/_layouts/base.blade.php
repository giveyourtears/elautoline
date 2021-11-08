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
    <script src="https://kit.fontawesome.com/fe62968398.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css"
          integrity="sha512-F7WyTLiiiPqvu2pGumDR15med0MDkUIo5VTVyyfECR5DZmCnDhti9q5VID02ItWjq6fvDfMaBaDl2J3WdL1uxA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"
            integrity="sha512-NWNl2ZLgVBoi6lTcMsHgCQyrZVFnSmcaa3zRv0L3aoGXshwoxkGs3esa9zwQHsChGRL4aLDnJjJJeP6MjPX46Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="{{mix("/js/client/vendor.js")}}"></script>
    <script defer src="{{mix("/js/client/app.js")}}"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
            integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    @yield('js')
    @yield('css')
</head>
<body>
<div>
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="fas fa-envelope"></i><a href="mailto:elautoline@gmail.com" style="padding-right: 7px">elautoline@gmail.com</a>
                <i class="fas fa-phone ml-2"></i><a href="tel:+491623163574">+491623163574</a>
            </div>
            <div class="social-links d-none d-md-block">
                <a href="https://vk.com/elautoline" class="vk"><i class="fab fa-vk"></i></a>
                <a href="https://www.instagram.com/elautoline/" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://t.me/elautoline" class="telegram"><i class="fa fa-telegram"></i></a>
            </div>
        </div>
    </section>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div class="logo me-auto">
                <a href="/"><img src="/public/logo.jpg" alt="logo" class="img-fluid"/></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="">Главная</a></li>
                    <li><a class="nav-link scrollto" href="/about">О нас</a></li>
                    <li><a class="nav-link scrollto" href="/delivery">Доставка</a></li>
                    <li><a class="nav-link scrollto" href="/find">Поиск авто</a></li>
                    <li><a class="nav-link scrollto" href="/conditions">Условия</a></li>
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
                                <strong>Телефон BY:</strong> <a href="tel:+375297110992"
                                                                style="color: #fff; transition: 0.3s; display: inline-block; line-height: 1">+375297110992</a><br/>
                                <strong>Телефон DE:</strong> <a href="tel:+491623163574"
                                                                style="color: #fff; transition: 0.3s; display: inline-block; line-height: 1">+491623163574</a>
                                <br/>
                                <strong>Email:</strong> <a href="mailto:elautoline@gmail.com"
                                                           style="color: #fff; transition: 0.3s; display: inline-block; line-height: 1">elautoline@gmail.com</a>
                                <br/>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://vk.com/elautoline">
                                    <i class="fa fa-vk"></i>
                                </a>
                                <a href="https://www.instagram.com/elautoline/">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="https://t.me/elautoline">
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
                                <a href="/">Главная</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="/about">О нас</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="/delivery">Калькулятор доставки</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Подписаться на обновления</h4>
                        <form action="" method="post">
                            <input type="email" name="email"/>
                            <input type="submit" value="Подписаться!"/>
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
                Created by
                <a href="https://instagram.com/giveyourtears" style="color: #fff; transition: 0.3s; display: inline-block; line-height: 1">giveyourtears</a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
