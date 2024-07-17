<?php

namespace App\Http\Controllers;

use App\Mail\EcoleMail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class MessageEcoleController extends Controller
{
   // Le formulaire du message
	public function formEcoleMail () {
		return view("forms.messageecole");
	}

    // Envoi du mail aux utilisateurs
	public function sendEcoleMail (Request $request) {

		#1. Validation de la requête
		$this->validate($request, [ 'message' => 'bail|required' ]);

		#2. Récupération des utilisateurs
		$users = User::all();

		#3. Envoi du mail
		Mail::to($users)->bcc("hamidoudem69@gmail.com")
						->queue(new EcoleMail($request->all()));

		return back()->withText("Message envoyé");
	}

}
