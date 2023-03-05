<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Photo_ambiance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Photo_ambianceController extends Controller
{
    public function index()
    {   
        // récupérer la liste des photo_ambiances   
          $photo_ambiances = Photo_ambiance::all();
        
        // transmission des photo_ambiance à la vue
         return view('admin.photo_ambiance.index', [
            'photo_ambiances'=> $photo_ambiances,

        ]);
    }

      /**
     * Affiche un formulaire de création de photo_ambiance
     *
     * @return Response
     */
    public function create()
    {
        // valeur par défaut
       $photo_ambiance = new stdClass;
       
      
       $photo_ambiance->chemin  = '';
       $photo_ambiance->ordre  = 0;
       $photo_ambiance->legende  = '';
       
       

        //transmission des valeurs par défaut à la vue
         return view('admin.photo_ambiance.create',[
            'photo_ambiance'=> $photo_ambiance,
    
        ]);
    }
    
     /**
     * Enregistre les données d'une nouvelle photo_ambiance dans la BDD
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'chemin' => 'required|min:1|max:100',
            'ordre' => 'required|numeric|gte:0',
            'legende' => 'required|min:1|max:1000',
            

        ]);
         
        //création d'une photo_ambiance dans la bdd
        $photo_ambiance = new Photo_ambiance;
        $photo_ambiance->chemin =$request->get('chemin');
        $photo_ambiance->ordre =$request->get('ordre');
        $photo_ambiance->legende =$request->get('legende ');
        $photo_ambiance->save();

        $request->session()->flash('confirmation','La création a bien été effectuée.');

        return redirect()->route('admin.photo_ambiance.index');

    }
    
    /**
     * Affiche un formulaire de modification d'une photo_ambiance
     *
     * @param integer $id identifiant de la photo_ambiance
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération de la photo_ambiance
        $photo_ambiance = Photo_ambiance::find($id);

        if (!$photo_ambiance){
            abort(404);
        }
       

        // transmission de la photo_ambiance à la vue
        return view('admin.photo_ambiance.edit',[
            'photo_ambiance'=> $photo_ambiance,
    
        ]);
    }

    /**
     * Met à jour les données d'une photo_ambiance existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'chemin' => 'required|min:1|max:100',
            'ordre' => 'required|numeric|gte:0',
            'legende' => 'required|min:1|max:1000',
            

        ]);
        
    
    
     //récupération de la photo_ambiance dans la bdd
     $photo_ambiance = Photo_ambiance::find($id);

     // affichage d'une erreur 404 si la photo_ambiance est introuvable

     if(!$photo_ambiance){
         abort(404);
     }
     
     $photo_ambiance->chemin =$request->get('chemin');
    
     $photo_ambiance->save();
     

     $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

     return redirect()->route('admin.photo_ambiance.edit',['id'=> $photo_ambiance->id]);

    }

    public function delete(Request $request, int $id)
    {
        $photo_ambiance = Photo_ambiance::find($id);

        if (!$photo_ambiance){
            abort(404);
        }

        $photo_ambiance->delete(); 

        $request->session()->flash('confirmation','La suppression a bien été effectuée.');

        return redirect()->route('admin.photo_ambiance.index');
    }
}

