<?php

namespace Database\Seeders;

use App\Models\Photo_ambiance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Photo_ambianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $photoDatas = [
            [
                'chemin'=>'img/ambiance/pexels-picha-6210449.jpg',
                'ordre'=> 0,
                'legende'=>'',
            ],
            [
                'chemin'=>'img/ambiance/pexels-picha-6210433.jpg',
                'ordre'=> 0,
                'legende'=>'',
            ],
        ];
        
        foreach ($photoDatas as $photoData){
            //création d'une nouvelle photo
            $photo = new Photo_ambiance();
            //selection fichier jpg
            $photo->chemin = $photoData["chemin"];
            $photo->ordre = $photoData["ordre"];
            $photo->legende = $photoData["legende"];
            //sauvegarde de la BDD
            $photo->save();
        }
    }
}

