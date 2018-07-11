<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;
use App\Http\Requests\UserRequest;
use App\Http\Requests\changePasswordRequest;

class JudgeController extends Controller
{
    public function index(){
    	return view('judge.index');
    }

    public function profile(){
    	return view('judge.profile');
    }

    public function updateProfile(Request $request){

    	if($request->hasFile('photo')){
    		date_default_timezone_set('Asia/Dhaka');
    		$file=$request->file('photo');
    		$filename=date('YmdHis').$file->getClientOriginalName();

    		if($file->getMimeType()=='image/jpeg'){
    			$file->move('userProfilePhoto',$filename);

    			$user = user::find($request->id);
		    	$user->name=$request->name;
		    	$user->email=$request->email;
		    	$user->img_path=$filename;
		    	$user->save();

		    	$request->session()->forget('user');
		    	$request->session()->put('user',$user);
		        $request->session()->flash('message', 'Profile updated successfully!!');
		    	return redirect()->route('judge.profile');
    		}else{
    			$request->session()->flash('message', 'Invalid image!!');
		    	return redirect()->route('judge.profile');
    		}
    	}else{
    		$user = user::find($request->id);
	    	$user->name=$request->name;
	    	$user->email=$request->email;
	    	$user->save();

	    	$request->session()->forget('user');
		    $request->session()->put('user',$user);
	        $request->session()->flash('message', 'Profile updated successfully!!');
	    	return redirect()->route('judge.profile');
    	}

    	

    }


    public function settings(){
        return view('judge.settings');
    }

    public function changePassword(changePasswordRequest $request){

        $user = user::find($request->id);
        $user->password=$request->password;
        $user->save();

        $request->session()->forget('user');
        $request->session()->put('user',$user);
        $request->session()->flash('message', 'Password changed successfully!!');
        return redirect()->route('judge.settings');
    }
}
