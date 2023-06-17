<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingProjetsPage;
use App\Mail\ContactClient;
use Illuminate\Support\Facades\Mail;



class PagesController extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function contact(){
        $projets = SettingProjetsPage::all();
        return view("interface.contact",compact('projets'));
    }
 
    public function about(){
        return view("interface.about");
    }
    public function guide(){
        return view("interface.guide");
    }

    public function allResidences(){
        $filter = true;
        return view("interface.allResidences",compact('filter'));
    }

    public function filtrer_par_ville(Request $request){
        $villes_after_filter = SettingProjetsPage::where("ville",$request->filter_ville)->get();
        // return $villes_after_filter;
        $filter = true;
        return view("interface.allResidences",compact("villes_after_filter","filter"));
        // return response()->json($residences);
    }

    public function everyResidence($id){
        $projet = SettingProjetsPage::where("id",$id)->first();
        return view("interface.everyResidence",compact("projet"));
    }

    public function send_message(Request $request){
        $this->validate($request,[
             "nom"=>"required",
             "phone"=>"numeric|digits:10|required",
             "sujet"=>"required",
             "message"=>"required",
             "projet"=>"required"
        ]);
        Mail::to(SettingProjetsPage::where("id",$request->projet)->first()->InformationProjet->email)->send(new ContactClient($request));
        return redirect()->route("contact")->with("messageSent",'merci,nous allons essayer de vous répondre');
    }
}
