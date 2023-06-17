<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\ClientEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Projet;
use App\Models\Residence;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        if(auth()->user()->status!="directeur"){
            if(!empty(auth()->user()->Residence)){
                $residence_id = auth()->user()->Residence->id;
                $clients = Client::where("résidence_id",$residence_id)->get();
            }
            else{
                $clients = [];
            }
        }
        return view("clients.afficher",compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::all();
        return view("clients.ajouter",compact("projets"));
    }

    public function filtrerRésidence($id){
        $le_Projet = Projet::where("id",$id)->first();
        $residences = $le_Projet->Residence;
        return response()->json($residences);
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
            "prénom"=>"required",
            "nom"=>"required",
            "email"=>"email|unique:clients",
            "phone"=>"required|numeric|digits:10",
            "age"=>"required|numeric",
            "résidence_id"=>"numeric",
            "projet_id"=>"numeric"
        ]);
        if(auth()->user()->status=="directeur"){
            Client::create([
                "prénom"=>$request->prénom,
                "nom"=>$request->nom,
                "age"=>$request->age,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "sex"=>$request->sex,
                "résidence_id"=>$request->résidence_id
            ]);
        }
        else{
            Client::create([
                "prénom"=>$request->prénom,
                "nom"=>$request->nom,
                "age"=>$request->age,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "sex"=>$request->sex,
                "résidence_id"=>auth()->user()->Residence->id
            ]);
        }

         return redirect()->route("clients.index")->with("ajouter","client est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projets = Projet::all();
        $client = Client::where("id",$id)->first();
        if(auth()->user()->status=="directeur" or $client->residence->id==auth()->user()->Residence->id){
            return view( "clients.update",compact("client","projets"));
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $client = Client::where("id",$id);
        if(auth()->user()->status=="directeur" or $client->first()->residence->id==auth()->user()->Residence->id){
            $this->validate($request,[
                "prénom"=>"required",
                "nom"=>"required",
                "email"=>["email","required",Rule::unique(Client::class)->ignore($id)],
                "phone"=>"required|numeric|digits:9",
                "age"=>"required|numeric"
            ]);
            $client->update([
                "prénom"=>$request->prénom,
                "nom"=>$request->nom,
                "age"=>$request->age,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "sex"=>$request->sex
            ]);
            if($request->résidence_id!=null){
                $client->update([
                    "résidence_id"=>$request->résidence_id
                ]);
            }
             return redirect()->route("clients.index")->with("modifier","client est modifier avec succé");
        }
        else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function delete($id){
        $client = Client::where("id",$id);
        if(auth()->user()->status=="directeur" or $client->first()->residence->id==auth()->user()->Residence->id){
            $client->delete();
            return redirect()->route("clients.index")->with("supprimer","client est supprimé avec succé");
        }
        else{
            abort(403);
        }
    }
    public function send_email(Request $request){
        $clients = Client::all();
        foreach($clients as $client){
             Mail::to($client->email)->send(new ClientEmail($request));
        }
        return redirect()->route("clients.index")->with("emailSuccess","email est envoyé avec succé");

    }
}
