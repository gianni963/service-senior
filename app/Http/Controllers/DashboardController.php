<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\DeleteAccount;
use App\Annonces;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //profil privé d'un utilisateur
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.index',compact('user'));
    }



    public function update(Request $request, User $user)
    {
        $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
        'firstname' => 'nullable',
        'lastname' => 'nullable',
        'description' => 'nullable'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $user->password;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->description = $request->description;
        $user->save();

 
        //dd($user->description);
        return back()->withSuccess("Modification réussie");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAccountForm()
    {
        return view('dashboard.deleteaccount.mail');
    }
    public function DeleteAccount(Request $request)
    {

      
        $user = Auth::user();
        $raison = $request->raison;

        Mail::to('gianni@example.com')->queue(
            new DeleteAccount($user, $raison));

        Auth::logout();

        return redirect()->route('home');
    }
}
