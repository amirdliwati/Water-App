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
use App\Models\{Inspector};

class InspectorController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function inspectorfunction(Request $Request)
    {
        if (Auth::user()->id == 1) {
            if ($Request->isMethod('post')) 
            {
                Validator::make($Request->all(), [
                'code' => 'required|string',
                'name' => 'required|string',
                ])->validate();
                $newInspector = new Inspector();
                $newInspector -> code = $Request->input('code');
                $newInspector -> name = $Request->input('name');
                $newInspector -> save();

                $Inspectors = Inspector::all();
                $arr = array('Inspectors' => $Inspectors);

                return redirect('/Inspectors')->with($arr); 
            }
            else
            {
                $Inspectors = Inspector::all();
                $arr = array('Inspectors' => $Inspectors);
                return view('admin/Inspectors',$arr);
            }
        }
        else
        {
            return view('public/404error');
        }
    }
}
