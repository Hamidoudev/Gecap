<?php

namespace App\Http\Controllers;

use App\Mail\EnseignantMail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class MessageEnseignantController extends Controller
{
       // Le formulaire du message
	public function formEnseignantMail () {
		return view("forms.messageenseignant");
	}

    // Envoi du mail aux utilisateurs
	public function sendEnseignantMail (Request $request) {

		#1. Validation de la requête
		$this->validate($request, [ 'message' => 'bail|required' ]);

		#2. Récupération des utilisateurs
		$users = User::all();

		#3. Envoi du mail
		Mail::to($users)->bcc("hamidoudem69@gmail.com")
						->queue(new EnseignantMail($request->all()));

		return back()->withText("Message envoyé");
	}
}
