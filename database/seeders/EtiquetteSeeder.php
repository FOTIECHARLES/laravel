<?php

namespace Database\Seeders;

use Faker;
use App\Models\Etiquette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetteSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $faker = Faker\Factory::create('fr_FR');
        // 2 Etiquettes
        $etiquetteDatas = [
            [ 
               'nom' => 'Foo',
               'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing.',
            ],
            [
               'nom' => 'Bar',
               'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            ],
        ];

        foreach ($etiquetteDatas as $etiquetteData){   
            $etiquette = new Etiquette();
            $etiquette->nom=$etiquette["nom"];
            $etiquette->description=$etiquette["description"];
            $etiquette->save();   
        }
        // // 13 Etiquettes
        // for($i=0; $< 13; $i++)   
   
    }
}
