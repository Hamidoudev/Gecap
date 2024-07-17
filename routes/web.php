<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\GrilleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\EmploisController;



use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\TrimestreController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\Admin\DroitController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\PersonneladminController;
use App\Http\Controllers\ProgrammeAdminController;
use App\Http\Controllers\Auth\LoginEcoleController;
use App\Http\Controllers\Auth\LoginEnseignantController;
use App\Http\Controllers\Ecole\ClasseController;
use App\Http\Controllers\Ecole\EcoleController as EcoleEcoleController;
use App\Http\Controllers\Ecole\EleveController as EcoleEleveController;
use App\Http\Controllers\Ecole\EmploisController as EcoleEmploisController;
use App\Http\Controllers\Ecole\EnseignantController as EcoleEnseignantController;
use App\Http\Controllers\Ecole\ProfileController as EcoleProfileController;
use App\Http\Controllers\Ecole\ProgrammeController as EcoleProgrammeController;
use App\Http\Controllers\EleveAController;
use App\Http\Controllers\EmploisAController;
use App\Http\Controllers\Enseignant\EmploisController as EnseignantEmploisController;
use App\Http\Controllers\Enseignant\ProfileController as EnseignantProfileController;
use App\Http\Controllers\EnseignantAController;
use App\Http\Controllers\EnseignantMatiereController;
use App\Http\Controllers\ProgrammeAController;

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

   Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');
  // Route::get('/user/home', [HomeController::class, 'userHome'])->name('user.home');

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
    })->name("auth.login");
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ecolesauth
Route::get('auth/ecole/login', function(){
    return view('auth.ecole.login');
    })->name("auth.ecole.login");
Route::post('/logout', [LoginEcoleController::class, 'logout'])->name('logout');
Route::post('/login/ecole', [LoginEcoleController::class, 'login'])->name('login.ecole');



Route::group(['middleware' => ['auth:ecole']], function () {
Route::get('/ecole/home', [HomeController::class, 'ecoleHome'])->name('ecole.home');
});

// enseignantauth
Route::get('auth/enseignant/login', function(){
    return view('auth.enseignant.login');
    })->name("auth.enseignant.login");
Route::post('/logout', [LoginEnseignantController::class, 'logout'])->name('logout');
Route::post('/login/enseignant', [LoginEnseignantController::class, 'login'])->name('login.enseignant');


Route::group(['middleware' => ['auth:enseignant']], function () {
    Route::get('/enseignant/home', [HomeController::class, 'enseignantHome'])->name('enseignant.home');
});
 
// routes enseignants
Route::get('/enseignant/{id}/telecharger-pdf', [EnseignantAController::class, 'telechargerPdf'])->name('telecharger_pdf');
Route::get('/enseignants/listes', [EnseignantAController::class, 'index'])->name('enseignants.listes');
Route::get('/enseignants/ajout', [EnseignantAController::class, 'create'])->name('enseignants.ajout');
Route::post('/enseignants/store', [EnseignantAController::class, 'store'])->name('enseignants.store');
Route::get('/enseignants/edit/{id}', [EnseignantAController::class, 'edit'])->name('enseignants.edit');
Route::post('/enseignants/update/{id}', [EnseignantAController::class, 'update'])->name('enseignants.update');
Route::get('/enseignants/delete/{id}', [EnseignantAController::class, 'destroy'])->name('enseignants.delete');
Route::get('/enseignants/show/{id}', [EnseignantAController::class, 'show'])->name('enseignants.show');

// routes enseignants de l'ecole
Route::get('/pages/ecole/enseignant/{id}/telecharger-pdf', [EcoleEnseignantController::class, 'telechargerPdf'])->name('pages.ecole.telecharger_pdf');
Route::get('/pages/ecole/enseignants/listes', [EcoleEnseignantController::class, 'index'])->name('pages.ecole.enseignants.listes');
Route::get('/pages/ecole/enseignants/ajout', [EcoleEnseignantController::class, 'create'])->name('pages.ecole.enseignants.ajout');
Route::post('/pages/ecole/enseignants/store', [EcoleEnseignantController::class, 'store'])->name('pages.ecole.enseignants.store');
Route::get('/pages/ecole/enseignants/edit/{id}', [EcoleEnseignantController::class, 'edit'])->name('pages.ecole.enseignants.edit');
Route::post('/pages/ecole/enseignants/update/{id}', [EcoleEnseignantController::class, 'update'])->name('pages.ecole.enseignants.update');
Route::get('/pages/ecole/enseignants/delete/{id}', [EcoleEnseignantController::class, 'destroy'])->name('pages.ecole.enseignants.delete');
Route::get('/pages/ecole/enseignants/show/{id}', [EcoleEnseignantController::class, 'show'])->name('pages.ecole.enseignants.show');

// routes eleves
Route::get('/eleves/listes', [EleveAController::class, 'index'])->name('eleves.listes');
Route::get('/eleves/ajout', [EleveAController::class, 'create'])->name('eleves.ajout');
Route::post('/eleves/store', [EleveAController::class, 'store'])->name('eleves.store');
Route::get('/eleves/edit/{id}', [EleveAController::class, 'edit'])->name('eleves.edit');
Route::post('/eleves/update/{id}', [EleveAController::class, 'update'])->name('eleves.update');
Route::get('/eleves/delete/{id}', [EleveAController::class, 'destroy'])->name('eleves.delete');
Route::get('/eleves/show/{id}', [EleveAController::class, 'show'])->name('eleves.show');

// // routes eleves ecoles
// Route::get('/pages/ecole/eleves/listes', [EcoleEleveController::class, 'index'])->name('pages.ecole.eleves.listes');
// Route::get('/pages/ecole/eleves/ajout', [EcoleEleveController::class, 'create'])->name('pages.ecole.eleves.ajout');
// Route::post('/pages/ecole/eleves/store', [EcoleEleveController::class, 'store'])->name('pages.ecole.eleves.store');
// Route::get('/pages/ecole/eleves/edit/{id}', [EcoleEleveController::class, 'edit'])->name('pages.ecole.eleves.edit');
// Route::post('/pages/ecole/eleves/update/{id}', [EcoleEleveController::class, 'update'])->name('pages.ecole.eleves.update');
// Route::get('/pages/ecole/eleves/delete/{id}', [EcoleEleveController::class, 'destroy'])->name('pages.ecole.eleves.delete');
// Route::get('/pages/ecole/eleves/show/{id}', [EcoleEleveController::class, 'show'])->name('pages.ecole.eleves.show');

// routes eleves de l'ecole
Route::get('/pages/ecole/eleves/listes', [EcoleEleveController::class, 'index'])->name('pages.ecole.eleves.listes');
Route::get('/pages/ecole/eleves/ajout', [EcoleEleveController::class, 'create'])->name('pages.ecole.eleves.ajout');
Route::post('/pages/ecole/eleves/store', [EcoleEleveController::class, 'store'])->name('pages.ecole.eleves.store');
Route::get('/pages/ecole/eleves/edit/{id}', [EcoleEleveController::class, 'edit'])->name('pages.ecole.eleves.edit');
Route::post('/pages/ecole/eleves/update/{id}', [EcoleEleveController::class, 'update'])->name('pages.ecole.eleves.update');
Route::get('/pages/ecole/eleves/delete/{id}', [EcoleEleveController::class, 'destroy'])->name('pages.ecole.eleves.delete');
Route::get('/pages/ecole/eleves/show/{id}', [EcoleEleveController::class, 'show'])->name('pages.ecole.eleves.show');

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
Route::get('/emplois/listes', [EmploisAController::class, 'index'])->name('emplois.listes');
Route::get('/emplois/ajout', [EmploisAController::class, 'create'])->name('emplois.ajout');
Route::get('/emplois/pdf/{id}', [EmploisAController::class, 'generatePDF'])->name('emplois.pdf');
Route::post('/emplois/store', [EmploisAController::class, 'store'])->name('emplois.store');
Route::get('/emplois/edit/{id}', [EmploisAController::class, 'edit'])->name('emplois.edit');
Route::post('/emplois/update/{id}', [EmploisAController::class, 'update'])->name('emplois.update');
Route::get('/emplois/delete/{id}', [EmploisAController::class, 'destroy'])->name('emplois.delete');
Route::get('/emplois/show/{id}', [EmploisAController::class, 'show'])->name('emplois.show');
Route::get('/emplois/vue/{id}', [EmploisAController::class, 'vue'])->name('emplois.vue');

// routes emplois de l'ecole
Route::get('/pages/ecole/emplois/listes', [EcoleEmploisController::class, 'index'])->name('pages.ecole.emplois.listes');
Route::get('/pages/ecole/emplois/ajout', [EcoleEmploisController::class, 'create'])->name('pages.ecole.emplois.ajout');
Route::get('/pages/ecole/emplois/pdf/{id}', [EcoleEmploisController::class, 'generatePDF'])->name('pages.ecole.emplois.pdf');
Route::post('/pages/ecole/emplois/store', [EcoleEmploisController::class, 'store'])->name('pages.ecole.emplois.store');
Route::get('/pages/ecole/emplois/edit/{id}', [EcoleEmploisController::class, 'edit'])->name('pages.ecole.emplois.edit');
Route::post('/pages/ecole/emplois/update/{id}', [EcoleEmploisController::class, 'update'])->name('pages.ecole.emplois.update');
Route::get('/pages/ecole/emplois/delete/{id}', [EcoleEmploisController::class, 'destroy'])->name('pages.ecole.emplois.delete');
Route::get('/pages/ecole/emplois/show/{id}', [EcoleEmploisController::class, 'show'])->name('pages.ecole.emplois.show');
Route::get('/pages/ecole/emplois/vue/{id}', [EcoleEmploisController::class, 'vue'])->name('pages.ecole.emplois.vue');

// routes emplois de l'enseignant
Route::get('/pages/enseignant/emplois/listes', [EnseignantEmploisController::class, 'index'])->name('pages.enseignant.emplois.listes');
Route::get('/pages/enseignant/emplois/ajout', [EnseignantEmploisController::class, 'create'])->name('pages.enseignant.emplois.ajout');
Route::get('/pages/enseignant/emplois/pdf/{id}', [EnseignantEmploisController::class, 'generatePDF'])->name('pages.enseignant.emplois.pdf');
Route::post('/pages/enseignant/emplois/store', [EnseignantEmploisController::class, 'store'])->name('pages.enseignant.emplois.store');
Route::get('/pages/enseignant/emplois/edit/{id}', [EnseignantEmploisController::class, 'edit'])->name('pages.enseignant.emplois.edit');
Route::post('/pages/enseignant/emplois/update/{id}', [EnseignantEmploisController::class, 'update'])->name('pages.enseignant.emplois.update');
Route::get('/pages/enseignant/emplois/delete/{id}', [EnseignantEmploisController::class, 'destroy'])->name('pages.enseignant.emplois.delete');
Route::get('/pages/enseignant/emplois/show/{id}', [EnseignantEmploisController::class, 'show'])->name('pages.enseignant.emplois.show');
Route::get('/pages/enseignant/emplois/vue/{id}', [EnseignantEmploisController::class, 'vue'])->name('pages.enseignant.emplois.vue');

// // routes emplois de l'enseignant
// Route::get('/pages/enseignant/emplois/listes', [EmploisController::class, 'index'])->name('pages.enseignant.emplois.listes');
// Route::get('/pages/enseignant/emplois/ajout', [EmploisController::class, 'create'])->name('pages.enseignant.emplois.ajout');
// Route::get('/pages/enseignant/emplois/pdf/{id}', [EmploisController::class, 'generatePDF'])->name('pages.enseignant.emplois.pdf');
// Route::post('/pages/enseignant/emplois/store', [EmploisController::class, 'store'])->name('pages.enseignant.emplois.store');
// Route::get('/pages/enseignant/emplois/edit/{id}', [EmploisController::class, 'edit'])->name('pages.enseignant.emplois.edit');
// Route::post('/pages/enseignant/emplois/update/{id}', [EmploisController::class, 'update'])->name('pages.enseignant.emplois.update');
// Route::get('/pages/enseignant/emplois/delete/{id}', [EmploisController::class, 'destroy'])->name('pages.enseignant.emplois.delete');
// Route::get('/pages/enseignant/emplois/show/{id}', [EmploisController::class, 'show'])->name('pages.enseignant.emplois.show');
// Route::get('/pages/enseignant/emplois/vue/{id}', [EmploisController::class, 'vue'])->name('pages.enseignant.emplois.vue');


// routes programmes ecoles
Route::get('/pages/ecole/programmes/listes', [EcoleProgrammeController::class, 'index'])->name('pages.ecole.programmes.listes');
Route::get('/pages/ecole/programmes/ajout', [EcoleProgrammeController::class, 'create'])->name('pages.ecole.programmes.ajout');
Route::post('/pages/ecole/programmes/store', [EcoleProgrammeController::class, 'store'])->name('pages.ecole.programmes.store');
Route::get('/pages/ecole/programmes/edit/{id}', [EcoleProgrammeController::class, 'edit'])->name('pages.ecole.programmes.edit');
Route::post('/pages/ecole/programmes/update/{id}', [EcoleProgrammeController::class, 'update'])->name('pages.ecole.programmes.update');
Route::get('/pages/ecole/programmes/delete/{id}', [EcoleProgrammeController::class, 'destroy'])->name('pages.ecole.programmes.delete');
Route::get('/pages/ecole/programmes/show/{id}', [EcoleProgrammeController::class, 'show'])->name('pages.ecole.programmes.show');

// routes programmes 
Route::get('/programmes/listes', [ProgrammeAController::class, 'index'])->name('programmes.listes');
Route::get('/programmes/ajout', [ProgrammeAController::class, 'create'])->name('programmes.ajout');
Route::post('/programmes/store', [ProgrammeAController::class, 'store'])->name('programmes.store');
Route::get('/programmes/edit/{id}', [ProgrammeAController::class, 'edit'])->name('programmes.edit');
Route::post('/programmes/update/{id}', [ProgrammeAController::class, 'update'])->name('programmes.update');
Route::get('/programmes/delete/{id}', [ProgrammeAController::class, 'destroy'])->name('programmes.delete');
Route::get('/programmes/show/{id}', [ProgrammeAController::class, 'show'])->name('programmes.show');

// routes matieres
Route::get('/pages/ecole/matieres/listes', [MatiereController::class, 'index'])->name('pages.ecole.matieres.listes');
Route::get('/pages/ecole/matieres/ajout', [MatiereController::class, 'create'])->name('pages.ecole.matieres.ajout');
Route::post('/pages/ecole/matieres/store', [MatiereController::class, 'store'])->name('pages.ecole.matieres.store');
Route::get('/pages/ecole/matieres/edit/{id}', [MatiereController::class, 'edit'])->name('pages.ecole.matieres.edit');
Route::post('/pages/ecole/matieres/update/{id}', [MatiereController::class, 'update'])->name('pages.ecole.matieres.update');
Route::get('/pages/ecole/matieres/delete/{id}', [MatiereController::class, 'destroy'])->name('pages.ecole.matieres.delete');
Route::get('/pages/ecole/matieres/show/{id}', [MatiereController::class, 'show'])->name('pages.ecole.matieres.show');

// routes classes
Route::get('/pages/ecole/classe/listes', [ClasseController::class, 'index'])->name('pages.ecole.classe.listes');
Route::get('/pages/ecole/classe/ajout', [ClasseController::class, 'create'])->name('pages.ecole.classe.ajout');
Route::post('/pages/ecole/classe/store', [ClasseController::class, 'store'])->name('pages.ecole.classe.store');
Route::get('/pages/ecole/classe/edit/{id}', [ClasseController::class, 'edit'])->name('pages.ecole.classe.edit');
Route::post('/pages/ecole/classe/update/{id}', [ClasseController::class, 'update'])->name('pages.ecole.classe.update');
Route::get('/pages/ecole/classe/delete/{id}', [ClasseController::class, 'destroy'])->name('pages.ecole.classe.delete');
Route::get('/pages/ecole/classe/show/{id}', [ClasseController::class, 'show'])->name('pages.ecole.classe.show');



// routes grilles
Route::get('/grilles/listes', [GrilleController::class, 'index'])->name('grilles.listes');
Route::get('/grilles/ajout', [GrilleController::class, 'create'])->name('grilles.ajout');
Route::get('/grilles/pdf/{id}', [GrilleController::class, 'generatePDF'])->name('grilles.pdf');
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

// routes Diplomes
Route::get('/diplomes/listes', [DiplomeController::class, 'index'])->name('diplomes.listes');
Route::get('/diplomes/ajout', [DiplomeController::class, 'create'])->name('diplomes.ajout');
Route::post('/diplomes/store', [DiplomeController::class, 'store'])->name('diplomes.store');
Route::get('/diplomes/edit/{id}', [DiplomeController::class, 'edit'])->name('diplomes.edit');
Route::post('/diplomes/update/{id}', [DiplomeController::class, 'update'])->name('diplomes.update');
Route::get('/diplomes/delete/{id}', [DiplomeController::class, 'destroy'])->name('diplomes.delete');
Route::get('/diplomes/show/{id}', [DiplomeController::class, 'show'])->name('diplomes.show');

// routes examens
Route::get('/examens/listes', [ExamenController::class, 'index'])->name('examens.listes');
Route::get('/examens/ajout', [ExamenController::class, 'create'])->name('examens.ajout');
Route::post('/examens/store', [ExamenController::class, 'store'])->name('examens.store');
Route::get('/examens/edit/{id}', [ExamenController::class, 'edit'])->name('examens.edit');
Route::post('/examens/update/{id}', [ExamenController::class, 'update'])->name('examens.update');
Route::get('/examens/delete/{id}', [ExamenController::class, 'destroy'])->name('examens.delete');
Route::get('/examens/show/{id}', [ExamenController::class, 'show'])->name('examens.show');


// evaluation
Route::get('/evaluations/listes', [EvaluationController::class, 'index'])->name('evaluations.listes');
Route::get('/evaluations/ajout', [EvaluationController::class, 'create'])->name('evaluations.ajout');
Route::post('/evaluation/store', [EvaluationController::class, 'store'])->name('evaluations.store');
Route::get('/evaluations/edit/{id}', [EvaluationController::class, 'edit'])->name('evaluations.edit');
Route::post('/evaluations/update/{id}', [EvaluationController::class, 'update'])->name('evaluations.update');
Route::get('/evaluations/delete/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.delete');
Route::get('/evaluations/show/{id}', [EvaluationController::class, 'show'])->name('evaluations.show');

// sujet
Route::get('/sujets/listes', [SujetController::class, 'index'])->name('sujets.listes');
Route::get('/sujets/ajout', [SujetController::class, 'create'])->name('sujets.ajout');
Route::post('/sujets/store', [SujetController::class, 'store'])->name('sujets.store');
Route::get('/sujets/edit/{id}', [SujetController::class, 'edit'])->name('sujets.edit');
Route::post('/sujets/update/{id}', [SujetController::class, 'update'])->name('sujets.update');
Route::get('/sujets/delete/{id}', [SujetController::class, 'destroy'])->name('sujets.delete');
Route::get('/sujets/show/{id}', [SujetController::class, 'show'])->name('sujets.show');

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

//users
Route::get('/Admin/user/', [UserController::class, 'index' ])->name('users.index');
Route::get('/admin/users/ajout', [UserController::class, 'create'])->name('admin.users.ajout');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/delete{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');


Route::get('/profile/vue', [ProfileController::class, 'index'])->name('profile.vue');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/show/{id}', [ProfileController::class, 'show'])->name('profile.show');

//profile ecole
Route::get('/pages/ecole/profile/vue', [EcoleProfileController::class, 'index'])->name('pages.ecole.profile.vue');
Route::get('/pages/ecole/profile/edit/{id}', [EcoleProfileController::class, 'edit'])->name('pages.ecole.profile.edit');
Route::post('/pages/ecole/profile/update/', [EcoleProfileController::class, 'update'])->name('pages.ecole.profile.update');
Route::get('/pages/ecole/profile/show/{id}', [EcoleProfileController::class, 'show'])->name('pages.ecole.profile.show');

//profile enseignant
Route::get('/pages/enseignant/profile/vue', [EnseignantProfileController::class, 'index'])->name('pages.enseignant.profile.vue');
Route::get('/pages/enseignant/profile/edit/{id}', [EnseignantProfileController::class, 'edit'])->name('pages.enseignant.profile.edit');
Route::post('/pages/enseignant/profile/update/', [EnseignantProfileController::class, 'update'])->name('pages.enseignant.profile.update');
Route::get('/pages/enseignant/profile/show/{id}', [EnseignantProfileController::class, 'show'])->name('pages.enseignant.profile.show');

Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');


// smtp ecole
Route::get("message", "MessageEcoleController@formEcoleMail");
Route::post("message", "MessageEcoleController@sendEcoleMail")->name('send.messageecole.google');

// smtp enseignant
Route::get("message", "MessageEnseignantController@formEnseignantMail");
Route::post("message", "MessageEcoleController@sendEnseignantMail")->name('send.messageenseignant.google');




