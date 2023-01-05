<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\photoPlat;
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
        // toutes les catégories
        //::all() c'est équivalent d'un SQL 'SELECT*FROM categorie'
        $categories = Categorie::all();
         // la première catégorie
        $categorieEntree = $categories->first();
        // la deuxième catégorie(id 2 plat)
        // categorie::find(2) c'est équivalent du SQL 'SELECT *FROM categorie WHER id = 2'
        $categoriePlat = Categorie::find(2);
        //la troisième catégorie (id 3 plat)
        $categorieDessert = Categorie::find(3);

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
         ],
        [
            'nom'=>'bar',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing .',
            'prix' => 23.15,
            'epingle'=> true,
            'photo_plat_id'=> $photo->id,
            'categorie_id' => $categoriePlat->id,
         ],

         [
            'nom'=>'baz',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
            'prix' => 23.14,
            'epingle'=> false,
            'photo_plat_id'=> $photo->id,
            'categorie_id' => $categorieDessert->id,
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
            $plat->save();

       }
   }
}
