<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Http\Requests\UserRequest;

class registrationController extends Controller
{
     public function index(){
    	return view('registration.index');
    }

    public function insert(UserRequest $request){
    	$user = new user();
    	$user->name=$request->name;
    	$user->email=$request->email;
    	$user->password=$request->password;
    	$user->gender=$request->gender;
    	$user->user_type_id=3;
    	$user->save();
        $request->session()->flash('message', 'Registraion successful!!');
    	return redirect()->route('login.index');

    }
}
