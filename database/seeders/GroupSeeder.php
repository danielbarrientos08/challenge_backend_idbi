<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Java-Spring',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ratione sed necessitatibus officia libero, possimus dolorem ipsum eligendi maiores quia pariatur odit nobis! Nam animi ut maxime molestias? Vero, consequatur.',
            'url_img' => 'https://www.programaenlinea.net/wp-content/uploads/2018/06/spring-768x330.png',
        ]);
        DB::table('groups')->insert([
            'name' => 'Python-Django',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ratione sed necessitatibus officia libero, possimus dolorem ipsum eligendi maiores quia pariatur odit nobis! Nam animi ut maxime molestias? Vero, consequatur.',
            'url_img' => 'https://justcodeit.io/wp-content/uploads/2014/04/Python-y-django.jpg',
        ]);
        DB::table('groups')->insert([

            'name' => 'Php-Laravel',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ratione sed necessitatibus officia libero, possimus dolorem ipsum eligendi maiores quia pariatur odit nobis! Nam animi ut maxime molestias? Vero, consequatur.',
            'url_img' => 'https://d3puay5pkxu9s4.cloudfront.net/curso/2698/800_imagen.jpg',
        ]);
        DB::table('groups')->insert([
            'name' => 'Python-Flask',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ratione sed necessitatibus officia libero, possimus dolorem ipsum eligendi maiores quia pariatur odit nobis! Nam animi ut maxime molestias? Vero, consequatur.',
            'url_img' => 'https://sourcedexter.com/wp-content/uploads/2017/09/flask-python.png',
        ]);
        DB::table('groups')->insert([
            'name' => 'Php-Zend',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ratione sed necessitatibus officia libero, possimus dolorem ipsum eligendi maiores quia pariatur odit nobis! Nam animi ut maxime molestias? Vero, consequatur.',
            'url_img' => 'https://kinsta.com/es/wp-content/uploads/sites/8/2020/09/zend-framework-1.png',
        ]);
    }
}
