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
            'name' => 'Php-Laravel',
        ]);
        DB::table('groups')->insert([
            'name' => 'Python-Django',
        ]);
        DB::table('groups')->insert([
            'name' => 'Java-Spring',
        ]);
        DB::table('groups')->insert([
            'name' => 'Python-Slack',
        ]);
        DB::table('groups')->insert([
            'name' => 'Php-Zend',
        ]);
    }
}
