<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {   
        // récupère la liste des categories   
          $categories = Categorie::all();
        
        // transmission des categories à la vue
         return view('admin.categorie.index', [
            'categories'=> $categories,
        ]);
    }

      /**
     * Affiche un formulaire de création de categorie
     *
     * @return Response
     */
    public function create()
    {
        // valeur par défaut
       $categorie = new stdClass;
      
       $categorie->nom = '';
       $categorie->description = '';

        //transmission des valeurs par défaut à la vue
         return view('admin.categorie.create',[
            'categorie'=> $categorie,
            
    
        ]);
    }

    /**
     * Enregistre les données d'une nouvelle categorie dans la BDD
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'description' => 'required|min:20|max:1000',
        ]);
        
        
        //création d'une categorie dans la bdd
        $categorie = new categorie;
        
        $categorie->nom =$request->get('nom');
        $categorie->description =$request->get('description');
        $categorie->save();
        

        $request->session()->flash('confirmation','La création a bien été effectuée.');

        return redirect()->route('admin.categorie.index');


    }
    

    /**
     * Affiche un formulaire de modification d'une categorie
     *
     * @param integer $id identifiant de la categorie
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération de la categorie
        $categorie = categorie::find($id);

        if (!$categorie){
            abort(404);
        }

        // transmission de la categorie à la vue
        return view('admin.categorie.edit',[
            'categorie'=> $categorie,
    
        ]);
    }
    
  
    /**
     * Met à jour les données d'une categorie existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'description' => 'required|min:20|max:1000',
        ]);
                

        
        
        //récupération de la categorie dans la bdd
        $categorie = categorie::find($id);

        // affichage d'une erreur 404 si la categorie est introuvable

        if(!$categorie){
            abort(404);
        }
        
        $categorie->nom =$request->get('nom');
        $categorie->description =$request->get('description');
        $categorie->save();
        

        $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

        return redirect()->route('admin.categorie.edit',['id'=> $categorie->id]);

    }

    public function delete(Request $request, int $id)
    {
        $categorie = categorie::find($id);

        if (!$categorie){
            abort(404);
        }

        $categorie->delete(); 

        $request->session()->flash('confirmation','La suppression a bien été effectuée.');

        return redirect()->route('admin.categorie.index');
    }

}