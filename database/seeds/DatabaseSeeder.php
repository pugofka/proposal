<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);

//        DB::table('users')->truncate();
//        \App\User::create([
//           'name' => 'Name',
//           'email' => 'email@domain.com',
//           'password' => bcrypt('secret'),
//       ]);

        $this->call(StagesSeeder::class);
    }
}
