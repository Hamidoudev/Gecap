<?php

use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EmploisController;
use App\Models\Enseignant;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PersonneladminController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\TrimestreController;
use App\Http\Controllers\GrilleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/home', [HomeController::class, 'adminHome'])->name('home');
        Route::resource('user', App\Http\Controllers\Admin\UserController::class);
        Route::get('search', [App\Http\Controllers\Admin\UserController::class, 'search'])->name('user.search');
    });
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
Route::get('auth/login', function(){
    return view('auth.login');

});
Route::get('/enseignant/{id}/telecharger-pdf', [EnseignantController::class, 'telechargerPdf'])->name('telecharger_pdf');
// routes enseignants
Route::get('/enseignants/listes', [EnseignantController::class, 'index'])->name('enseignants.listes');
Route::get('/enseignants/ajout', [EnseignantController::class, 'create'])->name('enseignants.ajout');
Route::post('/enseignants/store', [EnseignantController::class, 'store'])->name('enseignants.store');
Route::get('/enseignants/edit/{id}', [EnseignantController::class, 'edit'])->name('enseignants.edit');
Route::post('/enseignants/update/{id}', [EnseignantController::class, 'update'])->name('enseignants.update');
Route::get('/enseignants/delete/{id}', [EnseignantController::class, 'destroy'])->name('enseignants.delete');
Route::get('/enseignants/show/{id}', [EnseignantController::class, 'show'])->name('enseignants.show');

// routes eleves
Route::get('/eleves/listes', [EleveController::class, 'index'])->name('eleves.listes');
Route::get('/eleves/ajout', [EleveController::class, 'create'])->name('eleves.ajout');
Route::post('/eleves/store', [EleveController::class, 'store'])->name('eleves.store');
Route::get('/eleves/edit/{id}', [EleveController::class, 'edit'])->name('eleves.edit');
Route::post('/eleves/update/{id}', [EleveController::class, 'update'])->name('eleves.update');
Route::get('/eleves/delete/{id}', [EleveController::class, 'destroy'])->name('eleves.delete');
Route::get('/eleves/show/{id}', [EleveController::class, 'show'])->name('eleves.show');

// routes ecoles
Route::get('/ecoles/listes', [EcoleController::class, 'index'])->name('ecoles.listes');
Route::get('/ecoles/ajout', [EcoleController::class, 'create'])->name('ecoles.ajout');
Route::post('/ecoles/store', [EcoleController::class, 'store'])->name('ecoles.store');
Route::get('/ecoles/edit/{id}', [EcoleController::class, 'edit'])->name('ecoles.edit');
Route::post('/ecoles/update/{id}', [EcoleController::class, 'update'])->name('ecoles.update');
Route::get('/ecoles/delete/{id}', [EcoleController::class, 'destroy'])->name('ecoles.delete');
Route::get('/ecoles/show/{id}', [EcoleController::class, 'show'])->name('ecoles.show');

// routes personnels
Route::get('/personnels/listes', [PersonneladminController::class, 'index'])->name('personnels.listes');
Route::get('/personnels/ajout', [PersonneladminController::class, 'create'])->name('personnels.ajout');
Route::post('/personnels/store', [PersonneladminController::class, 'store'])->name('personnels.store');
Route::get('/personnels/edit/{id}', [PersonneladminController::class, 'edit'])->name('personnels.edit');
Route::post('/personnels/update/{id}', [PersonneladminController::class, 'update'])->name('personnels.update');
Route::get('/personnels/delete/{id}', [PersonneladminController::class, 'destroy'])->name('personnels.delete');
Route::get('/personnels/show/{id}', [PersonneladminController::class, 'show'])->name('personnels.show');

// routes trimestres
Route::get('/trimestres/listes', [TrimestreController::class, 'index'])->name('trimestres.listes');
Route::get('/trimestres/ajout', [TrimestreController::class, 'create'])->name('trimestres.ajout');
Route::post('/trimestres/store', [TrimestreController::class, 'store'])->name('trimestres.store');
Route::get('/trimestres/edit/{id}', [TrimestreController::class, 'edit'])->name('trimestres.edit');
Route::post('/trimestres/update/{id}', [TrimestreController::class, 'update'])->name('trimestres.update');
Route::get('/trimestres/delete/{id}', [TrimestreController::class, 'destroy'])->name('trimestres.delete');
Route::get('/trimestres/show/{id}', [TrimestreController::class, 'show'])->name('trimestres.show');

// routes emplois
Route::get('/emplois/listes', [EmploisController::class, 'index'])->name('emplois.listes');
Route::get('/emplois/ajout', [EmploisController::class, 'create'])->name('emplois.ajout');
Route::post('/emplois/store', [EmploisController::class, 'store'])->name('emplois.store');
Route::get('/emplois/edit/{id}', [EmploisController::class, 'edit'])->name('emplois.edit');
Route::post('/emplois/update/{id}', [EmploisController::class, 'update'])->name('emplois.update');
Route::get('/emplois/delete/{id}', [EmploisController::class, 'destroy'])->name('emplois.delete');
Route::get('/emplois/show/{id}', [EmploisController::class, 'show'])->name('emplois.show');

// routes programmes
Route::get('/programmes/listes', [ProgrammeController::class, 'index'])->name('programmes.listes');
Route::get('/programmes/ajout', [ProgrammeController::class, 'create'])->name('programmes.ajout');
Route::post('/programmes/store', [ProgrammeController::class, 'store'])->name('programmes.store');
Route::get('/programmes/edit/{id}', [ProgrammeController::class, 'edit'])->name('programmes.edit');
Route::post('/programmes/update/{id}', [ProgrammeController::class, 'update'])->name('programmes.update');
Route::get('/programmes/delete/{id}', [ProgrammeController::class, 'destroy'])->name('programmes.delete');
Route::get('/programmes/show/{id}', [ProgrammeController::class, 'show'])->name('programmes.show');

// routes grilles
Route::get('/grilles/listes', [GrilleController::class, 'index'])->name('grilles.listes');
Route::get('/grilles/ajout', [GrilleController::class, 'create'])->name('grilles.ajout');
Route::get('/grilles/pdf', [GrilleController::class, 'generatePDF'])->name('grilles.pdf');
Route::post('/grilles/store', [GrilleController::class, 'store'])->name('grilles.store');
Route::get('/grilles/edit/{id}', [GrilleController::class, 'edit'])->name('grilles.edit');
Route::post('/grilles/update/{id}', [GrilleController::class, 'update'])->name('grilles.update');
Route::get('/grilles/delete/{id}', [GrilleController::class, 'destroy'])->name('grilles.delete');
Route::get('/grilles/show/{id}', [GrilleController::class, 'show'])->name('grilles.show');

// routes equipements
Route::get('/equipements/listes', [EquipementController::class, 'index'])->name('equipements.listes');
Route::get('/equipements/ajout', [EquipementController::class, 'create'])->name('equipements.ajout');
Route::post('/equipements/store', [EquipementController::class, 'store'])->name('equipements.store');
Route::get('/equipements/edit/{id}', [EquipementController::class, 'edit'])->name('equipements.edit');
Route::post('/equipements/update/{id}', [EquipementController::class, 'update'])->name('equipements.update');
Route::get('/equipements/delete/{id}', [EquipementController::class, 'destroy'])->name('equipements.delete');
Route::get('/equipements/show/{id}', [EquipementController::class, 'show'])->name('equipements.show');

// evaluation
Route::get('/evaluations/listes', [EvaluationController::class, 'index'])->name('evaluations.listes');
Route::get('/evaluations/ajout', [EvaluationController::class, 'create'])->name('evaluations.ajout');
Route::post('/evaluation/store', [EvaluationController::class, 'store'])->name('evaluations.store');
Route::get('/evaluations/edit/{id}', [EvaluationController::class, 'edit'])->name('evaluations.edit');
Route::post('/evaluations/update/{id}', [EvaluationController::class, 'update'])->name('evaluations.update');
Route::get('/evaluations/delete/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.delete');
Route::get('/evaluations/show/{id}', [EvaluationController::class, 'show'])->name('evaluations.show');

// droits
Route::get('/Admin/droits/', [DroitController::class, 'index' ])->name('droits.index');
Route::get('/admin/droit/ajout', [DroitController::class, 'create'])->name('admin.droit.ajout');
Route::post('/admin/droit/store', [DroitController::class, 'store'])->name('admin.droit.store');
//role
Route::get('/Admin/role/', [RoleController::class, 'index' ])->name('roles.index');
Route::get('/admin/role/ajout', [RoleController::class, 'create'])->name('admin.role.ajout');
Route::post('/admin/role/store', [RoleController::class, 'store'])->name('admin.role.store');
Route::get('/admin/role/delete{id}', [RoleController::class, 'destroy'])->name('admin.role.delete');
Route::post('/admin/role/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
