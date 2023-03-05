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
                'chemin'=>'img/ambiance/alex-haney-CAhjZmVk5H4-unsplash(1).jpg',
                'ordre'=> 0,
                'legende'=>'',
            ],
            [
                'chemin'=>'img/ambiance/ben-moreland-8wWpDF4Av-Y-unsplash.jpg',
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

