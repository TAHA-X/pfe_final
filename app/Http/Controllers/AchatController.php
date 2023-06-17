<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Projet;
use App\Models\Client;
use App\Models\Residence;
use App\Models\Appartement;
use App\Models\Immeuble;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->status=="directeur"){
            $achats = Achat::all();
        }
        else{
            if(!empty(auth()->user()->Residence)){
                $responsable_id = auth()->user()->Residence->id;
                $achats = Achat::where("residence_id",$responsable_id)->get();
            }
            else{
                $achats = [];
            }
        }
        return view("achats.afficher",compact("achats"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->status=="directeur"){
            $projets = Projet::all();
            $appartements = Appartement::all();
            $clients = Client::all();
            return view("achats.ajouter",compact("clients","projets","appartements"));
        }
        else{
            if(!empty(auth()->user()->Residence)){
                $residence = auth()->user()->Residence;
                if(count($residence->immeuble)>0){
                    $immeubles = $residence->immeuble;
                    $appartements = Appartement::all();
                    $clients = Client::where("résidence_id",$residence->id)->get();
                    if(count($clients)>0){
                        $clients = Client::where("résidence_id",$residence->id)->get();
                    }
                    else{
                        $clients = [];
                    }
                }
                else{
                    $immeubles = [];
                    $clients = [];
                    $appartements = [];
                }
            }
            else{
                $achats = [];
                $clients = [];
                $appartements = [];
                $immeubles = [];
            }
            return view("achats.ajouter_for_responsable",compact("clients","appartements","immeubles"));
        }
    }

    public function filtrerRésidence($id){
        $le_Projet = Projet::where("id",$id)->first();
        $residences = $le_Projet->Residence;
        return response()->json($residences);
    }

    public function filtrerImmeuble($id){
        $la_residence = Residence::where("id",$id)->first();
        $immeubles = $la_residence->immeuble;
        return response()->json($immeubles);
    }

    public function filtrerAppartement($id){
        $appartements = Appartement::where([["status","!=","vendu"],["immeuble_id",$id]])->get();
        return response()->json($appartements);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           "immeuble_id"=>"required|numeric",
           "appartement_id"=>"required|numeric",
           "client_id"=>"required|numeric"
        ]);
        if(auth()->user()->status=="directeur"){
            $achat = Achat::create([
                "projet_id"=>$request->projet_id,
                "residence_id"=>$request->residence_id,
                "immeuble_id"=>$request->immeuble_id,
                "appartement_id"=>$request->appartement_id,
                "client_id"=>$request->client_id,
            ]);
        }
        else{
            $residence = Residence::where("user_id",auth()->user()->id)->first();
            $achat = Achat::create([
                "projet_id"=>$residence->projet->id,
                "residence_id"=>$residence->id,
                "immeuble_id"=>$request->immeuble_id,
                "appartement_id"=>$request->appartement_id,
                "client_id"=>$request->client_id,
            ]);
        }
        $appartement = Appartement::where("id",$request->appartement_id);
        $appartement->update(["status"=>"vendu"]);
        $appartementsOfImmeuble = $achat->immeuble->appartement;
        $statusOfImmeuble = "vendu";
        foreach($appartementsOfImmeuble as $app){
               if($app->status=="pasVendu"){
                  $statusOfImmeuble = "pasVendu";
               }
        }
        if($statusOfImmeuble=="vendu"){
            $achat->immeuble->update(["status"=>"vendu"]);
        }
        return redirect()->route("achats.index")->with("ajouter","achat est ajouté avec succé");
    }

    public function delete($id){
        if(auth()->user()->status=="directeur"){
            $achat = Achat::where("id",$id)->first();
            $achat->appartement->update(["status"=>"pasVendu"]);
            $achat->delete();
        }
        else{
            $achat = Achat::where("id",$id)->first();
            if($achat->residence->user_id==auth()->user()->id){
                $achat->appartement->update(["status"=>"pasVendu"]);
                $achat->delete();
                return redirect()->route("achats.index")->with("supprimer","achat est supprimé avec succé");
            }
            else{
                abort(403);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function show(Achat $achat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->status=="directeur"){
            $achat = Achat::where("id",$id)->first();
            $immeubles = Immeuble::all();
            $projets = Projet::all();
            $residences = $achat->projet->residence;
            $appartements = Appartement::where([["immeuble_id",$achat->immeuble_id],["status","!=","vendu"]])->orWhere([["immeuble_id",$achat->immeuble_id],["status","vendu"],["id",$achat->appartement_id]])->get();
            $clients = Client::all();
            return view("achats.update",compact('achat','immeubles','projets',"residences","appartements","clients"));
        }
        else{
            $achat = Achat::where("id",$id)->first();
            $residence = auth()->user()->Residence;
            $immeubles = $residence->immeuble;
            $appartements = Appartement::where([["immeuble_id",$achat->immeuble_id],["status","!=","vendu"]])->orWhere([["immeuble_id",$achat->immeuble_id],["status","vendu"],["id",$achat->appartement_id]])->get();

            $clients = Client::where("résidence_id",$residence->id)->get();
            return view("achats.update_for_responsable",compact('achat','immeubles',"clients","appartements"));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "immeuble_id"=>"required|numeric",
            "appartement_id"=>"required|numeric",
            "client_id"=>"required|numeric"
        ]);
        $achat = Achat::where("id",$id)->first();
        if($achat->appartement->status=="vendu"){
            $achat->appartement->update(["status"=>"pasVendu"]);
        }
        if(auth()->user()->status=="directeur"){
            $achat->update([
                "projet_id"=>$request->projet_id,
                "residence_id"=>$request->residence_id,
                "immeuble_id"=>$request->immeuble_id,
                "appartement_id"=>$request->appartement_id,
                "client_id"=>$request->client_id,
            ]);
        }
        else{
            $residence = Residence::where("user_id",auth()->user()->id)->first();

            $achat->update([
                "projet_id"=>$residence->projet->id,
                "residence_id"=>$residence->id,
                "immeuble_id"=>$request->immeuble_id,
                "appartement_id"=>$request->appartement_id,
                "client_id"=>$request->client_id,
            ]);
        }


         $appartement = Appartement::where("id",$request->appartement_id);
         $appartement->update(["status"=>"vendu"]);
         $appartementsOfImmeuble = $achat->immeuble->appartement;
         $statusOfImmeuble = "vendu";
         foreach($appartementsOfImmeuble as $app){
                if($app->status=="pasVendu"){
                   $statusOfImmeuble = "pasVendu";
                }
         }
         if($statusOfImmeuble=="vendu"){
             $achat->immeuble->update(["status"=>"vendu"]);
         }
         return redirect()->route("achats.index")->with("modifier","achat est modifié avec succé");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achat $achat)
    {
        //
    }
}
