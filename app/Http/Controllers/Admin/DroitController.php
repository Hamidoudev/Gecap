<?php

namespace App\Http\Controllers\Admin;

use App\Models\Droit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DroitController extends Controller
{
  public function index(){
    $autorisation = $this->autorisation(Auth::user()->role, 'role.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('admin.home');
        } 
    return view('admin.droit.index');
  }

 
}
