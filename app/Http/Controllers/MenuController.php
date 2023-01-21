<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        //select * FROM categorie    
        $categories = Categorie::all();

        
         return view('menu', [
        'categories' => $categories,
        ]); 
    }
}
