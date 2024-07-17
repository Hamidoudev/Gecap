<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
     
        $enseignant = Auth::guard('enseignant')->user();
        if(!$enseignant) {
            abort(404,'enseignant not found');
        }
        return view('pages.enseignant.profile.vue',compact('enseignant'));
    }

    public function edit($id)
    {
        $enseignant = Enseignant::find($id);
        return view('pages.enseignant.profile.edit', compact('enseignant'));
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

        // $enseignant = enseignant::find(Auth::guard('enseignant')->user()->id);
        // if (!$enseignant) {
        //     abort(404, 'enseignant not found');
        // }
       
        $enseignant = Enseignant::find(Auth::guard('enseignant')->user()->id);
        $enseignant->ecole_id = $request->input('ecole_id');
        $enseignant->matricule = $request->input('matricule');
        $enseignant->nom = $request->input('nom');
        $enseignant->prenom = $request->input('prenom');
        $enseignant->date_n = $request->input('date_n');
        $enseignant->email = $request->input('email');
        $enseignant->telephone = $request->input('telephone');
        $enseignant->adresse = $request->input('adresse');
        $enseignant->cv = $request->input('cv');
        $enseignant->type_id = 4;

        if ($request->filled('password')) {
            $enseignant->password = Hash::make($request->input('password'));
        }
        $enseignant->save();

        return redirect()->back()->with('success', 'Profile Modifier avec success.');
    }

    public function show($id)
    {
        $enseignant = Enseignant::find($id);
        
    }
}
