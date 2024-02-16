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
        $id_form = $newForm->id;
        $newForm -> employee_signature = 'Signatures_Form3/'.$id_form.'/employee_signature_Form3.png';
        Storage::disk('local')->putFileAs('Signatures_Form3/'.$id_form.'/', $Request->image, 'employee_signature_Form3.png');
        $newForm -> save();

        $this->AddToLog('   جديد فاتورة تقرير صيانة  ' , $newForm->customer_name ,$newForm->id);

        return redirect('/ThirdForms');

    }

    public function Edit (Request $Request)
    {
        if ($Request->isMethod('post')) {
            $editForm =  Third_form::find($Request->IdForm);
            $editForm -> date = $Request->input('date');
            $editForm -> customer_name = $Request->input('customer_name');
            $editForm -> counter_number = $Request->input('counter_number');
            $editForm -> field1 = $Request->input('field1');
            $editForm -> field2 = $Request->input('field2');
            $editForm -> maintenance_time = $Request->input('maintenance_time');
            $editForm -> maintenance_type = $Request->input('maintenance_type');
            $editForm -> total = $Request->input('total');
            $editForm -> tax = $Request->input('tax');
            $editForm -> total_amount = $Request->input('total_amount');
            $editForm -> total_amount_write = $Request->input('total_amount_write');
            $editForm -> employee = $Request->input('employee');
            $editForm -> save();


            $this->AddToLog('   تعديل فاتورة تقرير صيانة  ' , $editForm->customer_name ,$editForm->id);

            return redirect('/ThirdForms');
        }

        else 
        {
            $Form = Third_form::find($Request->IdForm);
            $arr = array('Form' => $Form);
            return view('mutual/EditForm3',$arr);     
        }

    }

    public function DeleteForm(Request $request)
    {
        $DeleteForm = Third_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('    حذف فاتورة تقرير صيانة   ',$DeleteForm->employee_name , $DeleteForm->id);

        $ThirdForm = Third_form::all();
        return response()->json($ThirdForm); 
    }

    public function PreviewForm(Request $Request)
    { 
        $this->InitinalHeaderFooter($Request);
        $this->InitinalPDF($Request);
        $this->GeneralInfo($Request);
        $this->EndPDF($Request); 
    }

    ///////////////////////////////////////  All Functions For Preview Form /////////////////////////////////////////
    private $IdForm;
    private $y;

    public function InitinalHeaderFooter($Request)
    {
        // help for programming
        // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true) 
        $this->IdForm = $Request->IdForm;
        // Custom Header
        PDF::setHeaderCallback(function($pdf) 
        {
            // Content
            $Form = Third_form::find($this->IdForm);

            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

            // set QR
        /*
            $QR = Image::make(DNS2D::getBarcodePNG(config('app.myurl'), 'QRCODE'));
            $QR->resize(250, null, function ($constraint) {$constraint->aspectRatio();});
            $QR->save('output/qr'.$Form->id.'_form3.png');
        */
            $img = Image::make('templates/Form3.png');
            //////////////////////////////////// set QR And save final image ///////////////////////////////////////////
            //$img->insert('output/qr'.$Form->id.'_form3.png', 'top-left', 250, 500);
            //save Image
            $img->save('output/temp/' . $this->IdForm .'-Form3' . '.png');
            $pdf->Image(public_path('output/temp/' . $this->IdForm .'-Form3' . '.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        
            // restore auto-page-break status
            $pdf->SetAutoPageBreak(TRUE, $bMargin);
            // set the starting point for the page content
            $pdf->setPageMark();

            PDF::SetTextColor(0, 63, 127);
        });

        // Custom Footer
        PDF::setFooterCallback(function($pdf) { });
    }

    public function InitinalPDF($Request)
    {
        $Form = Third_form::find($this->IdForm);
        // set document information
        PDF::SetCreator('Frontier IBS Inc.');
        PDF::SetAuthor('Durra Management System');
        PDF::SetTitle($this->IdForm ."'s Form3");
        PDF::SetSubject('Durra');
        PDF::SetKeywords('Form3');
        // set default monospaced font
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);

        // set auto page breaks
        PDF::SetAutoPageBreak(FALSE, 0);
        //PDF::SetAutoPageBreak(FALSE, 0);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set Protection File
        //PDF::SetProtection(array('modify','copy'), 'Password', null, 0, null);
        PDF::SetProtection(array('modify','copy','assemble','extract','fill-forms','annot-forms'), '', null, 0, null);

        // ---------------------------------------------------------

        // set some language dependent data:
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';

        // set some language-dependent strings (optional)
        PDF::setLanguageArray($lg);

        // ---------------------------------------------------------

        // set font
        PDF::SetFont('aealarabiya', '', 12);

        // add a page
        PDF::AddPage('P','A4');

        // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
        // get current vertical position
        $this->y = PDF::getY();
    }

    public function GeneralInfo($Request)
    {
        $Third_form = Third_form::find($this->IdForm);

        //Number
        PDF::writeHTMLCell(40, 5, 38, 55, $Third_form->id, 0,1, 0, true, 'R', true);
        //date        
        $x = 58;
        $str = Str::substr($Third_form->date, 2);
        foreach (explode('-',$str) as $dater)
        {
            PDF::writeHTMLCell(40, 5, $x, 42.5, $dater, 0,1, 0, true, 'R', true);
            $x -= 10;
        }
        PDF::SetFont('aealarabiya', '', 10);
        //customer_name
        PDF::writeHTMLCell(125, 5, 35, 93, $Third_form->customer_name, 0,1, 0, true, 'R', true);
        //field1
        PDF::writeHTMLCell(70, 5, 35, 103, $Third_form->field1, 0,1, 0, true, 'R', true);
        //counter_number  
        if ($Third_form->counter_number != "") 
        {
            PDF::writeHTMLCell(45, 5, 118, 103, $Third_form->counter_number, 0,1, 0, true, 'R', true);
        }
        //field2
        if ($Third_form->field2 != "") 
        {
            PDF::writeHTMLCell(30, 5, 172, 103, $Third_form->field2, 0,1, 0, true, 'R', true);
        }
        //maintenance_time
        PDF::writeHTMLCell(82, 65, 9, 125, $Third_form->maintenance_time, 0,1, 0, true, 'J', true);
        //maintenance_type
        $needles = array("<br>", "&#13;", "<br/>", "\n");
        $replacement = "<br />";
        $p_long_desc = str_replace($needles, $replacement, $Third_form->maintenance_type);
        PDF::writeHTMLCell(105, 65, 95, 125, '<span>' . $p_long_desc . '</span>', 0,1, 0, true, 'J', true);
        //total
        PDF::writeHTMLCell(51, 8, 9, 192, $Third_form->total, 0,1, 0, true, 'C', true);
        //tax
        PDF::writeHTMLCell(51, 7, 9, 201, $Third_form->tax, 0,1, 0, true, 'C', true);
        //total_amount
        PDF::writeHTMLCell(51, 7, 9, 209, $Third_form->total_amount, 0,1, 0, true, 'C', true);

        //total_amount_write
        PDF::writeHTMLCell(105, 7, 95, 209, $Third_form->total_amount_write, 0,1, 0, true, 'J', true);
        PDF::SetFont('aealarabiya', '', 12);
        //employee
        PDF::writeHTMLCell(51, 7, 17, 262, $Third_form->employee, 0,1, 0, true, 'C', true);

        //employee_signature     
        if ($Third_form->employee_signature != "") 
        {
            $employee_signature = Image::make(Storage::get($Third_form->employee_signature));
            $employee_signature->resize(null, 75, function ($constraint) {
                $constraint->aspectRatio();});
            $employee_signature->save('output/temp/Signatures_Form3-' . $this->IdForm .'-employee'. '.png');
            PDF::writeHTMLCell(50, 7, 125, 262, '<img src="' . public_path('output/temp/Signatures_Form3-' . $this->IdForm .'-employee'. '.png') . '">', 0,1, 0, true, 'C', true);        
        }


    }

    public function EndPDF($Request)
    {
        $Form = Third_form::find($this->IdForm);

        // reset pointer to the last page
        PDF::lastPage();

        // ---------------------------------------------------------

        // Delete QR & Backround
        Storage::disk('public_uploads')->delete('/temp/'. $this->IdForm .'-Form3' . '.png');

        // Delete employee_signature 
        Storage::disk('public_uploads')->delete('/temp/Signatures_Form3-'. $this->IdForm .'-employee' . '.png');

        //Close and output PDF document
        PDF::Output('Form3-'. $Form->id . '.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

}