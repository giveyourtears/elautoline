@extends('client._layouts.base')

@section('js')
@endsection

@section('css')
@endsection


@section('content')
    <div class="container" style="padding: 50px 0">
        <div class="row copart">
            <div class="text">
                <p style="font-size: 21px">Copart – аукцион по продаже аварийных автомобилей. Это страховой аукцион и
                    здесь продают автомобили
                    страховые компании, банки, дилеры и частные лица. В основном – все автомобили с проблемами,
                    благодаря которым авто можно купить дёшево. Основные повреждения автомобилей с этого аукциона:
                <ul class="variants">
                    <li>
                        — автомобиль после ДТП
                    </li>
                    <li>
                        — автомобиль был поврежден водой
                    </li>
                    <li>
                        — автомобиль был повреждён огнём (пожар в самом автомобиле, пожар рядом с автомобилем, пожар под
                        капотом)
                    </li>
                    <li>
                        — автомобиль имеет серьёзные механические неисправности, которые ремонтировать в США нет смысла
                        из-за дорогого ремонта
                    </li>
                    <li>
                        — автомобиль был в угоне и найден полицией, но после того как владелец получил страховку.
                        Следовательно, автомобиль переходит в собственность страховой компании, которая реализует его с
                        аукциона
                    </li>
                    <li>
                        — автомобиль некачественно восстановлен после ДТП и не допущен к эксплуатации в США
                    </li>
                    <li>
                        — автомобиль был забран за долги (за невыплату кредита)
                    </li>
                </ul>
            </div>
            <div class="image">
                <img src="/public/copart.jpg" alt="copart">
                <a href="https://www.copart.com/">https://www.copart.com/</a>
            </div>
        </div>
        <div class="row copart" style="padding-top: 30px">
            <div class="image">
                <img src="/public/iaa.jpg" alt="copart" style="max-width: 70%; padding-bottom: 20px">
                <a href="https://www.iaai.com/">https://www.iaai.com/</a>
            </div>
            <div class="text">
                <p style="font-size: 21px">IAAI (Insurance Auto Auctions, Inc.) – Является вторым по величине
                    online-аукционом, где представлены поврежденные и аварийные автомобили.
                <p>Необходимо отметить, что IAAI — это страховой аукцион. Его главное отличие от классических
                    автомобильных аукционов США в том, что приоритетно на нём продаются американские, европейские,
                    японские битые машины от страховых компаний США. На IAAI практически нет некачественно
                    восстановленных после ДТП автомобилей, следовательно, меньше риск купить такой автомобиль. На
                    аукционе IAAI сложнее получить лицензию, чем на Copart, значит, там меньше покупателей и,
                    соответственно, ниже цены.</p>
            </div>
        </div>
    </div>
@endsection