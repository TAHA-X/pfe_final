<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\ResponsablesEmail;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponsableEmail;
class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::where("id","!=",auth()->user()->id)->get();
        $users = User::where("id","!=",1)->get();
        return view("responsables.afficher",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->status=="directeur"){
            return view("responsables.ajouter");
        }
        else{
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
        if(auth()->user()->status=="directeur"){
            $this->validate($request,[
                "nom"=>"required",
                "prenom"=>"required",
                "phone"=>"required|digits:10",
                "email"=>"email|unique:users",
                "password"=>"required"
            ]);
            $user = User::create([
                'nom' => $request->nom,
                'prenom'=>$request->prenom,
                'phone'=> $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if($request->file("img")){
                $file =  $request->file("img");
                $filename=Str::uuid().$file->getClientOriginalName();
                $file->move(public_path("assets/img/profile"),$filename);
                $path = '/assets/img/profile/'.$filename;
                $user->update(["img"=>$path]);
            }
            return redirect()->route("responsable.index")->with("ajouter","responsable est ajouté avec succé");
        }
        else{
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
        if(auth()->user()->status=="directeur"){
            $user = User::where("id",$id)->first();
            return view("responsables.update",compact("user"));
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
        if(auth()->user()->status=="directeur"){
            $user = User::where("id",$id);
        $this->validate($request,[
            "nom"=>"required",
            "prenom"=>"required",
            "phone"=>"required|digits:9",
            "email"=>["email",Rule::unique(User::class)->ignore($id)],
        ]);
        if($request->password!=""){
            $user->update([
                'nom' => $request->nom,
                'prenom'=>$request->prenom,
                'phone'=> $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        else{
            $user->update([
                'nom' => $request->nom,
                'prenom'=>$request->prenom,
                'phone'=> $request->phone,
                'email' => $request->email,
            ]);
        }
        if($request->file("img")){
            if($user->first()->img){
                unlink(public_path()."/".$user->first()->img);
            }
            $file =  $request->file("img");
            $filename=Str::uuid().$file->getClientOriginalName();
            $file->move(public_path("assets/img/profile"),$filename);
            $path = '/assets/img/profile/'.$filename;
            $user->update(["img"=>$path]);
        }
        return redirect()->route("responsable.index")->with("modifier","responsable est modifié avec succé");
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
        if(auth()->user()->status=="directeur"){
            $user = User::where("id",$id)->first();
            if($user->Residence){
               return redirect()->route("responsable.index")->with("warning","ce responsable est liée avec une résidence");
            }
            if($user->img!=null){
                unlink(public_path()."/".$user->img);
            }
            $user->delete();
            return redirect()->route("responsable.index")->with("supprimer","responsable est supprimé avec succé");
        }
        else{
            abort(403);
        }
    }



    public function destroy($id){

    }

    public function send_email_responsables(Request $request){
       $this->validate($request,[
        "sujet"=>"required",
        "message"=>"required"
       ]);
       $users = User::all();
       foreach($users as $user){
           Mail::to($user->email)->send(new ResponsableEmail($request));
       }
       return redirect()->route("responsable.index")->with("emailSuccess","message est envoyé avec succé");
    }
}
