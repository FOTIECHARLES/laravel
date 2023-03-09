<?php

namespace Database\Seeders;

use App\Models\Photo_plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Photo_platSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $photoDatas = [
            "img/plats/rix_sauce_tomate.jpg",
            "img/plats/pistache_avec_tubercule_de_manioc.jpg",
            "img/plats/pistache_avec_tubercule_de_manioc_image2.jpg",
            "img/plats/poulet_braisé.jpg",
            "img/plats/sauce_choux_tubercule_de_manioc.jpg"
        ];
        
        foreach ($photoDatas as $photoData){
            //création d'une nouvelle photo
            $photo = new Photo_plat();
            //selection fichier jpg
            $photo->chemin = $photoData;
            //sauvegarde de la BDD
            $photo->save();
        }
    }
}
