<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;
use App\Http\Requests\UserRequest;
use App\Http\Requests\changePasswordRequest;
use App\project;

class AdminController extends Controller
{
    public function index(Request $request){
        $TotalStudent = user::where(['user_type_id' => 3])->count();
        $request->session()->put('TotalStudent',$TotalStudent);

        $TotalJudge = user::where(['user_type_id' => 2])->count();
        $request->session()->put('TotalJudge',$TotalJudge);

        $TotalProject = project::count();
        $request->session()->put('TotalProject',$TotalProject);

    	return view('admin.index');
    }

    public function profile(){
    	return view('admin.profile');
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
		    	return redirect()->route('admin.profile');
    		}else{
    			$request->session()->flash('message', 'Invalid image!!');
		    	return redirect()->route('admin.profile');
    		}
    	}else{
    		$user = user::find($request->id);
	    	$user->name=$request->name;
	    	$user->email=$request->email;
	    	$user->save();

	    	$request->session()->forget('user');
		    $request->session()->put('user',$user);
	        $request->session()->flash('message', 'Profile updated successfully!!');
	    	return redirect()->route('admin.profile');
    	}

    	

    }

    public function settings(){
        return view('admin.settings');
    }

    public function changePassword(changePasswordRequest $request){

        $user = user::find($request->id);
        $user->password=$request->password;
        $user->save();

        $request->session()->forget('user');
        $request->session()->put('user',$user);
        $request->session()->flash('message', 'Password changed successfully!!');
        return redirect()->route('admin.settings');
    }

    public function showAlluser(Request $request){

        $users = DB::table('user_types')
            ->join('users', 'users.user_type_id', '=', 'user_types.id')
            ->where('user_type_id','>',1)
            ->get();
        $request->session()->put('users',$users);
        return view('admin.showAlluser');
    }


    public function searchUserByTypeId(Request $request){

        if($request->userTypeId!=null){
            $users = DB::table('user_types')
                ->join('users', 'users.user_type_id', '=', 'user_types.id')
                ->where('user_type_id','=',$request->userTypeId)
                ->get();
            $request->session()->put('users',$users);
            return view('admin.showAlluser');
        }else{
            $users = DB::table('user_types')
                ->join('users', 'users.user_type_id', '=', 'user_types.id')
                ->where('user_type_id','>',1)
                ->get();
            $request->session()->put('users',$users);
            return view('admin.showAlluser');
        }

        
    }

    public function destroyUser(Request $request)
    {
        
        user::destroy($request->id);
        $request->session()->flash('message', 'User Deleted Successfully!!');
        return redirect()->back();
    }


    public function addJudge(){
        return view('admin.addJudge');
    }

    public function insertJudge(UserRequest $request){
        $user = new user();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->gender=$request->gender;
        $user->user_type_id=2;
        $user->save();
        $request->session()->flash('message', 'Judge Added successful!!');
        return redirect()->back();

    }

    

    
}
