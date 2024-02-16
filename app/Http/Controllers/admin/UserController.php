<?php

namespace App\Http\Controllers\admin;

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
use App\Models\{Users_profile,Log,Branch};


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function View(Request $Request)
    {
		if (Auth::user()->id == 1) 
            {    
                $users = User::where('id','>',1)->orderBy('id', 'desc')->get();
                $arr = array('users' => $users);
                return view('admin/ViewUsers',$arr);
            }

        else{return view('public/404error');} 
    	
    }

    public function StatusUser(Request $Request)
    {
        if (Auth::user()->id == 1) 
            {
                $StatusUser = User::find($Request->id_user);

                if ($StatusUser->status == 1) {
                    $StatusUser -> status = 0;
                    $StatusUser -> password = Hash::make('asdhhhhfkdhfhjkdfyyyhdfjhkhdfhdjfhdkhfjdfhk');
                    $StatusUser -> save(); 
                } else{
                    $StatusUser -> status = 1;
                    $StatusUser -> password = Hash::make($StatusUser->email);
                    $StatusUser -> save();  
                }

                $Users = User::all();
                return response()->json($Users);     
            }

        else{return view('public/404');} 

        
    }

    public function Edit(Request $Request)
    {
        if ($Request->isMethod('post')) {
            if (Auth::user()->id == 1) 
            {
                Validator::make($Request->all(), [
                'name' => 'required|alpha|max:25|min:2',
                ])->validate();

                $EditUser = User::find($Request->idUser);
                $EditUser -> name = $Request->input('name');
                $EditUser -> email = $Request->input('email');
                $EditUser -> password = Hash::make($Request->input('password'));
                $EditUser -> save();

                $EditUserP = Users_profile::where('users_id',$Request->idUser)->first();
                $EditUserP -> first_name = $Request->input('first_name');
                $EditUserP -> last_name = $Request->input('last_name');
                $EditUserP -> mobile = $Request->input('phone_number');
                $EditUserP -> branch_id = $Request->input('branch');
                $EditUserP -> save();  

                return redirect('/ViewUsers');     
            }

            else{return view('public/404');}
        } else {
            if (Auth::user()->id == 1) 
            {
                $branchs = Branch::all();
                $User = User::find($Request->idUser);
                $arr = array('User' => $User, 'branchs' => $branchs);
                return view('admin/ViewUser',$arr);     
            }

            else{return view('public/404');}
        }

        
    }

    public function DeleteUser(Request $Request)
    {
        if (Auth::user()->id == 1) 
            {
                $DeleteUser = User::find($Request->id_user);
                $DeleteUser -> delete();

                $this->AddToLog('  حذف مستخدم  ',$DeleteUser->name , $DeleteUser->id);

                $Users = User::all();
                return response()->json($Users);     
            }

        else{return view('public/404error');} 

        
    }

    public function ViewLogs(Request $Request)
    {
		if (Auth::user()->id == 1) 
            {    
                $logs = Log::all();
                $arr = array('logs' => $logs);
                return view('admin/LogUser',$arr);
            }

        else{return view('public/404error');} 
    }


}
