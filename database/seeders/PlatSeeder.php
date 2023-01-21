<?php

namespace Database\Seeders;

use Faker;
use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\PhotoPlat;
use App\Models\Plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $faker = Faker\Factory::create('fr_FR');

        // toutes les catégories
        //categorie::all() c'est équivalent d'un SQL 'SELECT*FROM categorie'
        $categories = Categorie::all();
        // le nombre d'éléments dans la collection
        $categoriesCount = $categories->count();
         // la première catégorie
        $categorieEntree = $categories->first();
        // la deuxième catégorie(id 2 plat)
        // categorie::find(2) c'est équivalent du SQL 'SELECT *FROM categorie WHERE id = 2'
        $categoriePlat = Categorie::find(2);
        //la troisième catégorie (id 3 plat)
        $categorieDessert = Categorie::find(3);
        // les autres categories restantes
        $categoriePetitDejeuner = Categorie::find(4);
        $categorieBoisson = Categorie::find(5);
        
        // toutes les étiquettes
        //étiquette::all() c'est équivalent d'un SQL 'SELECT*FROM étiquette'
        $etiquettes = Etiquette::all();
        // le nombre d'éléments dans la collection
        $etiquettesCount = $etiquettes->count();
        
        $etiquetteVegetarien = Etiquette::find(1);
        $etiquettePoisson = Etiquette::find(2);
        $etiquetteBoeuf = Etiquette::find(3);
        $etiquettePoulet = Etiquette::find(4);
        $etiquetteAgneau = Etiquette::find(5);
        
        $etiquetteIds =$etiquettes->modelKeys();

        //toutes les photos
        $photos = PhotoPlat::all();  
        // la première photo
       $photo = $photos->first();
        
       $platDatas = [              
            [
                'nom'=>'Foo',
                'description' => 'Lorem, ipsum dolor sit amet consectetur.',
                'prix' => 23.16,
                'epingle'=> false,
                'photo_plat_id'=> $photo->id,
                'categorie_id' => $categorieEntree->id,
                'etiquettes' => [
                    $etiquetteVegetarien,
                    $etiquettePoisson,

                ],
            ],
            [
                'nom'=>'bar',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing .',
                'prix' => 23.15,
                'epingle'=> true,
                'photo_plat_id'=> $photo->id,
                'categorie_id' => $categoriePlat->id,
                'etiquettes' => [
                    $etiquettePoulet,
                    $etiquetteBoeuf,

                ],
            ],

            [
                'nom'=>'baz',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
                'prix' => 23.14,
                'epingle'=> false,
                'photo_plat_id'=> $photo->id,
                'categorie_id' => $categorieDessert->id,
                'etiquettes' => [
                    $etiquettePoisson,

                ],
            ],
        ];
        foreach ($platDatas as $platData){      
            $plat = new Plat();
            $plat->nom =$platData ['nom'];
            $plat->description = $platData['description'] ;
            $plat->prix = $platData['prix'];
            $plat->epingle = $platData['epingle'];
            $plat->photo_plat_id = $platData['photo_plat_id'];
            
            $plat->categorie_id =$platData['categorie_id'];
            //sauvegarde de la BDD
            $plat->save();

            foreach($platData['etiquettes'] as $etiquette){
                $plat->etiquettes()->attach($etiquette->id);
                
            }

            
            
             
       }
        for($i = 0; $i < 100; $i++){
            //création  d'un nouveau plat
            $plat = new Plat();
            // affectation d'un nom
            $plat->nom =$faker->words(2, true);

            //affectation d'une description
            $plat->description = $faker->words(10, true) ;

            // affectation d'un prix
            // le prix est aléatoire, compris entre 1 et 50 avec deux chiffres après la virgule
            $plat->prix = random_int(100, 5000) / 100 ;

            // version alternative avec faker
            // $plat->prix = $faker->randomFloat(2, 1, 50);
            $plat->epingle =(bool) random_int(0, 1);

            //affectattion d'une photo
            $plat->photo_plat_id =$photo->id ;
            
            // affectation d'une categorie
            //la categorie est choisie au hasard 
            //un nombre aléatoire est tiré entre 0 et 5-1 (c-a-d 4)
            $categorieIndex = random_int(0, $categoriesCount - 1);

            // on utilise le nombre tiré au hasard pour accéder au Nième élément de la collectio de categories
            $categorie = $categories->get($categorieIndex);
            $plat->categorie_id = $categorie->id;

            //sauvegarde de la BDD
            $plat->save();

            //association d'étiquettes au plat
            $count= random_int(1, 5);
           $shortList = $faker->randomElements($etiquetteIds,  $count);
           $plat->etiquettes()->attach($shortList);
            
            
    
        }
    }
}
