<?php

namespace App\Http\Controllers\Admin;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {   
        // récupérer la liste des reservations   
          $reservations = Reservation::all();

        // transmission des réservations à la vue
         return view('admin.reservation.index', [
            'reservations'=> $reservations
        ]);
    }

    public function create()
    {
        // valeur par défaut

        //transmission des valeurs par défaut à la vue
        return view('admin.reservation.create', [

        ]);
    }

    /**
     * Enregistre les données de la bdd
     *
     * @return Response
     */
    public function store()
    {


    }
    

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return Response
     */
    public function edit(int $id)
    {   
        //récupération de la reservation
        $reservation = Reservation::find($id);

        // transmission de la reservation à la vue
        return view('admin.reservation.edit',[
            'reservation'=> $reservation,
    
        ]);
    }
    
    /**
     * Met à jour les données de la réservation
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
            'prenom' => 'required|min:2|max:100',
            'jour' => 'required|date|after_or_equal:today',
            'heure' => 'required|date_format:H:i:s',
            'nombre_personnes' => 'required|numeric|gte:1|lte:20',
            'tel' => 'required|regex:/^[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2}$/',
            'email' =>  'required|email:rfc,dns',

        ]);
        
        
        //récupération de la reservation dans la bdd
        $reservation = Reservation::find($id);
        
        $reservation->nom =$request->get('nom');
        $reservation->prenom =$request->get('prenom');
        $reservation->jour =$request->get('jour');
        $reservation->heure =$request->get('heure');
        $reservation->nombre_personnes =$request->get('nombre_personnes');
        $reservation->tel =$request->get('tel');
        $reservation->email =$request->get('email');
        $reservation->save();
        

        $request->session()->flash('confirmation','vos modifications ont été enregisteés.');

        return redirect()->route('admin.reservation.edit',['id'=> $reservation->id]);

    }

}