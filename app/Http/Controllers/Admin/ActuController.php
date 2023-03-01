<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Actu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActuController extends Controller
{
    public function index()
    {   
         // récupère la liste des actus 
        $actus= Actu::all();

        // transmission des actus à la vue
         return view('admin.actu.index', [
            'actus'=>$actus
        
        ]);
    }
     /**
    * Affiche un formulaire de création de d'actualité
    *
    * @return Response
    */
    public function create()
    {
    // valeur par défaut
    $actu = new stdClass;
    
    $actu->jour_publication = '';
    $actu->heure_publication = '13:00';
    $actu->texte  ='';
    
    //transmission des valeurs par défaut à la vue
    return view('admin.actu.create',[
            'actu'=> $actu,
           

        ]);
  
    }
     /**
     * Enregistre les données d'une nouvelle actualité dans la BDD
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jour_publication' => 'required|min:2|date_format:Y-m-d|',
            'heure_publication' => 'required|date_format:H:i',
            'texte' => 'required|min:10|max:1000', 
            
        ]);


        //création d'une actualité dans la bdd
        $actu = new Actu;
    
        $actu->jour_publication =$request->get('jour_publication');
        $actu->heure_publication =$request->get('heure_publication');
        $actu->texte =$request->get('texte');
        $actu->save();
       
        $request->session()->flash('confirmation','La création a bien été effectuée.');

        return redirect()->route('admin.actu.index');
    }

    /**
     * Affiche un formulaire de modification d'une actu
     *
     * @param integer $id identifiant de l'actu
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération de la actu
        $actu = Actu::find($id);

        if (!$actu){
            abort(404);
        }

        
        // transmission de la actu à la vue
        return view('admin.actu.edit',[
            'actu'=> $actu,
    
        ]);
    }
    
  
    /**
     * Met à jour les données d'une actualité existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {

        $validated = $request->validate([
            'jour_publication' => 'required|min:2|date_format:Y-m-d|',
            'heure_publication' => 'required|date_format:H:i',
            'texte' => 'required|min:10|max:1000', 
            
        ]);
        
        
        //récupération l'actualité dans la bdd
        $actu = Actu::find($id);

        // affichage d'une erreur 404 si la actu est introuvable
        
        if(!$actu){
            abort(404);
        }
        
        $actu->jour_publication =$request->get('jour_publication');
        $actu->heure_publication =$request->get('heure_publication');
        $actu->texte =$request->get('texte');
        $actu->save();
        

        $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

        return redirect()->route('admin.actu.edit',['id'=> $actu->id]);

    }

    public function delete(Request $request, int $id)
    {
        $actu = Actu::find($id);

        if (!$actu){
            abort(404);
        }

        $actu->delete(); 

        $request->session()->flash('confirmation','La suppression a bien été effectuée.');

        return redirect()->route('admin.actu.index');
    }
}


