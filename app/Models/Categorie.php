<?php

namespace App\Models;

use App\Models\Plat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie';
    protected $primaryKey = 'id';
   
   /**
    * Cette fonction permet de récupérer les plats 
    *
    * @return Plat
    */
    public function platsSorteByNom()
   {
      return $this->hasMany(Plat::class)
        ->orderBy ('nom','asc')
    ;
    }
   /**
    * Cette fonction permet de récupérer les plats dans l'ordre alphébétique des noms
    * 
    * @return Plat
    */
    public function platsSorteByPrix()
   {
      return $this->hasMany(Plat::class)
        ->orderBy('prix','asc')
        ;
    }   
}
