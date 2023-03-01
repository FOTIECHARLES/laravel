<?php

namespace Database\Seeders;

use Faker;

use App\Models\Actu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create('fr_FR');

        //    2 actus avec des données statiques 
        $actuDatas = [
            [
                'jour_publication'=>'2023-03-11',
                'heure_publication'=> '12:00',
                'texte'=> 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, omnis.',
                 
            ],
            [
                'jour_publication'=>'2023-03-11',
                'heure_publication'=> '12:00',
                'texte'=> 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, omnis.',
            ],
        ];
    

     
        foreach ($actuDatas as $actuData){
            $actu = new Actu();
            $actu->jour_publication =$actuData['jour_publication'];
            $actu->heure_publication =$actuData['heure_publication'];
            $actu->texte=$actuData['texte'];
            $actu->save();
        }
            
        
        // // 50 actus avec des données
        for ($i=0; $i< 50; $i++) {
        
            $actu = new Actu();
            // //jour_publication 
            $actu->jour_publication = $faker->date('Y-m-d');
            // //heure_publication
            $actu->heure_publication = $faker->time('H:i');
            //texte
            $actu->texte = $faker->sentence(12);
            $actu->save();
        }

    
}
}
