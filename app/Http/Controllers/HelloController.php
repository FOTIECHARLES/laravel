<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelloController;

class HelloController extends Controller
{
    public function index($name)
    {
        // traitement des données
        $name = '"'.$name.'"';
        
        return view('hello', [
        // passage de variables à une vue
        'name' => $name,
        ]);
    }
}
