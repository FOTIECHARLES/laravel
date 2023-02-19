<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\PhotoPlat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $table = 'plat';
    protected $primaryKey = 'id';
     /**
     * cette fonction permet de recupérer la categorie
     *
     * @return Categorie
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
   
     /**
     * cette fonction permet de recupérer la photo
     *
     * @return PhotoPlat
     */
    public function photo()
    {
        return $this->belongsto(PhotoPlat::class,'photo_plat_id', 'id');
    }

    /**
     * cette fonction permet de recupérer la collection d'Etiquettes
     *
     * @return Collection
     */
    public function etiquettes()
    {
        return $this->belongsToMany(Etiquette::class);
    }
}
