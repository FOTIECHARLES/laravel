<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{   
    
    public function index()
   {
    // récupère la liste des restaurants   
      $restaurants = Restaurant::all();
    
    // transmission des réservations à la vue
     return view('restaurant', [
        'restaurants'=> $restaurants,
    ]);
    }
}
