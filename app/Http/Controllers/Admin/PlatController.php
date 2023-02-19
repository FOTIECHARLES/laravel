<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\PhotoPlat;
use App\Models\Plat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    public function index()
    {   
        // récupérer la liste des plats   
          $plats = Plat::all();
        
        // transmission des plats à la vue
         return view('admin.plat.index', [
            'plats'=> $plats,

        ]);
    }
 
    
    public function create()
    {   
        $categories = Categorie::all();
        $etiquettes = Etiquette::all();
        $photoPlats = PhotoPlat::all();

        return view('admin.plat.create',[
            'categories' => $categories,
            'etiquettes' => $etiquettes,
            'photoPlats' => $photoPlats,
        ]);
    }
    
    public function store(Request $request)
    {
        dd($request->all());
    }

}
