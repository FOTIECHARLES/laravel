<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $this->call([
            ActuSeeder::class,
            CategorieSeeder::class,
            EtiquetteSeeder::class,
            Photo_platSeeder::class,
            PlatSeeder::class,
            ReservationSeeder::class,
            RestaurantSeeder::class,
            UsersSeeder::class,
            Photo_ambianceSeeder::class,
        ]);
    }
}
