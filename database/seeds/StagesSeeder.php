<?php

use Illuminate\Database\Seeder;

class StagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stages')->truncate();
        \App\Stage::create([
            'name' => 'Проектирование',
            'sort' => '100',
            'active' => true,
        ]);

        \App\Stage::create([
            'name' => 'Дизайн',
            'sort' => '110',
            'active' => true,
        ]);

        \App\Stage::create([
            'name' => 'Вёрстка',
            'sort' => '120',
            'active' => true,
        ]);

        \App\Stage::create([
            'name' => 'Программирование',
            'sort' => '130',
            'active' => true,
        ]);
    }
}
