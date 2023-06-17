<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {

        // $validation = $this->validate($request,[
        //     "email"=>"required|email",
        //     "password"=>"required"
        //  ]);


            $user = auth()->user();
            return view('layouts.app',compact("user"));

     

    }

    public function deleteImg(){
        $user = auth()->user();
        if($user->img){
            unlink(public_path().$user->img);
        }
        $user->update(["img"=>null]);
        return view('layouts.app',compact("user"))->with("deleteImg","image est supprimé avec succé");
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $this->validate($request,[
            "nom"=>"required",
            "prenom"=>"required",
            "phone"=>"required|digits:9",
            "email"=>["email",Rule::unique(User::class)->ignore($user->id)],
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
        if($request->img){
            if($user->img){
                unlink(public_path()."/".$user->img);
            }
            $file =  $request->file("img");
            $filename=Str::uuid().$file->getClientOriginalName();
            $file->move(public_path("assets/img/profile"),$filename);
            $path = '/assets/img/profile/'.$filename;
            $user->update(["img"=>$path]);
        }
        Auth::logout();
        return redirect("/");
        // $request->user()->fill($request->validated());
        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }
        // $request->user()->save();
        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function check_form(){
          return view("profile.check_form");
    }
}
