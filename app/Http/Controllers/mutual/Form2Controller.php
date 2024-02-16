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
use App\Models\{Second_form,First_form,General_informatione,Inspector,Template_second_form};

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
        $this->middleware('auth')->except('PreviewForm'); 
    }

    public function index(Request $Request)
    {
        if (Auth::user()->id == 1) {
        	$Forms = Second_form::all();
        	$arr = array('Forms' => $Forms);
            return view('mutual/ViewSecondForm',$arr);
        } else {
            $Inspectors = Inspector::all();
            $Forms = Second_form::where('user_id', Auth::user()->id)->get();
            $arr = array('Forms' => $Forms);
            return view('mutual/ViewSecondForm',$arr);
        }
    }

    public function ViewForm(Request $Request)
    {

        if (Auth::user()->id == 1) {
            $Inspectors = Inspector::all();
            $Forms = First_form::all();
            $arr = array('Forms' => $Forms, 'Inspectors' => $Inspectors);
            return view('mutual/AddForm2',$arr);
        } else {
            $Inspectors = Inspector::all();
            $Forms = First_form::where('user_id', Auth::user()->id)->get();
            $arr = array('Forms' => $Forms, 'Inspectors' => $Inspectors);
            return view('mutual/AddForm2',$arr);
        }

    }

    public function GetCustomerDetails(Request $Request)
    {
        $CustomerDetails = General_informatione::find($Request->customer_id);
        return response()->json($CustomerDetails);
    }

    public function GetInspectorDetails(Request $Request)
    {
        $InspectorDetails = Inspector::where('name',$Request->inspector_name)->first();
        return response()->json($InspectorDetails);
    }

    public function AddForm(Request $Request)
    {
        $nameCustomer = General_informatione::find($Request->input('name_customer'));
        $newForm = new Second_form();
        $newForm -> name_inspector = $Request->input('name_inspector');
        $newForm -> code_inspector = $Request->input('code_inspector');
        $newForm -> name_customer = $nameCustomer->name;
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
        $id_form = $newForm->id;
        $newForm -> employee_signature = 'Signatures_Form2/'.$id_form.'/employee_signature_Form2.png';
        Storage::disk('local')->putFileAs('Signatures_Form2/'.$id_form.'/', $Request->image, 'employee_signature_Form2.png');
        $newForm -> save();

        $this->AddToLog('  جديد معلومات زيارة تدقيق المياه  ' , $newForm->name_inspector ,$newForm->id);

        return redirect('/SecondForms');

    }

    public function Edit (Request $Request)
    {
        if ($Request->isMethod('post')) {
            $editForm =  Second_form::find($Request->IdForm);
            $editForm -> name_inspector = $Request->input('name_inspector');
            $editForm -> code_inspector = $Request->input('code_inspector');
            $editForm -> name_customer = $Request->input('name_customer');
            $editForm -> address_customer = $Request->input('address_customer');
            $editForm -> account_number = $Request->input('account_number');
            $editForm -> counter_number = $Request->input('counter_number');
            $editForm -> date = $Request->input('date');
            $editForm -> start_time = $Request->input('start_time');
            $editForm -> end_time = $Request->input('end_time');
            $editForm -> check1 = $Request->input('check1');
            $editForm -> check2 = $Request->input('check2');
            $editForm -> save();


            $this->AddToLog('  تعديل  معلومات زيارة تدقيق المياه  ' , $editForm->name_inspector ,$editForm->id);

            return redirect('/SecondForms');
        }

        else 
        {

            $Form = Second_form::find($Request->IdForm);
            $arr = array('Form' => $Form);
            return view('mutual/EditForm2',$arr);
        }

    }

    public function DeleteForm(Request $request)
    {
        $DeleteForm = Second_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('    حذف معلومات زيارة تدقيق المياه   ',$DeleteForm->employee_name , $DeleteForm->id);

        $SecondForm = Second_form::all();
        return response()->json($SecondForm); 
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
            $Form = Second_form::find($this->IdForm);

            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

            // set QR
            $QR = Image::make(DNS2D::getBarcodePNG(config('app.myurl') . 'Previwform2/' . $Form->id, 'QRCODE'));
            $QR->resize(250, null, function ($constraint) {$constraint->aspectRatio();});
            $QR->save('output/qr'.$Form->id.'_form2.png');
            $img = Image::make('templates/Form2.png');
            //////////////////////////////////// set QR And save final image ///////////////////////////////////////////
            $img->insert('output/qr'.$Form->id.'_form2.png', 'top-right', 160, 330);
            //save Image
            $img->save('output/temp/' . $this->IdForm .'-Form2' . '.png');
            $pdf->Image(public_path('output/temp/' . $this->IdForm .'-Form2' . '.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        
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
        $Form = Second_form::find($this->IdForm);
        // set document information
        PDF::SetCreator('Frontier IBS Inc.');
        PDF::SetAuthor('Durra Management System');
        PDF::SetTitle($this->IdForm ."'s Form2");
        PDF::SetSubject('Durra');
        PDF::SetKeywords('Form2');
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
        PDF::SetFont('dejavusans', '', 9);

        // add a page
        PDF::AddPage('P','A4');

        // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
        // get current vertical position
        $this->y = PDF::getY();
    }

    public function GeneralInfo($Request)
    {
        $Second_form = Second_form::find($this->IdForm);
        PDF::SetFont('aealarabiya', '', 10);
        //name_inspector
        PDF::writeHTMLCell(142, 5, 52, 89, $Second_form->name_inspector, 0,1, 0, true, 'R', true);
        //name_customer
        PDF::writeHTMLCell(142, 5, 52, 125, $Second_form->name_customer, 0,1, 0, true, 'R', true);
        //address_customer  
        PDF::writeHTMLCell(142, 5, 52, 132, $Second_form->address_customer, 0,1, 0, true, 'R', true);

        PDF::SetFont('dejavusans', '', 9);
        //Number
        PDF::writeHTMLCell(20, 10, 165, 46, '<b>' . $Second_form->id . '</b>', 0,1, 0, true, 'C', true);
        //code_inspector
        PDF::writeHTMLCell(142, 5, 52, 97, $Second_form->code_inspector, 0,1, 0, true, 'R', true);       
        //account_number
        PDF::writeHTMLCell(142, 5, 52, 144, $Second_form->account_number, 0,1, 0, true, 'R', true);
        //counter_number
        PDF::writeHTMLCell(142, 5, 143, 144, $Second_form->counter_number, 0,1, 0, true, 'R', true);
        //date
        PDF::writeHTMLCell(142, 5, 52, 156, $Second_form->date, 0,1, 0, true, 'R', true);
        //start_time
        PDF::writeHTMLCell(142, 5, 143, 156, $Second_form->start_time, 0,1, 0, true, 'R', true);
        //end_time
        PDF::writeHTMLCell(142, 5, 143, 163, $Second_form->end_time, 0,1, 0, true, 'R', true);
        
        //check1
        if ($Second_form->check1 == 1) 
        {
            PDF::writeHTMLCell(10, 10, 61, 162, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'C', true);                        
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 77, 162, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'C', true);                                 
        }

        //check2
        if ($Second_form->check2 == 1) 
        {
            PDF::writeHTMLCell(10, 10, 61, 170, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'C', true);                        
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 77, 170, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'C', true);                                 
        }

        //employee_signature     
        if ($Second_form->employee_signature != "") 
        {
            $employee_signature = Image::make(Storage::get($Second_form->employee_signature));
            $employee_signature->resize(null, 75, function ($constraint) {
                $constraint->aspectRatio();});
            $employee_signature->save('output/temp/Signatures_Form2-' . $this->IdForm .'-employee'. '.png');
            PDF::writeHTMLCell(50, 5, 130, 255, '<img src="' . public_path('output/temp/Signatures_Form2-' . $this->IdForm .'-employee'. '.png') . '">', 0,1, 0, true, 'C', true);        
        }

    }

    public function EndPDF($Request)
    {
        $Form = Second_form::find($this->IdForm);

        // reset pointer to the last page
        PDF::lastPage();

        // ---------------------------------------------------------

        // Delete QR & Backround
        Storage::disk('public_uploads')->delete('/temp/'. $this->IdForm .'-Form2' . '.png');

        // Delete employee_signature 
        Storage::disk('public_uploads')->delete('/temp/Signatures_Form2-'. $this->IdForm .'-employee' . '.png');

        //Close and output PDF document
        PDF::Output('Form2-'. $Form->id . '.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

}