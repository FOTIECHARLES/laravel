<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller

{   
    public function index()
    {   
        //Select * From restaurant where cle = 'adresse'
        $adresse = DB::table('restaurant')
            ->where('cle', '=', 'adresse')          
            ->first()
        ;

        //Select * From restaurant where cle = 'tel'
        $tel = DB::table('restaurant')
            ->where('cle', '=', 'tel')          
            ->first()
        ;
        
        //Select * From restaurant where cle = 'horaire'
        $horaire = DB::table('restaurant')
            ->where('cle', '=', 'horaire')          
            ->first()
        ;

        //Select * From restaurant where cle = 'carte'
        $carte = DB::table('restaurant')
            ->where('cle', '=', 'carte')          
            ->first()
        ;
        
        return view('contact', [
            'adresse' => $adresse->valeur,
            'tel' => $tel->valeur,
            'horaire' => $horaire->valeur,
            'carte' => $carte->valeur,
        ]);
    }
}


   
