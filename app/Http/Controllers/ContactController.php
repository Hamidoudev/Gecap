<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
      
        return view('welcome');
    }
      


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ecole = new Contact;
        $ecole->nom = $request->nom; 
        $ecole->email = $request->email;
        $ecole->subject = $request->subject;
        $ecole->message = $request->message;
    
        $ecole->save();
        return redirect()->route('contact')->with('success', 'Merci de nous avoir contactés, nous vous reviendrons.'); 
    }
}
