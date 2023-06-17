<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SettingHomePage;
use App\Models\AppartmentImg;
use App\Models\SettingProjetsPage;
use App\Models\InformationProjet;
use App\Models\PlanProjet;
use App\Models\Residence;

class SettingController extends Controller
{
    public function index(){
        if(auth()->user()->status=="directeur"){
            return view("settings.index");
        }else{
            abort(403);
        }
    }
    // globale settings
    public function globale(){
        if(auth()->user()->status=="directeur"){
            $settings = Setting::first();
            return view("settings.globale",compact("settings"));
        }else{
            abort(403);
        }
    }
    public function settingsGlobale(Request $request){
        if(auth()->user()->status=="directeur"){
            $settings = Setting::first();
            $settings->update([
                "facebook"=>$request->facebook,
                "instagram"=>$request->instagram,
                "linkedin"=>$request->linkedin,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "localisation"=>$request->localisation,
                "adresse"=>$request->adresse
            ]);
            if($request->logo!=""){
                unlink(public_path().'/'.$settings->logo);
            }
            if($request->file("logo")){
                $file =  $request->file("logo");
                $filename=Str::uuid().$file->getClientOriginalName();
                $file->move(public_path("assets/imgsInterface"),$filename);
                $path = '/assets/imgsInterface/'.$filename;
                $settings->update(["logo"=>$path]);
            }
            return redirect()->route("settings.globale")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }

    }
    // home page settings
    public function homePage(){
        if(auth()->user()->status=="directeur"){
            $settings1 = SettingHomePage::first();
            $settings2 = AppartmentImg::all();
            return view("settings.homePage",compact("settings1","settings2"));
        }else{
            abort(403);
        }
    }
    public function settings_home_page_add_slider1(Request $request){
        $this->validate($request,[
            "img"=>"required"
        ]);
        if(auth()->user()->status=="directeur"){
            $settings = SettingHomePage::first();
            if($settings->img1==null){
              $file =  $request->file("img");
              $filename=Str::uuid().$file->getClientOriginalName();
              $file->move(public_path("assets/imgsInterface"),$filename);
              $path = '/assets/imgsInterface/'.$filename;
              $settings->update(["img1"=>$path]);
            }
            else if($settings->img2==null){
              $file =  $request->file("img");
              $filename=Str::uuid().$file->getClientOriginalName();
              $file->move(public_path("assets/imgsInterface"),$filename);
              $path = '/assets/imgsInterface/'.$filename;
              $settings->update(["img2"=>$path]);
            }
            else{
              $file =  $request->file("img");
              $filename=Str::uuid().$file->getClientOriginalName();
              $file->move(public_path("assets/imgsInterface"),$filename);
              $path = '/assets/imgsInterface/'.$filename;
              $settings->update(["img3"=>$path]);
            }
            return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }
    }
    public function supprimer_slider1_home_page(){
        if(auth()->user()->status=="directeur"){
            $settings = SettingHomePage::first();
            unlink(public_path().'/'.$settings->img1);
            $settings->update([
              "img1"=>null
            ]);
            return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }
    }
      public function supprimer_slider2_home_page(){
        if(auth()->user()->status=="directeur"){
            $settings = SettingHomePage::first();
            unlink(public_path().'/'.$settings->img2);
            $settings->update([
              "img2"=>null
            ]);
            return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }
    }
    public function supprimer_slider3_home_page(){
        if(auth()->user()->status=="directeur"){
            $settings = SettingHomePage::first();
            unlink(public_path().'/'.$settings->img3);
            $settings->update([
              "img3"=>null
            ]);
            return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }
  }
  public function settings_home_page_add_slider2(Request $request){
    $this->validate($request,[
        "img"=>"required"
    ]);
    if(auth()->user()->status=="directeur"){
        $file =  $request->file("img");
        $filename=Str::uuid().$file->getClientOriginalName();
        $file->move(public_path("assets/imgsInterface"),$filename);
        $path = '/assets/imgsInterface/'.$filename;
        AppartmentImg::create(["img"=>$path]);
        return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
    }else{
        abort(403);
    }
    }
    public function supprimer_appartement($id){
        if(auth()->user()->status=="directeur"){
            $settings = AppartmentImg::where("id",$id)->first();
            unlink(public_path().'/'.$settings->img);
            $settings->delete();
            return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }
    }
    public function settings_home_page_video(Request $request){
        $this->validate($request,[
            "video"=>"required"
        ]);
        if(auth()->user()->status=="directeur"){
            $settings = SettingHomePage::first();
            $settings->update([
                "video"=>$request->video
            ]);
            return redirect()->route("settings.homePage")->with("modifier","settings sont modifié avec succé");
        }else{
            abort(403);
        }
    }
    // projets settings
    public function projetsPage(){
        if(auth()->user()->status=="directeur"){
            $settings_projets = SettingProjetsPage::all();
            return view("settings.projetsPage",compact("settings_projets"));
        }else{
            abort(403);
        }
    }
    public function supprimer_projet($id){
        if(auth()->user()->status=="directeur"){
            $projet = SettingProjetsPage::where("id",$id)->first();
            $projet->delete();
            return redirect()->route("settings.projetsPage")->with("supprimer","projet est supprimé avec succé");
        }else{
            abort(403);
        }
    }
    public function ajouter_projet(){
        if(auth()->user()->status=="directeur"){
            $residences = Residence::all();
            return view("settings.ajouterProjet",compact("residences"));
        }else{
            abort(403);
        }
    }
    public function setting_projet_ajouter(Request $request){
        if(auth()->user()->status=="directeur"){
            $this->validate($request,[
                "title"=>"required",
                "img"=>"required",
                "phone"=>"numeric|required",
                "email"=>"email|required",
                "adress"=>"required",
                "localisation"=>"required",
                "cuisine"=>"numeric|required",
                "sall_bain"=>"numeric|required",
                "balcon"=>"numeric|required",
                "chambre"=>"numeric|required",
                "salon"=>"numeric|required",
                "description"=>"required",
                "ville"=>"required"
           ]);
           $file =  $request->file("img");
           $filename=Str::uuid().$file->getClientOriginalName();
           $file->move(public_path("assets/imgsInterface"),$filename);
           $path = '/assets/imgsInterface/'.$filename;
           $projet = SettingProjetsPage::create([
              "title"=>$request->title,
              "img"=>$path,
              "description"=>$request->description,
              "residence_id"=>$request->residence_id,
              "ville"=>$request->ville
           ]);
           InformationProjet::create([
               "email"=>$request->email,
               "phone"=>$request->phone,
               "adress"=>$request->adress,
               "localisation"=>$request->localisation,
               "projet_id"=>$projet->id,
           ]);
           PlanProjet::create([
                "chambre"=>$request->chambre,
                "salon"=>$request->salon,
                "cuisine"=>$request->cuisine,
                "balcon"=>$request->balcon,
                "sall_bain"=>$request->sall_bain,
                "projet_id"=>$projet->id
           ]);
           return redirect()->route("settings.projetsPage")->with("ajouter","projet est ajouté avec succé");
        }else{
            abort(403);
        }
    }
    public function setting_projet_edit($id){
        if(auth()->user()->status=="directeur"){
            $residences = Residence::all();
            $projet = SettingProjetsPage::where("id",$id)->first();
            return view("settings.projetEdit",compact("projet","residences"));
        }else{
            abort(403);
        }
    }
    public function setting_projet_update(Request $request,$id){
        if(auth()->user()->status=="directeur"){
            $projet = SettingProjetsPage::where("id",$id)->first();
            $this->validate($request,[
               "title"=>"required",
               "phone"=>"numeric|required",
               "email"=>"email|required",
               "adress"=>"required",
               "localisation"=>"required",
               "cuisine"=>"numeric|required",
               "sall_bain"=>"numeric|required",
               "balcon"=>"numeric|required",
               "chambre"=>"numeric|required",
               "salon"=>"numeric|required",
               "description"=>"required",
               "ville"=>"required"
          ]);
            $path = $projet->img;
            if($request->img!=""){
                unlink(public_path().$projet->img);
                $file =  $request->file("img");
                $filename=Str::uuid().$file->getClientOriginalName();
                $file->move(public_path("assets/imgsInterface"),$filename);
                $path = '/assets/imgsInterface/'.$filename;
            }
            $projet->update([
               "title"=>$request->title,
               "img"=>$path,
               "description"=>$request->description,
               "residence_id"=>$request->residence_id,
               "ville"=>$request->ville
            ]);
            $projet->InformationProjet->update([
                "email"=>$request->email,
                "phone"=>$request->phone,
                "adress"=>$request->adress,
                "localisation"=>$request->localisation,
                "projet_id"=>$projet->id
            ]);
            $projet->PlanProjet->update([
                 "chambre"=>$request->chambre,
                 "salon"=>$request->salon,
                 "cuisine"=>$request->cuisine,
                 "balcon"=>$request->balcon,
                 "sall_bain"=>$request->sall_bain,
                 "projet_id"=>$projet->id
            ]);
            return redirect()->route("settings.projetsPage")->with("modifier","projet est modifié avec succé");
        }else{
            abort(403);
        }
    }
    // settings images pages
    public function settings_images_pages(){
        if(auth()->user()->status=="directeur"){
             // nous n'avons besoins pas d'une variable(compact) car nous sommes déja avoir une variable globale: $settings
             return view("settings.ImagesPages");
        }else{
            abort(403);
        }
    }
    public function settings_update_images_pages(Request $request){
        if(auth()->user()->status=="directeur"){
            $settings = Setting::first();
            if($request->contactImg!=""){
                unlink(public_path().$settings->contactImg);
                $file =  $request->file("contactImg");
                $filename=Str::uuid().$file->getClientOriginalName();
                $file->move(public_path("assets/imgsInterface"),$filename);
                $contactPath = '/assets/imgsInterface/'.$filename;
            }
            else{
                $contactPath = $settings->contactImg;
            }
            if($request->projetsImg!=""){
                unlink(public_path().$settings->projetsImg);
                $file =  $request->file("projetsImg");
                $filename=Str::uuid().$file->getClientOriginalName();
                $file->move(public_path("assets/imgsInterface"),$filename);
                $projetsPath = '/assets/imgsInterface/'.$filename;
            }
            else{
                $projetsPath = $settings->projetsImg;
            }
            $settings->update([
                "contactImg"=>$contactPath,
                "projetsImg"=>$projetsPath
            ]);
            return redirect()->route("settings.ImagesPages")->with("modifier","images sont modifiés avec succé");
        }else{
            abort(403);
        }
    }
}
