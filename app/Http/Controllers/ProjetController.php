<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $projets = Projet::all();
        return view("projets.afficher",compact("projets"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status=="directeur"){
            $this->authorizeResource("viewAny", Auth::user());
            return view("projets.ajouter");
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
        // $this->authorize("viewAny",Projet::class);
        if(Auth::user()->status=="directeur"){
            $this->validate($request,[
                "title"=>"required",
                "adresse"=>"required",
            ]);
            $projet = Projet::create([
                'title' => $request->title,
                'adresse'=>$request->adresse,
            ]);
            return redirect()->route("projets.index")->with("ajouter","projet est ajouté avec succé");
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
        // $users = User::where("id","!=",auth()->user()->id)->get();
        // $this->authorize("viewAny",User::where("id",auth()->user()->id)->first(),Projet::class);
        if(Auth::user()->status=="directeur"){
            $projet = Projet::where("id",$id)->first();
            return view("projets.update",compact("projet"));
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
        // $this->authorize("viewAny",User::where("id",auth()->user()->id)->first(),Projet::class);
        if(Auth::user()->status=="directeur"){
            $projet = Projet::where("id",$id);
            $this->validate($request,[
                "title"=>"required",
                "adresse"=>"required",
            ]);

            $projet->update([
                "title"=>$request->title,
                "adresse"=>$request->adresse,
            ]);


            return redirect()->route("projets.index")->with("modifier","projet est modifié avec succé");
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
        //  $this->authorize("viewAny",User::where("id",auth()->user()->id)->first(),Projet::class);
        if(Auth::user()->status=="directeur"){
            $projet = Projet::where("id",$id)->first();
            $projet->delete();
            return redirect()->route("projets.index")->with("supprimer","projet est supprimé avec succé");
        }else{
            abort(403);
        }

    }



    public function destroy($id){

    }
}
