<?php

namespace App\Http\Controllers;

use App\Models\Appartement;
use Illuminate\Http\Request;

class AppartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appartements = Appartement::where("immeuble_id",$id)->get()->toArray();
        $tage0 = array_splice($appartements,0,4);

        $tage1 = array_splice($appartements,0,4);

        $tage2 = array_splice($appartements,0,4);

        $tage3 = array_splice($appartements,0,4);

        $tage4 = array_splice($appartements,0,4);

        return view("appartements.afficher",compact("tage0","tage1","tage2","tage3","tage4"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function edit(Appartement $appartement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appartement $appartement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appartement $appartement)
    {
        //
    }
    public function enCours($id){
        $app = Appartement::where("id",$id);
        $app->update([
            "status"=>"enCours"
        ]);
        return redirect()->back();
    }

    public function pasVendu($id){
        $app = Appartement::where("id",$id);
        $app->update([
            "status"=>"pasVendu"
        ]);
        return redirect()->back();
    }
}
