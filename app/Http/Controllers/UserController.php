<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    //
    public function login(Request $request){
        $incomingfields=$request->validate([
            'loginname'=> 'required ',
            'loginpassword' => 'required'
        ]);
        if(auth()->attempt(['name'=>$incomingFields['loginname'],'password'=>$incomingfields['loginpassword']]) ){
            $request->session()->regenerate();
            }
        return redirect('/');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public  function register(Request $request){
        $incomingFields = $request->validate([
            'name'=> ['required', 'min:3', 'max:10', ],
            'email' => ['required' ,'email',],
            'password' => ['required' ,'min:8']
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        $user =User::create($incomingFields);
        auth()-> login($user);
        return redirect('/');
    }
}
