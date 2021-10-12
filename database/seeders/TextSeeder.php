<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TextSeeder extends Seeder
{
    public function run()
    {
        DB::table('texts')->insert([
            [
                'id' => 1,
                'company_text' => 'Мы новая и динамично развивающаяся компания имеющая шестилетний опыт работы с одной из крупнейших компаний России по производству государственных регистрационных знаков для автомобилей, прицепов и мотоциклов ООО «Бластер Плюс».***Мы предлагаем нашим клиентам реставрацию, изготовлене дубликатов госномеров по приемлемой цене и отличного качества. Окраска госномеров производится специальным лаком Австрийской фирмы Rembrandtin, предназначенной для окраски заготовок со световозвращающей пленкой фирмы «Niрроn»(Япония).***Полный цикл производства осуществляется на высокотехнологичном оборудовании Немецкой фирмы UTSCH. Уникальность производства, квалифицированные сотрудники, многоуровневый контроль обеспечивают высочайшее качество выпускаемой продукции.',
                'privacy_policy' => 'Текст политики конфедициальности.',
            ],
        ]);
    }
}