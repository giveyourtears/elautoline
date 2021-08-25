<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $data = [
        [
            'id' => 1,
            'main_title' => "Заказ Odri May",
            'main_subtitle' => "Данные для отправки заказа Odri May.❗Если Вы оформляете доставку заграницу, все данные укажите латинскими буквами",
            'fio_title' => "Фамилия Имя Отчество",
            'fio_subtitle' => "Фамилия Имя Отчество того человека, кто будет получать заказ",
            'number_title' => "Номер телефона",
            'number_subtitle' => "Номер телефона того человека, кто будет получать заказ. Пример заполнения 79805148068",
            'number_title2' => "Дополнительный номер телефона",
            'number_subtitle2' => "Укажите Ваш второй номер или номер по которому курьер может позвонить для вручения посылки, если не смог дозвониться до Вас. Этот номер желательно указать, так как не дозвонившись раз, курьер уезжает и доставку переносят на другой день. Если у Вас нет дополнительного номера поставьте прочерк " - "",
            'inst_title' => "Ваш ник в instagram",
            'inst_subtitle' => "Ваш ник в instagram, без @ Пример: Durov . УКАЖИТЕ, ПОЖАЛУЙСТА, ВАШ НИК В ИНСТАГРАМ КОРРЕКТНО. Он необходим как дополнительный канал связи с Вами, если не получилось связаться с Вами по основному телефону",
            'city_title' => "Город получателя",
            'city_subtitle' => "Город получателя. Если Вы живете за МКАДом, указывайте корректный населенный пункт, так как CDEK считает, что за МКАДом не Москва и сроки доставки в МО 2-4 рабочих дня",
            'params_title' => "❗Важно при снятии мерок",
            'params_subtitle' => "Снимайте мерки в бюстгальтере с естественной формой чашки «мягкой» без поролона и формованных чашек. Бюстгальтер не должен деформировать грудь, но собирать ее и не быть слишком тугим под грудью

Обратите внимание, что при измерении Обхвата под Грудью (ОПГ), сантиметр должен туго обхватывать вас. А при измерении Обхвата груди (ОГ) – наоборот, должен лежать свободно, не стягивая грудные железы, измерение проводим строго через выступающие сосковые точки груди.

При измерении ОПГ и ОГ сантиметр должен находится строго в горизонтальном положении (параллельно полу), смотрите на себя в зеркало в профиль или попросите кого-то вам помочь

Если у вас импланты и грудь хорошо держит форму, снять мерки можно обнажённой",
            'boobs_link' => "https://youtu.be/_tvMRfqckv4",
            'under_boobs_link' => "https://youtu.be/-yLVIu2a7n0",
            'size_title' => "Размер лифа",
            'size_subtitle' => "(What size deliverypage do you wear?) Какой обычно размер лифа носите (посмотрите на бирке лифа параметр EU)? Пример: 75В",
            'secure_title' => "Нам важно это знать, чтобы лучше проработать ваш размер. Потому что, при условии одинаковых мерок, размер чашки лифа для натуральной груди и груди с имплантами будет разный.",
            'secure_subtitle' => "ЕСЛИ ВЫ НЕ ХОТИТЕ РАСКРЫВАТЬ ЭТУ ИНФОРМАЦИЮ ИЛИ ЗАКАЗЫВАЕТЕ В ПОДАРОК И НЕ ЗНАЕТЕ ЭТОЙ ИНФОРМАЦИИ - ПРОПУСТИТЕ ЭТОТ ВОПРОС",
            'about_title' => "У вас импланты или натуральная грудь?",
            'price_title' => "Стоимость Вашего заказа",
            'price_subtitle' => "Укажите в этом поле стоимость Вашего заказа (пример: 9800)",
            'order_title' => "Где Вы делали заказ?",
            'order_subtitle' => "Где Вы общались с менеджером, чтобы сделать заказ?",
            'where_title' => "Откуда Вы о нас впервые узнали? Для нас это очень важно!",
            'where_subtitle' => "Раздел 'Рекомендации' находятся в этой вкладке",
        ]
    ];

    public function run()
    {
        DB::table('home_pages')->truncate();
        DB::table('home_pages')->insert($this->data);
    }
}
