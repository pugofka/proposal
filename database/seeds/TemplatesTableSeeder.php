<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->truncate();
        \App\Template::create([
            'name' => 'Сайт-визитка',
        ]);

        \App\Template::create([
            'name' => 'Промо-сайт',
        ]);

        \App\Template::create([
            'name' => 'Лэндинг',
        ]);

        \App\Template::create([
            'name' => 'Интернет-магазин',
        ]);

        \App\Template::create([
            'name' => 'Корпоративный сайт',
        ]);
    }
}
