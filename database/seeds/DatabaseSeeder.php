<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Services\LoremIpsumGenerator;
use App\Models\DocumentType;
use App\Models\Advert;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $lipsum = new LoremIpsumGenerator;

        DocumentType::create([
            'title' => 'Аттестат',
            'slug' => 'cert'
        ]);

        DocumentType::create([
            'title' => 'Удостоверение личности',
            'slug' => 'pass'
        ]);

        Advert::create([
            'title' => 'Названа новая богатейшая женщина России',
            'body' => $lipsum->getContent(200),
        ]);

        Advert::create([
            'title' => 'Манчестер Юнайтед» сыграл вничью с «Брюгге» в первом матче 1/16 финала Лиги Европы',
            'user_id' => 1,
            'body' => $lipsum->getContent(150),
        ]);

        Advert::create([
            'title' => 'Россию вновь обвинили в участии в переизбрании Трампа',
            'body' => $lipsum->getContent(100),
        ]);

        Advert::create([
            'title' => 'Культура Заголовок',
            'user_id' => 2,
            'body' => $lipsum->getContent(50),
        ]);

        User::create([
            'IIN' => '012345678901',
            'first_name' => 'Бузанов',
            'middle_name' => 'Азамат',
            'last_name' => 'Аскарович',
            'password' => bcrypt('123'),
            'email' => 'azbuzanov@gmail.com',
        ]);

        User::create([
            'IIN' => '000000000000',
            'first_name' => 'Wrigley',
            'middle_name' => 'Cate',
            'password' => bcrypt('123'),
            'email' => 'wrigley@gmail.com',
        ]);

        Profile::create([
            'user_id' => 1,
            'birthday' => '2020-04-07',
            'gender' => 'М',
            'phone' => '87900000000',
            'address' => $lipsum->getContent(40),
            'school' => $lipsum->getContent(30),
            'graduation_year' => 2020
        ]);

        Profile::create([
            'user_id' => 2,
            'birthday' => '2020-11-21',
            'gender' => 'Ж',
            'phone' => '84511100000',
            'address' => $lipsum->getContent(40),
            'school' => $lipsum->getContent(30),
            'graduation_year' => 2019
        ]);
    }
}
