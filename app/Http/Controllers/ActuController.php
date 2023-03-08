<?php

namespace App\Http\Controllers;

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
         return view('actu', [
            'actus'=>$actus
        
        ]);
    }
}