<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Droit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'roles.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('admin.home');
        } 
        $droits = Droit::all();
        $roles = Role::all();
        return view('admin.role.index',compact('droits','roles'));
    }

    public function create()
    {
        return view('admin.role.ajout');
    }
   
    public function store(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try {
            $role =  Role::create(
                [
                    'nom' => $request->nom,
                    'type' => $request->type
                ]
            );
            $role->droits()->toggle($request->role_droits);

            DB::commit();
            toastr()->success('Role créer avec succes:-)', 'Felicitation');
            return redirect('admin/roles');
        } catch (\Exception $e) {
            DB::rollback();
            //Toastr::error('Creation du role échec veuillez réessayer :-(', 'Erreur');
            return redirect('admin/roles')->with('error', $e->getMessage());
        }
    }



    public function getDroit(Request $request)
    {
        $id = $request->post('id');
        $role = Role::find($id);
        $droits = Droit::all();
        foreach ($droits as $droit) {
            $exist = '';
            foreach ($role->droits as $roleDroit) {
                if ($droit->id == $roleDroit->id) {
                    $exist = 'checked';
                }
            }

            $html = "
            <div class='col-md-4'>
                <input id='id.$droit->id' $exist name='droits[]' value='$droit->id '
                    type='checkbox' class='ml-1'>
                    <label for='id.$droit->id '> $droit->nom</label>
            </div>
            ";
            echo $html;
        }
    }

    public function update(Request $request, Role $id)
    {
        DB::beginTransaction();
        $role = Role::find($request->id);
        try {
            $role->update(
                [
                    'nom' => $request->nom,
                    'type' => $request->type
                ]
            );

            $role->droits()->detach();
            $role->droits()->attach($request->droits);

            DB::commit();
            toastr()->success('Role modifier avec succes:-)', 'Felicitation');
            return redirect('admin/roles');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/roles')->with('error', $e->getMessage());
        }
    }


    public function destroy(Request $request)
    {
        //
        DB::beginTransaction();
        $role = Role::find($request->id);
        try {
            $role->droits()->detach();
            $role->delete();
            DB::commit();
            //Toastr::success('Role supprimer avec succes :-)', 'Felicitation');
            return redirect('admin.role.index')->with('message', 'Role supprimer avec succes :-)');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin.role.index')->with('error', 'Attention tu peux pas supprimer un role s\'il contient des Utilisateurs');
            return redirect()->back(); }
        }
}