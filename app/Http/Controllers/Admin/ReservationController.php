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
        dd($request->all());
    }

}