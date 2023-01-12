<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function index()
      {
        
        return view('home');
        
      }
} 

