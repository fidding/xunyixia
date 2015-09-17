<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UserTableSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TradeTableSeeder::class);
        $this->command->info('Excity table seeded!');
        Model::reguard();
    }
}
