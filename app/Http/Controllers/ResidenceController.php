<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Projet;
use App\Models\Residence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residences = Residence::all();
        return view("residences.afficher",compact("residences"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status=="directeur"){
            $users = User::where("id","!=",1)->get();
            $filterUsers = array();
            foreach($users as $user){
                if(!$user->Residence){
                    //$filterUsers[] = $user;
                    array_push($filterUsers,$user);
                }
            }
            $projets = Projet::all();

            return view("residences.ajouter",compact("filterUsers","projets"));
        }else{
            abort(403);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->status=="directeur"){
            $this->validate($request,[
                "title"=>"required",
                "adresse"=>"required",
                "user_id"=>"required",
                "projet_id"=>"required"
            ]);
            Residence::create([
                'title' => $request->title,
                'adresse'=>$request->adresse,
                'user_id'=> $request->user_id,
                'projet_id' => $request->projet_id,
            ]);
            return redirect()->route("residences.index")->with("ajouter","residence est ajouté avec succé");
        }else{
            abort(403);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->status=="directeur"){
            $residence = Residence::where("id",$id)->first();
            $users = User::where("id","!=",1)->get();
            $filterUsers = array();
            foreach($users as $user){
                if(!$user->Residence or $user->id==$user->Residence->user_id){
                    array_push($filterUsers,$user);
                }
            }
            $projets = Projet::all();
            return view("residences.update",compact("residence","filterUsers","projets"));
        }else{
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->status=="directeur"){
            $residence = Residence::where("id",$id);
            $this->validate($request,[
                   "title"=>"required",
                   "adresse"=>"required",
            ]);
            $residence->update([
                'title' => $request->title,
                'adresse'=>$request->adresse,
                'user_id'=> $request->user_id,
                'projet_id' => $request->projet_id,
            ]);
            return redirect()->route("residences.index")->with("modifier","residence est modifié avec succé");
        }else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        if(Auth::user()->status=="directeur"){
            $residence = Residence::where("id",$id)->first();
            $residence->delete();
            return redirect()->route("residences.index")->with("supprimer","residence est supprimé avec succé");
        }else{
            abort(403);
        }

    }



    public function destroy($id){

    }
}
