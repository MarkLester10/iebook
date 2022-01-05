<?php

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'name' => 'Mark Lester Morta',
                'email' => 'marklester10.mlsm@gmail.com',
                'password' => bcrypt('passw0rd'),
                ],
                [
                'name' => 'Shaira Grace Lasam',
                'email' => 'shairagracelasam@gmail.com',
                'password' => bcrypt('passw0rd'),
                ],
                [
                'name' => 'Win Lester Dichoso',
                'email' => 'winlesterdichoso@gmail.com',
                'password' => bcrypt('passw0rd'),
                ]
        ]);
    }
}
