<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\ImmeubleController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\rendezVousController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatistiquesController;
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



Route::middleware('auth')->group(function () {

// responsables
Route::resource('responsable',ResponsableController::class);
Route::get("deleteResponsable/{id}",[ResponsableController::class,"delete"])->name("responsable.delete");
Route::get("responsables_email",function(){
    return view("responsables.email_form");
})->name("responsables.email");
Route::post("send_email_responsable",[ResponsableController::class,"send_email_responsables"])->name("responsables.send_email");


// projets
Route::resource('projets',ProjetController::class);
Route::get("deleteProjets/{id}",[ProjetController::class,"delete"])->name("projets.delete");

// residences
Route::resource('residences',ResidenceController::class);
Route::get("deleteResidences/{id}",[ResidenceController::class,"delete"])->name("residences.delete");

// immeubles
Route::resource('immeubles',ImmeubleController::class);
Route::get("immeublefilter/{id}",[ImmeubleController::class,"filter"]);
Route::get("deleteImmeuble/{id}",[ImmeubleController::class,"delete"])->name('immeubles.delete');

// appartement
Route::resource('appartements',AppartementController::class);
Route::get("enCours/{id}",[AppartementController::class,"enCours"])->name("appartements.enCours");
Route::get("pasVendu/{id}",[AppartementController::class,"pasVendu"])->name("appartements.pasVendu");

// clients
Route::resource('clients', ClientController::class);
Route::get("deleteClient/{id}",[ClientController::class,"delete"])->name("clients.delete");
Route::get("email_form",function(){
    return view("clients.email_form");
})->name("clients.Email_form");
Route::post("clients_send_email",[ClientController::class,"send_email"])->name("clients.send_email");

// achats
Route::resource("achats",AchatController::class);
Route::get("résidencefilter_achat/{id}",[AchatController::class,"filtrerRésidence"]);
Route::get("immeublefilter_achat/{id}",[AchatController::class,"filtrerImmeuble"]);
Route::get("appartement_achat/{id}",[AchatController::class,"filtrerAppartement"]);
Route::get("appartement_delete/{id}",[AchatController::class,"delete"])->name("achats.delete");

// rendez vous
Route::resource('rendezVous',rendezVousController::class);
Route::get("rendezVous_enCours/{id}",[rendezVousController::class,"enCours"])->name("rendezVous.enCours");
Route::get("rendezVous_reporter/{id}",[rendezVousController::class,"reporter"])->name("rendezVous.reporter");
Route::get("rendezVous_realiser/{id}",[rendezVousController::class,"realiser"])->name("rendezVous.realiser");

Route::get("rendezVous_delete/{id}",[rendezVousController::class,"delete"])->name("rendezVous.delete");
Route::post("rendezVous_ajouter{id}",[rendezVousController::class,"ajouter"])->name("rendezVous.ajouter");

// settings(interface)
Route::get("/settings",[settingController::class,"index"])->name('settings.index');
Route::get("/globale",[settingController::class,"globale"])->name('settings.globale');
Route::post("settingsGlobale",[settingController::class,"settingsGlobale"])->name("settingsGlobale");
Route::get("settingsHomePage",[settingController::class,"homePage"])->name("settings.homePage");
Route::post("settings_home_page_add_slider1",[settingController::class,"settings_home_page_add_slider1"])->name("settings_home_page_add_slider1");
Route::get("supprimer_slider1_home_page",[settingController::class,"supprimer_slider1_home_page"])->name("supprimer_slider1_home_page");
Route::get("supprimer_slider2_home_page",[settingController::class,"supprimer_slider2_home_page"])->name("supprimer_slider2_home_page");
Route::get("supprimer_slider3_home_page",[settingController::class,"supprimer_slider3_home_page"])->name("supprimer_slider3_home_page");
Route::post("settings_home_page_add_slider2",[settingController::class,"settings_home_page_add_slider2"])->name("settings_home_page_add_slider2");
Route::get("supprimer_appartement/{id}",[settingController::class,"supprimer_appartement"])->name("supprimer_appartement");
Route::post("settings_home_page_video",[settingController::class,"settings_home_page_video"])->name("settings_home_page_video");
Route::get("settingsProjetsPage",[settingController::class,"projetsPage"])->name("settings.projetsPage");
Route::get('supprimer_settingsProjets/{id}',[settingController::class,"supprimer_projet"])->name("settingsProjets.supprimer");
Route::get('ajouter_projet',[settingController::class,"ajouter_projet"])->name("settingsProjets.ajouter");
Route::post('setting_projet_ajouter',[settingController::class,"setting_projet_ajouter"])->name("settingsProjetsAjouter");
Route::get("setting_projet_edit/{id}",[settingController::class,"setting_projet_edit"])->name("settingsProjets.edit");
Route::put("setting_projet_update/{id}",[settingController::class,"setting_projet_update"])->name("settingsProjetsUpdate");
Route::get("settings_images_pages",[settingController::class,"settings_images_pages"])->name("settings.ImagesPages");
Route::put("settings_update_images_pages",[settingController::class,"settings_update_images_pages"])->name("settings_update_images_pages");

// statistiques(home page for directeur)
Route::resource("statistiques",StatistiquesController::class);







Route::get('/dashboard', function () {
    return redirect()->route("statistiques.index");
})->middleware(['auth', 'verified'])->name('dashboard');
// profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/deleteImg',[ProfileController::class, 'deleteImg'])->name("profile.deleleImg");
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   // Route::get("check_form",[ProfileController::class, 'check_form'])->name("profile.check_form");
});

require __DIR__.'/auth.php';




// interface
Route::get("/",[PagesController::class,"index"]);
Route::get("/contact",[PagesController::class,"contact"])->name("contact");
Route::get("/allResidences",[PagesController::class,"allResidences"]);
Route::get("/everyResidence/{id}",[PagesController::class,"everyResidence"])->name("everyResidence");
Route::get("/guide",[PagesController::class,"guide"]);
Route::post("send_message",[PagesController::class,"send_message"])->name("send_message");
Route::post("filtrer_par_ville",[PagesController::class,"filtrer_par_ville"])->name("filtrer_par_ville");
Route::get("/about",[PagesController::class,"about"]);

