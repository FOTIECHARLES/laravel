<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Etiquette;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtiquetteController extends Controller
{
    public function index()
    {   
        // récupérer la liste des etiquettes   
          $etiquettes = Etiquette::all();
        
        // transmission des etiquette à la vue
         return view('admin.etiquette.index', [
            'etiquettes'=> $etiquettes,

        ]);
    }

      /**
     * Affiche un formulaire de création de etiquette
     *
     * @return Response
     */
    public function create()
    {
        // valeur par défaut
       $etiquette = new stdClass;
       
       $etiquette->nom = '';
       $etiquette->description = '';
       
       

        //transmission des valeurs par défaut à la vue
         return view('admin.etiquette.create',[
            'etiquette'=> $etiquette,
    
        ]);
    }
    
     /**
     * Enregistre les données d'une nouvelle etiquette dans la BDD
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etiquette' => 'required|min:5|max:20',
            

        ]);
         
        //création d'une etiquette dans la bdd
        $etiquette = new Etiquette;
        $etiquette->nom =$request->get('nom');
        $etiquette->description =$request->get('description');
        $etiquette->save();

        $request->session()->flash('confirmation','La création a bien été effectuée.');

        return redirect()->route('admin.etiquette.index');

    }
    
    /**
     * Affiche un formulaire de modification d'une etiquette
     *
     * @param integer $id identifiant de l'etiquette
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération de l'etiquette
        $etiquette = Etiquette::find($id);

        if (!$etiquette){
            abort(404);
        }
       

        // transmission de la etiquette à la vue
        return view('admin.etiquette.edit',[
            'etiquette'=> $etiquette,
    
        ]);
    }

    /**
     * Met à jour les données d'une etiquette existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'etiquette' => 'required|min:5|max:20',

        ]);
        
    
    
     //récupération de la etiquette dans la bdd
     $etiquette = Etiquette::find($id);

     // affichage d'une erreur 404 si la etiquette est introuvable

     if(!$etiquette){
         abort(404);
     }
     
     $etiquette->nom =$request->get('nom');
     $etiquette->description  =$request->get('description');
     $etiquette->save();
     

     $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

     return redirect()->route('admin.etiquette.edit',['id'=> $etiquette->id]);

    }

    public function delete(Request $request, int $id)
    {
        $etiquette = Etiquette::find($id);

        if (!$etiquette){
            abort(404);
        }

        $etiquette->delete(); 

        $request->session()->flash('confirmation','La suppression a bien été effectuée.');

        return redirect()->route('admin.etiquette.index');
    }
}
