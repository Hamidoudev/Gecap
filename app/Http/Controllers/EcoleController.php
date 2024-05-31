<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use App\Notifications\UserNotification;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    
    public function sendNotification()
    {
        $user = User::find(1); // Trouver un utilisateur par ID

        $details = [
            'message' => 'Vous avez une nouvelle notification!',
            'url' => url('/notifications')
        ];

        $user->notify(new UserNotification($details));

        return response()->json(['message' => 'Notification envoyée avec succès!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
