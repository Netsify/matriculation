<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Services\LoremIpsumGenerator;
use App\Models\DocumentType;
use App\Models\Advert;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;

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

        Role::create([
            'title' => 'Администратор',
            'slug' => 'admin'
        ]);

        Role::create([
            'title' => 'Модератор',
            'slug' => 'moder'
        ]);

        Role::create([
            'title' => 'Пользователь',
            'slug' => 'user'
        ]);

        DocumentType::create([
            'title' => 'Документ, удостоверяющий личность поступающего',
            'slug' => 'pass'
        ]);

        DocumentType::create([
            'title' => 'Документ об образовании (аттестат)',
            'slug' => 'edu'
        ]);

        DocumentType::create([
            'title' => 'Медицинская справка № 086-У',
            'slug' => 'med'
        ]);

        DocumentType::create([
            'title' => 'Фотокарточка размером 3х4',
            'slug' => 'photo'
        ]);

        DocumentType::create([
            'title' => 'Приписное свидетельство (для юношей)',
            'slug' => 'mil'
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
            'role_id' => 1,
            'password' => bcrypt('123'),
            'email' => 'azbuzanov@gmail.com',
        ]);

        User::create([
            'IIN' => '000000000000',
            'first_name' => 'Wrigley',
            'middle_name' => 'Cate',
            'role_id' => 2,
            'password' => bcrypt('123'),
            'email' => 'wrigley@gmail.com',
        ]);

        User::create([
            'IIN' => '111111111111',
            'first_name' => 'Rowen',
            'middle_name' => 'Matthew',
            'role_id' => 3,
            'password' => bcrypt('123'),
            'email' => 'rowen@gmail.com',
        ]);

        Profile::create([
            'user_id' => 1,
            'birthday' => '2020-04-07',
            'gender' => 'М',
            'phone' => '87900000000',
            'address' => '672 Jefferson St Sainte Genevieve, Missouri(MO), 63670',
            'school' => 'Spring Gardens Grammar School',
            'graduation_year' => 2020
        ]);

        Profile::create([
            'user_id' => 2,
            'birthday' => '2020-11-21',
            'gender' => 'Ж',
            'phone' => '84511100000',
            'address' => 'Po Box 2588 Silverthorne, Colorado(CO), 80498',
            'school' => 'Green Valley Middle School',
            'graduation_year' => 2019
        ]);
    }
}
