<?php

namespace App\Http\Controllers\Ecole;

use App\Models\Ecole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
     
        $ecole = Auth::guard('ecole')->user();
        if(!$ecole) {
            abort(404,'ecole not found');
        }
        return view('pages.ecole.profile.vue',compact('ecole'));
    }

    public function edit($id)
    {
        $ecole = Ecole::find($id);
        return view('pages.ecole.profile.edit', compact('ecole'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'type_id' => '|nullable|',
        //     'nom' => 'required|string|max:255',
        //     'siege' => 'required|string|max:255',
        //     'email' => 'nullable|string|email|max:255',
        //     'type_id' => 'required|string|max:255',
        //     'password' => 'sometimes|nullable|string|min:8|confirmed',
        // ]);

        // $ecole = Ecole::find(Auth::guard('ecole')->user()->id);
        // if (!$ecole) {
        //     abort(404, 'ecole not found');
        // }
       
        $ecole = Ecole::find(Auth::guard('ecole')->user()->id);
        $ecole->type_id = $request->input('type_id');
        $ecole->nom = $request->input('nom');
        $ecole->siege = $request->input('siege');
        $ecole->email = $request->input('email');
        $ecole->type_id = 4;

        if ($request->filled('password')) {
            $ecole->password = Hash::make($request->input('password'));
        }
        $ecole->save();

        return redirect()->back()->with('success', 'Profile Modifier avec success.');
    }

    public function show($id)
    {
        $ecole = Ecole::find($id);
        
    }
}
