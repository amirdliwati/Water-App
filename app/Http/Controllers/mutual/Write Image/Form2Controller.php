<?php

namespace App\Http\Controllers\mutual;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\{Second_form,Template_second_form};

use Storage;
use Image;
use PDF;
use File;
use DNS2D;
use Johntaa\Arabic\I18N_Arabic;

class Form2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index(Request $Request)
    {
        if (Auth::user()->id == 1) {
        	$Forms = Second_form::all();
        	$arr = array('Forms' => $Forms);
            return view('mutual/ViewSecondForm',$arr);
        } else {
            $Forms = Second_form::where('user_id', Auth::user()->id)->get();
            $arr = array('Forms' => $Forms);
            return view('mutual/ViewSecondForm',$arr);
        }
    }

    public function ViewForm(Request $Request)
    {

        return view('mutual/AddForm2');

    }

    public function AddForm(Request $Request)
    {
        $newForm = new Second_form();
        $newForm -> name_inspector = $Request->input('name_inspector');
        $newForm -> code_inspector = $Request->input('code_inspector');
        $newForm -> name_customer = $Request->input('name_customer');
        $newForm -> address_customer = $Request->input('address_customer');
        $newForm -> account_number = $Request->input('account_number');
        $newForm -> counter_number = $Request->input('counter_number');
        $newForm -> date = $Request->input('date');
        $newForm -> start_time = $Request->input('start_time');
        $newForm -> end_time = $Request->input('end_time');
        $newForm -> check1 = $Request->input('check1');
        $newForm -> check2 = $Request->input('check2');
        $newForm -> user_id = Auth::user()->id;
        $newForm -> save();

        $this->AddToLog('  جديد معلومات زيارة تدقيق المياه  ' , $newForm->name_inspector ,$newForm->id);

        return redirect('/SecondForms');

    }

    public function DeleteForm(Request $request)
    {
        $DeleteForm = Second_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('    حذف معلومات زيارة تدقيق المياه   ',$DeleteForm->employee_name , $DeleteForm->id);

        $SecondForm = Second_form::all();
        return response()->json($SecondForm); 
    }

    public function PreviewForm(Request $Request, $IdForm)
    { 
        $this->WriteImage($IdForm);

        PDF::SetTitle("Form2 Export");
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);
        PDF::SetAutoPageBreak(false, 0);
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
        PDF::AddPage('P','A4');

        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

        PDF::Image(public_path('output/'. $IdForm .'_form2.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
          PDF::Output('Form2-'.$IdForm.'.pdf', 'I'); 
        Storage::disk('public_uploads')->delete($IdForm .'_form2.png');
        Storage::disk('public_uploads')->delete('qr'.$IdForm .'_form2.png');
 
    }

    private $siz;
    private $align;
    public function WriteImage($IdForm)
    {
        
        $Form = Second_form::find($IdForm);

        // set QR
        $QR = Image::make(DNS2D::getBarcodePNG(config('app.myurl'), 'QRCODE'));
        $QR->resize(275, null, function ($constraint) {$constraint->aspectRatio();});
        $QR->save('output/qr'.$Form->id.'_form2.png');

        $img = Image::make('templates/'. 'Form2' .'.png');

        $PrintForm = Template_second_form::find(1);
        $Arabic = new I18N_Arabic('Glyphs');

        //Number
        $this->siz=$PrintForm->number_s;
        $img->text($Form->id, $PrintForm->number_x, $PrintForm->number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#ee0707');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //name_inspector
        $this->siz=$PrintForm->name_inspector_s;
        $img->text($Arabic->utf8Glyphs($Form->name_inspector), $PrintForm->name_inspector_x, $PrintForm->name_inspector_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //code_inspector
        $this->siz=$PrintForm->code_inspector_s;
        $img->text($Form->code_inspector, $PrintForm->code_inspector_x, $PrintForm->code_inspector_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //name_customer
        $this->siz=$PrintForm->name_customer_s;
        $img->text($Arabic->utf8Glyphs($Form->name_customer), $PrintForm->name_customer_x, $PrintForm->name_customer_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //address_customer  
        $this->siz=$PrintForm->address_customer_s;
        $img->text($Arabic->utf8Glyphs($Form->address_customer), $PrintForm->address_customer_x, $PrintForm->address_customer_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //account_number
        $this->siz=$PrintForm->account_number_s;
        $img->text($Form->account_number, $PrintForm->account_number_x, $PrintForm->account_number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('center');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //counter_number
        $this->siz=$PrintForm->name_inspector_s;
        $img->text($Form->counter_number, $PrintForm->counter_number_x, $PrintForm->counter_number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('center');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //date
        $this->siz=$PrintForm->date_s;
        $img->text($Form->date, $PrintForm->date_x, $PrintForm->date_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //start_time
        $this->siz=$PrintForm->start_time_s;
        $img->text($Form->start_time, $PrintForm->start_time_x, $PrintForm->start_time_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //end_time
        $this->siz=$PrintForm->end_time_s;
        $img->text($Form->end_time, $PrintForm->end_time_x, $PrintForm->end_time_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });
        
        //check1
        $this->siz=$PrintForm->check1_s;
        if ($Form->check1 == 1) {

            $img->text('*', $PrintForm->check1_x, $PrintForm->check1_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }
        else{

            $img->text('*', 1485, 1975, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });         
        }

        //check2
        $this->siz=$PrintForm->check2_s;
        if ($Form->check2 == 1) {

            $img->text('*', $PrintForm->check2_x, $PrintForm->check2_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }
        else{

            $img->text('*', 1485, 2063, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });         
        }


//////////////////////////////////// set QR And save final image ///////////////////////////////////////////

        $img->insert('output/qr'.$Form->id.'_form2.png', 'bottom-right', $PrintForm->qr_x, $PrintForm->qr_y);
        $img->save('output/'. $Form->id . '_form2' .'.png');

    }

}