<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('carros')->truncate();
        factory(App\Carro::class, 30)->create();
    }
}
