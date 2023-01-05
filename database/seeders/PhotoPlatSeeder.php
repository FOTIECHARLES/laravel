<?php

namespace Database\Seeders;

use App\Models\PhotoPlat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoPlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //création d'une nouvelle photo
        $photo = new PhotoPlat();
        //selection fichier jpg
        $photo->chemin = "img/plats/image-generique.jpg";
        //sauvegarde de la BDD
        $photo->save();
    }
}
