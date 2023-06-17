<?php

namespace App\Http\Controllers;

use App\Models\Immeuble;
use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Residence;
use App\Models\Appartement;

class ImmeubleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->status=="directeur"){
            $immeubles = Immeuble::all();
        }
        else{
            $residence = auth()->user()->residence;
            if(!empty($residence)){
                $immeubles = $residence->immeuble;
            }
            else{
                $immeubles = [];
            }
        }
        return view("immeubles.afficher",compact("immeubles"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $first_Projet = Projet::all()->first();
        $projets = Projet::all();
        $allResidences = Residence::all();
        if($first_Projet){
            $residences = $first_Projet->Residence;
        }
        else{
            $residences = null;
        }

        return view("immeubles.ajouter",compact("projets","residences","allResidences"));
    }

    public function filter($id=null){
        $le_Projet = Projet::where("id",$id)->first();
        // $projets = Projet::all();
        $residences = $le_Projet->Residence;
        return response()->json($residences);
       // return view("immeubles.ajouter",compact("projets","residences"));
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
            "entrée"=>"required|numeric",
            "num"=>"required|numeric",
            "residence_id"=>"numeric",
        ]);
        $allImmeubles = Immeuble::all();
        foreach($allImmeubles as $Imm){
            if($Imm->entrée==$request->entrée and $Imm->num==$request->num and $Imm->residence_id==$request->residence_id){
                return redirect()->route("immeubles.create")->with("warning","immeuble est déja ajouté");
            }
        }
        if($request->residence_id!=""){
            $immeuble = Immeuble::create([
                'entrée' => $request->entrée,
                'num' =>$request->num,
                "residence_id"=>$request->residence_id
            ]);
        }
        else{
            $allImmeubles = Immeuble::all();
            foreach($allImmeubles as $Imm){
                if($Imm->entrée==$request->entrée and $Imm->num==$request->num and $Imm->residence_id==auth()->user()->residence->id){
                    return redirect()->route("immeubles.create")->with("warning","immeuble est déja ajouté");
                }
            }
            $immeuble = Immeuble::create([
                'entrée' => $request->entrée,
                'num' =>$request->num,
                "residence_id"=>auth()->user()->residence->id
            ]);
        }

        for($i = 1;$i<=20;$i++){
            Appartement::create([
                "num"=>$i,
                "immeuble_id"=>$immeuble->id
            ]);
        }
        return redirect()->route("immeubles.index")->with("ajouter","immeuble est ajouté avec succé");
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
        $immeuble = Immeuble::where("id",$id)->first();

       if(auth()->user()->status=="directeur" or auth()->user()->residence->id==$immeuble->residence->id){
        if(auth()->user()->status=="directeur"){
            $projets = Projet::all();
            $immeuble = Immeuble::where("id",$id)->first();
            $le_projet_id = $immeuble->residence->projet->id;
            $residences = Residence::where("projet_id",$le_projet_id)->get();
            return view("immeubles.update",compact("immeuble","projets","le_projet_id","residences"));
        }
        else{
            $immeuble = Immeuble::where("id",$id)->first();
            return view( "immeubles.update",compact("immeuble"));
        }
       }
       else{
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
        $immeuble = Immeuble::where("id",$id)->first();
        if(auth()->user()->status=="directeur" or auth()->user()->residence->id==$immeuble->residence->id){
            if(auth()->user()->status=="directeur"){
                $immeuble = Immeuble::where("id",$id);
                $this->validate($request,[
                    "entrée"=>"required|numeric",
                    "residence_id"=>"numeric",
                    "projet_id"=>"numeric",
                    "num"=>"required|numeric"
                ]);
                $allImmeubles = Immeuble::all();
                foreach($allImmeubles as $Imm){
                    if($Imm->entrée==$request->entrée and $Imm->num==$request->num and $Imm->residence_id==$request->residence_id and $Imm->id!=$id){
                        return redirect()->back()->with("warning","immeuble est déja exist");
                    }
                }
                if($request->residence_id!=null and $request->projet_id!=null){
                    $immeuble->update([
                        'entrée' => $request->entrée,
                        'num' => $request->num,
                        "residence_id"=>$request->residence_id
                    ]);
                }
                else{
                    $immeuble->update([
                        'entrée' => $request->entrée,
                        'num' => $request->num,
                        "residence_id"=>$immeuble->first()->residence_id
                    ]);
                 }
            }
            else{
                $immeuble->update([
                    'entrée' => $request->entrée,
                    'num' => $request->num,
                ]);
            }
            return redirect()->route("immeubles.index")->with("modifier","immeuble est modifié avec succé");

        }
        else{
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

        $immeuble = Immeuble::where("id",$id)->first();
        if(auth()->user()->status=="directeur" or auth()->user()->residence->id==$immeuble->residence->id){
            $immeuble = Immeuble::where("id",$id)->first();
            $immeuble->delete();
            return redirect()->route("immeubles.index")->with("supprimer","immeuble est supprimé avec succé");
        }
        else{
            abort(403);
        }



    }


    public function destroy($id){

    }
}
