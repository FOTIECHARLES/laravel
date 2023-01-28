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

        $photoDatas = [
            "img/plats/james-day-5YWf-5hyZcw-unsplash.jpg",
            "img/plats/adam-kool-ndN00KmbJ1c-unsplash.jpg",
            "img/plats/pexels-engin-akyurt-2673353(1).jpg",
            "img/plats/alex-haney-CAhjZmVk5H4-unsplash(1).jpg",
        ];
        
        foreach ($photoDatas as $photoData){
            //création d'une nouvelle photo
            $photo = new PhotoPlat();
            //selection fichier jpg
            $photo->chemin = $photoData;
            //sauvegarde de la BDD
            $photo->save();
        }
    }
}
