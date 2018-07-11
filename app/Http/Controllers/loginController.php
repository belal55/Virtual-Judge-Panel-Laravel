<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;

class loginController extends Controller
{
    public function index(){
    	return view('Login.index');
    }


    public function verify(Request $request){
    	$user = DB::table('users')
    		->where('email', $request->email)
    		->where('password', $request->password)
    		->first();


    	if($user != null)
    	{
            

    		if($user->user_type_id==1)
    		{
               
    			$request->session()->put('user',$user);
    			return redirect()->route('admin.index');

    		}elseif ($user->user_type_id==2) {
                $request->session()->put('user',$user);
                return redirect()->route('judge.index');
                
            }elseif ($user->user_type_id==3) {
                $request->session()->put('user',$user);
                return redirect()->route('student.index');
            }
    
    	}
    	else
    	{
    		//$request->session()->flash('username', $request->uname);
    		$request->session()->flash('message', 'Invalid username or password');
    		
    		return redirect()->route('login.index');
    	}
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.index');
       
    }
}
