<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Photo_plat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Photo_platController extends Controller
{
    public function index()
    {   
        // récupérer la liste des Photo_plats   
          $photo_plats = Photo_plat::all();
        
        // transmission des Photo_plat à la vue
         return view('admin.photo_plat.index', [
            'photo_plats'=> $photo_plats,

        ]);
    }

      /**
     * Affiche un formulaire de création de photo_plat
     *
     * @return Response
     */
    public function create()
    {
        // valeur par défaut
       $photo_plat = new stdClass;
       
      
       $photo_plat->chemin  = '';
       
       

        //transmission des valeurs par défaut à la vue
         return view('admin.photo_plat.create',[
            'photo_plat'=> $photo_plat,
    
        ]);
    }
    
     /**
     * Enregistre les données d'une nouvelle photo_plat dans la BDD
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo_plat' => 'max:1000',
            

        ]);
         
        //création d'une photo_plat dans la bdd
        $photo_plat = new Photo_plat;
        $photo_plat->chemin =$request->get('chemin');
        $photo_plat->save();

        $request->session()->flash('confirmation','La création a bien été effectuée.');

        return redirect()->route('admin.photo_plat.index');

    }
    
    /**
     * Affiche un formulaire de modification d'une photo_plat
     *
     * @param integer $id identifiant de la photo_plat
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération de la photo_plat
        $photo_plat = Photo_plat::find($id);

        if (!$photo_plat){
            abort(404);
        }
       

        // transmission de la photo_plat à la vue
        return view('admin.photo_plat.edit',[
            'photo_plat'=> $photo_plat,
    
        ]);
    }

    /**
     * Met à jour les données d'une photo_plat existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'photo_plat' => 'max:1000',
            

        ]);
        
    
    
     //récupération de la photo_plat dans la bdd
     $photo_plat = Photo_plat::find($id);

     // affichage d'une erreur 404 si la photo_plat est introuvable

     if(!$photo_plat){
         abort(404);
     }
     
     $photo_plat->chemin =$request->get('chemin');
    
     $photo_plat->save();
     

     $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

     return redirect()->route('admin.photo_plat.edit',['id'=> $photo_plat->id]);

    }

    public function delete(Request $request, int $id)
    {
        $photo_plat = Photo_plat::find($id);

        if (!$photo_plat){
            abort(404);
        }

        $photo_plat->delete(); 

        $request->session()->flash('confirmation','La suppression a bien été effectuée.');

        return redirect()->route('admin.photo_plat.index');
    }
}
