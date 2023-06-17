<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appartement;
use App\Models\Residence;
use App\Models\Projet;
use App\Models\rendezVous;

class StatistiquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function comparaisons(){
        $appartements = Appartement::all();
        $appartements_vendu = Appartement::where("status","vendu")->get();
        $appartements_pas_vendu = Appartement::where("status","pasVendu")->get();
        $appartements_en_cours = Appartement::where("status","enCours")->get();
        return view("statistiques.comparaisons",compact("appartements","appartements_vendu","appartements_pas_vendu","appartements_en_cours"));
     }
    //  public function residences(){
    //     $appartements = Appartement::all();
    //     $residences = Residence::all();
    //     $residences_list = array();
    //     foreach($residences as $r){
    //         $immeubles = $r->immeuble;
    //         foreach($immeubles as $i){
    //              $appartements = $i->appartement;
    //              $appartements_vendu = $appartements->where("status","vendu");
    //              array_push($residences_list,["label"=>$r->title,"y"=>count($appartements_vendu)]);
    //         }
    //     }
    //     return view("statistiques.residences",compact("residences_list"));
    //  }
     public function projets(){
        $appartements = Appartement::all();
        $projets_list = array();
        $projets = Projet::all();
        foreach($projets as $p){
            $residences = $p->residence;
            foreach($residences as $r){
                $immeubles = $r->immeuble;
                foreach($immeubles as $i){
                     $appartements = $i->appartement;
                     $appartements_vendu = $appartements->where("status","vendu");
                     array_push($projets_list,["label"=>$p->title,"y"=>count($appartements_vendu)]);
                }
            }
        }
        return view("statistiques.projets",compact("projets_list"));
     }
     public function index()
    {
        if(auth()->user()->status=="directeur"){
            $comparaisons = $this->comparaisons()->render();
            $appartements = Appartement::all();
            // residences
            $residences = Residence::all();
            $residences_list = array();
            foreach($residences as $r){
                $immeubles = $r->immeuble;
                foreach($immeubles as $i){
                     $appartements = $i->appartement;
                     $appartements_vendu = $appartements->where("status","vendu");
                     $appartements_pas_vendu = $appartements->where("status","pasVendu");
                     $appartements_en_cours = $appartements->where("status","enCours");
                     array_push($residences_list,["label"=>$r->title,"y"=>count($appartements_vendu),"all_appartements"=>count($appartements),"appartements_pas_vendu"=>count($appartements_pas_vendu),"appartements_en_cours"=>count($appartements_en_cours)]);
                }
            }
            // residences pour afficher les rendez-vous
            $residences_rendez_vous = Residence::all();
            $residences_rendez_vous_statistiques = [];
            $rendez_vous_en_cours = count(rendezVous::where("status",1)->get());
            $rendez_vous_reportes = count(rendezVous::where("status",2)->get());
            $rendez_vous_realises = count(rendezVous::where("status",3)->get());
            array_push($residences_rendez_vous_statistiques,(object)["y"=>$rendez_vous_en_cours,"label"=>"en cours"]);
            array_push($residences_rendez_vous_statistiques,(object)["y"=>$rendez_vous_reportes,"label"=>"reportés"]);
            array_push($residences_rendez_vous_statistiques,(object)["y"=>$rendez_vous_realises,"label"=>"realisés"]);
            // projets
            $projets_list = array();
            $projets = Projet::all();
            foreach($projets as $p){
                $residences = $p->residence;
                foreach($residences as $r){
                    $immeubles = $r->immeuble;
                    foreach($immeubles as $i){
                         $appartements = $i->appartement;
                         $appartements_vendu = $appartements->where("status","vendu");
                         array_push($projets_list,["label"=>$p->title,"y"=>count($appartements_vendu)]);
                    }
                }
            }
           
            return view("statistiques.index",compact("comparaisons","projets_list","residences_list","residences_rendez_vous","residences_rendez_vous_statistiques"));
        }else{
            return redirect()->route("projets.index");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
