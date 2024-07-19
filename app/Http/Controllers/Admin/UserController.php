<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleTypeUser;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.users.index',
            [
                'users' => User::paginate(100),
                'rows' => User::count(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $roleTypeUsers = RoleTypeUser::all();
        $types = Type::all();
        return view('admin.users.form', compact('roles', 'roleTypeUsers', 'types'));
    }

    public function store(Request $request)
    {
       

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role_id = 3;
        $user->role_type_user_id =3;
        $user->type_id = 3;

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
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
        $roles = Role::all();
        $roleTypeUsers = RoleTypeUser::all();
        $types = Type::all();
        return view('users.edit', compact('users', 'roles', 'roleTypeUsers', 'types'));
    }

    public function update(Request $request, User $user)
    {

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = 3;
        $user->role_type_user_id =3;
        $user->type_id =3;

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('message', 'Utilisateur a bien été supprimé');
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
