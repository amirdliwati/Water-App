<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\{Log};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function AddToLog($title,$operating_code,$operating_name)
    {
        $addlog = new Log();
        $addlog -> title = $title;
        $addlog -> operating_name = $operating_name;
        $addlog -> operating_code = $operating_code;
        $addlog -> user_id = Auth::user()->id;
        $addlog -> save();
    }


    public function index(Request $Request)
    {
        $users_id = Auth::user()->id;

        if ($Request->isMethod('post'))
        {
            if ( $users_id == 1 ) {
                return view('admin/HomeAdmin');
            }
            else{return view('users/HomeUser');}
        }

        else
        {
            
            if ( $users_id == 1 ) {
                return view('admin/HomeAdmin');
            }
            else{return view('users/HomeUser');}
        }
    }
}
