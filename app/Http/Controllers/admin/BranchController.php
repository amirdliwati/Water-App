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
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\{Branch};

class BranchController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function branchfunction(Request $Request)
    {
        if (Auth::user()->id == 1) {
            if ($Request->isMethod('post')) 
            {
                Validator::make($Request->all(), [
                'code' => 'required|string|max:6|min:2',
                'name' => 'required|string|max:50|min:2',
                ])->validate();
                $newBranch = new Branch();
                $newBranch -> code = $Request->input('code');
                $newBranch -> name = $Request->input('name');
                /*if ($Request->input('active') == 'on')
                {$newBranch -> active = 1;}
                else{$newBranch -> active = 0;}*/
                $newBranch -> save();

                $branches = Branch::all();
                $arr = array('branches' => $branches);

                return redirect('/Branches')->with($arr); 
            }
            else
            {
                $branches = Branch::all();
                $arr = array('branches' => $branches);
                return view('admin/Branch',$arr);
            }
        }
        else
        {
            return view('public/404error');
        }
    }
}
