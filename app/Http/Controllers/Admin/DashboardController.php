<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        // récupère la liste des dashboards   
          $dashboards = Dashboard::all();
        
        // transmission des dashboard à la vue
         return view('admin.dashboard', [
            'dashboards'=> $dashboards,
        ]);
    }
}
