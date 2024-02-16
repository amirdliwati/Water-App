<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\{Users_profile,Branch};

class RegisterUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register(Request $Request)
    {
		if (Auth::user()->id == 1)
		 {
            $branchs = Branch::all();
            $arr = array('branchs' => $branchs);
			return view('auth/register',$arr);
		 }
        else{return view('public/404error');} 
    }


    public function create(Request $Request)
    {
		if ($Request->isMethod('post')) 
    	{
    		if (Auth::user()->id == 1) {
        		Validator::make($Request->all(), [
    			'name' => 'required|alpha|max:25|min:2|unique:users',
    			'password' => 'required|string|min:8|confirmed',
                'email' => 'required|string|email|unique:users|max:50',
                'first_name' => 'required|string|max:25|min:2',
                'last_name' => 'required|string|max:25|min:2',
                'phone_number' => 'required',
                'branch' => 'required',
            	])->validate();
            	$arr = User::create([
                'name' => $Request['name'],
                'email' => $Request['email'],
    			'password' => Hash::make($Request['password']),
    			'status' => "Activate",
            	]);

            	$newprofile = new Users_profile();
            	$newprofile -> first_name = $Request->input('first_name');
            	$newprofile -> last_name = $Request->input('last_name');
            	$newprofile -> mobile = $Request->input('phone_number');
                $newprofile -> branch_id = $Request->input('branch');
    			$newprofile -> type_user = 'user';
            	$newprofile -> users_id = $arr->id;
            	$newprofile -> save();
    		}

        return redirect('/ViewUsers'); 

		}
			else{return view('public/404error');} 
			
		}
    	
}
