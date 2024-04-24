<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'pages.admin.comptes.index',
            [
                'users' => User::paginate(2),
                'rows' => User::count(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        $user->fill([
            'name' => '',
            'email' => '',
            'password' => '',
            'type' => ''
        ]);

        return view('pages.admin.comptes.form',[
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            /* 'password' => 'required', */
            'type' => 'required'
        ],[
            'name.required' => 'Champ obligatoire',
            'email.required' => 'Champ obligatoire',
            'email.email' => 'Format invalide',
/*             'password.required' => 'Champ obligatoire', */
            'type.required' => 'Champ obligatoire'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('bonjour10'),
            'type' => $request->type,


        ]);
        return to_route('admin.user.create')->with('message', 'Utilisateur a bien été ajouter');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.admin.comptes.form',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            /* 'password' => 'required', */
            'type' => 'required'
        ],[
            'name.required' => 'Champ obligatoire',
            'email.required' => 'Champ obligatoire',
            'email.email' => 'Format invalide',
/*             'password.required' => 'Champ obligatoire', */
            'type.required' => 'Champ obligatoire'
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('bonjour10'),
            'type' => $request->type,
        ]);
        return to_route('admin.user.edit', $user->id)->with('message', 'Utilisateur a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.user.index')->with('message', 'Utilisateur a bien été supprimé');
    }

    public function search(Request $request){
        $users = User::where('name', 'LIKE', '%'.$request->search.'%')
        ->orwhere('email', 'LIKE', '%'.$request->search.'%')
        ->get();
        $rows = User::where('name', 'LIKE', '%'.$request->search.'%')
        ->orwhere('email', 'LIKE', '%'.$request->search.'%')
        ->count();
        return view(
            'pages.admin.comptes.index',
            [
                'users' => $users,
                'rows' => $rows,
            ]
        );
    }
}
