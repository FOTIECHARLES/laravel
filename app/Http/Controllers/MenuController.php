<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
       $categories = Categorie::all();

        // dd($categories);
        //dump and die
        return view('menu', [
            'categories' => $categories,
        ]); 
    }
}
