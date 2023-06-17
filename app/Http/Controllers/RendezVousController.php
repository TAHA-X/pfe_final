<?php

namespace App\Http\Controllers;

use App\Models\rendezVous;
use Illuminate\Http\Request;
use App\Models\Residence;
use App\Models\SettingProjetsPage;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residences = Residence::all();
        if(auth()->user()->status=="directeur"){
            $rendezVous = rendezVous::all();
        }else{
            if(!empty(auth()->user()->Residence)){
                $residence_of_that_user = auth()->user()->Residence;
                $rendezVous = $residence_of_that_user->rendez_vous;
            }
            else{
                $residence_of_that_user = [];
                $rendezVous = [];
            }

        }
        return view("rendezVous.afficher",compact("rendezVous","residences"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function show(rendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rendezVous $rendezVous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rendezVous  $rendezVous
     * @return \Illuminate\Http\Response
     */
    public function destroy(rendezVous $rendezVous)
    {
        //
    }
    public function delete($id){
        $ren = rendezVous::where("id",$id)->first();
        if(auth()->user()->status=="directeur"){
            $ren->delete();
            return redirect()->route("rendezVous.index")->with("supprimer","rendez-vous est supprimé avec succé");
        }
        else{
            $residence_of_that_user = auth()->user()->Residence;
            if($residence_of_that_user->id==$ren->résidence_id){
                $ren->delete();
                return redirect()->route("rendezVous.index")->with("supprimer","rendez-vous est supprimé avec succé");
            }
            else{
                abort(403);
            }
        }
    }

    public function enCours($id){
        $ren = rendezVous::where("id",$id)->first();
        if(auth()->user()->status=="directeur"){
            $ren->update(["status"=>1]);
            return redirect()->route("rendezVous.index")->with("modifier","rendez-vous est modifié avec succé");
        }
        else{
            $residence_of_that_user = auth()->user()->Residence;
            if($residence_of_that_user->id==$ren->résidence_id){
                $ren->update(["status"=>1]);
                return redirect()->route("rendezVous.index")->with("modifier","rendez-vous est modifié avec succé");
            }
            else{
                abort(403);
            }
        }
    }


    public function reporter($id){
        $ren = rendezVous::where("id",$id)->first();
        if(auth()->user()->status=="directeur"){
            $ren->update(["status"=>2]);
            return redirect()->route("rendezVous.index")->with("modifier","rendez-vous est modifié avec succé");
        }
        else{
            $residence_of_that_user = auth()->user()->Residence;
            if($residence_of_that_user->id==$ren->résidence_id){
                $ren->update(["status"=>2]);
                return redirect()->route("rendezVous.index")->with("modifier","rendez-vous est modifié avec succé");
            }
            else{
                abort(403);
            }
        }
    }

    public function realiser($id){
        $ren = rendezVous::where("id",$id)->first();
        // return $ren;
        if(auth()->user()->status=="directeur"){
            $ren->update(["status"=>3]);
            return redirect()->route("rendezVous.index")->with("modifier","rendez-vous est modifié avec succé");
        }
        else{
            $residence_of_that_user = auth()->user()->Residence;
            if($residence_of_that_user->id==$ren->résidence_id){
                $ren->update(["status"=>3]);
                return redirect()->route("rendezVous.index")->with("modifier","rendez-vous est modifié avec succé");
            }
            else{
                abort(403);
            }
        }
    }


    public function ajouter(Request $request,$id){
         $setting_projet = SettingProjetsPage::where("id",$id)->first();
         $this->validate($request,[
            "nom"=>"required",
            "phone"=>"numeric|required",
            "sujet"=>"required"
         ]);
         rendezVous::create([
            "nom"=>$request->nom,
            "phone"=>$request->phone,
            "sujet"=>$request->sujet,
            "résidence_id"=>$setting_projet->Residence->id,
            "projet_id"=>$setting_projet->Residence->projet->id,
            "status"=>1
         ]);
         return redirect()->back()->with("ajouter","vous avez fut un rendez vous avex succé");
    }
}
