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
use App\Models\{Third_form,Template_third_form};

use Storage;
use Image;
use PDF;
use File;
use DNS2D;
use Johntaa\Arabic\I18N_Arabic;

class Form3Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index(Request $Request)
    {
        if (Auth::user()->id == 1) {
        	$Forms = Third_form::all();
        	$arr = array('Forms' => $Forms);
            return view('mutual/ViewThirdForm',$arr);
        } else {
            $Forms = Third_form::where('user_id', Auth::user()->id)->get();
            $arr = array('Forms' => $Forms);
            return view('mutual/ViewThirdForm',$arr);
        }
    }

    public function ViewForm(Request $Request)
    {

        return view('mutual/AddForm3');

    }

    public function AddForm(Request $Request)
    {
        $newForm = new Third_form();
        $newForm -> date = $Request->input('date');
        $newForm -> customer_name = $Request->input('customer_name');
        $newForm -> counter_number = $Request->input('counter_number');
        $newForm -> field1 = $Request->input('field1');
        $newForm -> field2 = $Request->input('field2');
        $newForm -> maintenance_time = $Request->input('maintenance_time');
        $newForm -> maintenance_type = $Request->input('maintenance_type');
        $newForm -> total = $Request->input('total');
        $newForm -> tax = $Request->input('tax');
        $newForm -> total_amount = $Request->input('total_amount');
        $newForm -> total_amount_write = $Request->input('total_amount_write');
        $newForm -> employee = $Request->input('employee');
        $newForm -> user_id = Auth::user()->id;
        $newForm -> save();

        $this->AddToLog('   جديد فاتورة تقرير صيانة  ' , $newForm->customer_name ,$newForm->id);

        return redirect('/ThirdForms');

    }

    public function DeleteForm(Request $request)
    {
        $DeleteForm = Third_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('    حذف فاتورة تقرير صيانة   ',$DeleteForm->employee_name , $DeleteForm->id);

        $ThirdForm = Third_form::all();
        return response()->json($ThirdForm); 
    }

    public function PreviewForm(Request $Request, $IdForm)
    { 
        $this->WriteImage($IdForm);

        PDF::SetTitle("Form3 Export");
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);
        PDF::SetAutoPageBreak(false, 0);
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
        PDF::AddPage('P','A4');

        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

        PDF::Image(public_path('output/'. $IdForm .'_form3.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        PDF::Output('Form3-'.$IdForm.'.pdf', 'I');  
        Storage::disk('public_uploads')->delete($IdForm .'_form3.png');
        Storage::disk('public_uploads')->delete('qr'.$IdForm .'_form3.png');
 
    }

    private $siz;
    private $align;
    public function WriteImage($IdForm)
    {
        
        $Form = Third_Form::find($IdForm);

        // set QR
        $QR = Image::make(DNS2D::getBarcodePNG(config('app.myurl'), 'QRCODE'));
        $QR->resize(80, null, function ($constraint) {$constraint->aspectRatio();});
        $QR->save('output/qr'.$Form->id.'_form3.png');

        $img = Image::make('templates/'. 'Form3' .'.png');

        $PrintForm = Template_third_form::find(1);
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

        //customer_name
        $this->siz=$PrintForm->customer_name_s;
        $img->text($Arabic->utf8Glyphs($Form->customer_name), $PrintForm->customer_name_x, $PrintForm->customer_name_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //counter_number
        $this->siz=$PrintForm->counter_number_s;
        $img->text($Form->counter_number, $PrintForm->counter_number_x, $PrintForm->counter_number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //field1  
        $this->siz=$PrintForm->field1_s;
        if ($Form->field1 != "") {
            $img->text($Arabic->utf8Glyphs($Form->field1), $PrintForm->field1_x, $PrintForm->field1_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //field2
        $this->siz=$PrintForm->field2_s;
        if ($Form->field2 != "") {
            $img->text($Arabic->utf8Glyphs($Form->field2), $PrintForm->field2_x, $PrintForm->field2_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //maintenance_time
        $this->siz=$PrintForm->maintenance_time_s;
        $img->text($Arabic->utf8Glyphs($Form->maintenance_time), $PrintForm->maintenance_time_x, $PrintForm->maintenance_time_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('top');  
            $font->angle(0);  
        });

        //maintenance_type
        $this->siz=$PrintForm->maintenance_type_s;
        $img->text($Arabic->utf8Glyphs($Form->maintenance_type), $PrintForm->maintenance_type_x, $PrintForm->maintenance_type_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('top');  
            $font->angle(0);  
        });

        //total
        $this->siz=$PrintForm->total_s;
        $img->text($Form->total, $PrintForm->total_x, $PrintForm->total_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //tax
        $this->siz=$PrintForm->tax_s;
        $img->text($Form->tax, $PrintForm->tax_x, $PrintForm->tax_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //total_amount
        $this->siz=$PrintForm->total_amount_s;
        $img->text($Form->total_amount, $PrintForm->total_amount_x, $PrintForm->total_amount_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //total_amount_write
        $this->siz=$PrintForm->total_amount_write_s;
        $img->text($Arabic->utf8Glyphs($Form->total_amount_write), $PrintForm->total_amount_write_x, $PrintForm->total_amount_write_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //employee
        $this->siz=$PrintForm->employee_s;
        $img->text($Arabic->utf8Glyphs($Form->employee), $PrintForm->employee_x, $PrintForm->employee_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');   
            $font->valign('bottom');  
            $font->angle(0);  
        });
        

//////////////////////////////////// set QR And save final image ///////////////////////////////////////////

        $img->insert('output/qr'.$Form->id.'_form3.png', 'bottom-right', $PrintForm->qr_x, $PrintForm->qr_y);
        $img->save('output/'. $Form->id . '_form3' .'.png');

    }

}