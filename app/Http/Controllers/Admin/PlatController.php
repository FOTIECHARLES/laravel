<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\Photo_plat;
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
 
      /**
     * Affiche un formulaire de création d'un plat
     *
     * @return Response
     */
    public function create()
    {   
        $categories = Categorie::all();
        $etiquettes = Etiquette::all();
        $photo_plats = Photo_Plat::all();

        return view('admin.plat.create',[
            'categories' => $categories,
            'etiquettes' => $etiquettes,
            'photo_plats' => $photo_plats,
        ]);
    }
   
    /**
     * Enregistre les données d'un nouveau plat dans la BDD
     * 
     * @return Response
     */ 
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'prix' => 'required|numeric|min:1|max:200', 
            'description'=>'required|min:10|max:1000',
            'epingle'=> '',
            'photo_plat_id'=>'',
            'categorie_id'=>'',

        ]);
        
        //création d'un plat dans la bdd
        $plat = new Plat;
        //  $etiquette = new Etiquette;
        
        $plat->nom =$request->get('nom');
        $plat->prix =$request->get('prix');
        $plat->description =$request->get('description');
        $plat->epingle =$request->get('epingle', false);
        $plat->photo_plat_id =$request->get('photo_plat_id', false);
        $plat->categorie_id =$request->get('categorie_id', false);
        $plat->save();
        // $etiquette->save()

        $request->session()->flash('confirmation','La création a bien été effectuée.');

        return redirect()->route('admin.plat.index');

        
    }

    /**
     * Affiche un formulaire de modification d'un plat
     *
     * @param integer $id identifiant du plat
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération du plat
        $plat = Plat::find($id);

        if (!$plat){
            abort(404);
        }

        // transmission de la plat à la vue
        return view('admin.plat.edit',[
            'plat'=> $plat,

    
        ]);
    }

 /**
     * Met à jour les données d'un plat existant dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        //voir si un champ existe ou pas dans le formulaire
        // dump($request->has('baz'));
        // dump($request->get('nom'));
        //permet de voir toutes les données du formulaire validé par
        // dd($request->all());

        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'prix' => 'required|numeric|min:1|max:200', 
            'description'=>'required|min:10|max:1000',
            'epingle'=> '',

           
        ]);
        
        
        //récupération du plat dans la bdd
        $plat = Plat::find($id);

        // affichage d'une erreur 404 si la plat est introuvable

        if(!$plat){
            abort(404);
        }
        
        $plat->nom =$request->get('nom');
        $plat->prix =$request->get('prix');
        $plat->description =$request->get('description');
        $plat->epingle =$request->get('epingle', false);
        $plat->save();
        

        $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

        return redirect()->route('admin.plat.edit',['id'=> $plat->id]);

    }  
      
    public function delete(Request $request, int $id)
    {
        $plat = Plat::find($id);

        if (!$plat){
            abort(404);
        }

        $plat->delete(); 

        $request->session()->flash('confirmation','La suppression a bien été effectuée.');

        return redirect()->route('admin.plat.index');
    }

}
