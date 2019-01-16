<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Stage;

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
        Stage::create([
            'name' => 'Проектирование',
            'sort' => '100',
            'active' => true,
        ]);

        Stage::create([
            'name' => 'Дизайн',
            'sort' => '110',
            'active' => true,
        ]);

        Stage::create([
            'name' => 'Вёрстка',
            'sort' => '120',
            'active' => true,
        ]);

        Stage::create([
            'name' => 'Программирование',
            'sort' => '130',
            'active' => true,
        ]);
    }
}
