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
use App\Models\{Fourth_form,Fourth_forms_detail};

use Storage;
use Image;
use PDF;
use File;
use DNS2D;
use Johntaa\Arabic\I18N_Arabic;

class Form4Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index(Request $Request)
    {
        if (Auth::user()->id == 1) {
        	$Forms = Fourth_form::all();
        	$arr = array('Forms' => $Forms);
            return view('mutual/ViewFourthForm',$arr);
        } else {
            $Forms = Fourth_form::where('user_id', Auth::user()->id)->get();
            $arr = array('Forms' => $Forms);
            return view('mutual/ViewFourthForm',$arr);
        }
    }

    public function Customers(Request $Request)
    {
        $Customers = Fourth_forms_detail::all();
        $arr = array('Customers' => $Customers);
        return view('mutual/Customers',$arr);
    }

    public function ViewForm(Request $Request)
    {

        return view('mutual/AddForm4');

    }

    public function AddForm(Request $Request)
    {
        $newForm = new Fourth_form();
        $newForm -> today = $Request->input('today');
        $newForm -> date = $Request->input('date');
        $newForm -> user_id = Auth::user()->id;
        $newForm -> save();

        for ($i=0; $i < $Request->input('count_results') ; $i++) {
            
            $newFormD = new Fourth_forms_detail();
            $newFormD -> name = $Request->ResultsR[$i]['name'];
            $newFormD -> address = $Request->ResultsR[$i]['address'];
            $newFormD -> time = $Request->ResultsR[$i]['time'];
            $newFormD -> type = $Request->ResultsR[$i]['type'];
            $newFormD -> price = $Request->ResultsR[$i]['price'];
            $newFormD -> phone_number = $Request->ResultsR[$i]['phone_number'];
            $newFormD -> maintenance_type = $Request->ResultsR[$i]['maintenance_type'];
            $newFormD -> maintenance_price = $Request->ResultsR[$i]['maintenance_price'];
            $newFormD -> remaining_price = $Request->ResultsR[$i]['remaining_price'];
            $newFormD -> fourth_form_id = $newForm->id;
            $newFormD -> save();
        }

        $this->AddToLog('   جديد ادخال  عملاء   ' , $newFormD->name ,$newForm->id);

        return redirect('/FourthForms');

    }

    public function DeleteForm(Request $request)
    {
        $DeleteForm = Second_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('    حذف  عميل    ',$DeleteForm->employee_name , $DeleteForm->id);

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
            $Form = Fourth_form::find($this->IdForm);

            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
            //$img = Image::make('templates/Form4.png');
            //save Image
            //$img->save('output/temp/' . $this->IdForm .'-Form4' . '.png');
            //$pdf->Image(public_path('output/temp/' . $this->IdForm .'-Form4' . '.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        
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
        $Form = Fourth_form::find($this->IdForm);
        // set document information
        PDF::SetCreator('Frontier IBS Inc.');
        PDF::SetAuthor('Durra Management System');
        PDF::SetTitle($this->IdForm ."'s Form4");
        PDF::SetSubject('Durra');
        PDF::SetKeywords('Form4');
        // set default monospaced font
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);

        // set auto page breaks
        PDF::SetAutoPageBreak(TRUE, 30);
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
        PDF::SetFont('dejavusans', '', 8);

        // add a page
        PDF::AddPage('P','A4');

        // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
        // get current vertical position
        $this->y = PDF::getY();
    }

    public function GeneralInfo($Request)
    {
        $Form = Fourth_form::find($this->IdForm);
        $FormDetails = $Form->fourth_forms_details;
        $general_info = '
        <span style="color:#660000;font-size:20px;">اليوم: </span>
            <span style="font-size:20px;">'. $Form->today .'</span>
            <span style="color:#660000;font-size:20px;">التاريخ: </span>
            <span style="font-size:20px;">'. $Form->date .'</span><br /><br /><br />
            <table border="1" cellpadding="2" cellspacing="2">
                <thead>
                  <tr style="background-color:#a0a9b3;">
                    <th>الاسم</th>
                    <th>الحي</th>
                    <th>الوقت</th>
                    <th>نوع العقار </th>
                    <th>السعر </th>
                    <th>رقم الجوال </th>
                    <th>نوع الصيانة </th>
                    <th> سعر الصيانة</th>
                    <th>السعر المتبقي </th>
                  </tr>
                </thead>
                <tbody>';
            foreach ($FormDetails as $Detail) {
                $general_info .='
                <tr> 
                    <td align="center"><b>'.$Detail->name.'</b></td>
                    <td>'.$Detail->address.'</td>
                    <td>'.$Detail->time.'</td>
                    <td>'.$Detail->type.'</td>
                    <td>'.$Detail->price.'</td>
                    <td>'.$Detail->phone_number.'</td>
                    <td>'.$Detail->maintenance_type.'</td>
                    <td>'.$Detail->maintenance_price.'</td>
                    <td>'.$Detail->remaining_price.'</td>
                </tr>';
            }
            $general_info .='</tbody></table><!--end table-->';
        PDF::writeHTMLCell(190, '', 10, $this->y, $general_info, 0,0, 0, true, 'C', true);

    }

    public function EndPDF($Request)
    {
        $Form = Fourth_form::find($this->IdForm);

        // reset pointer to the last page
        PDF::lastPage();

        // ---------------------------------------------------------

        // Delete QR & Backround
        //Storage::disk('public_uploads')->delete('/temp/'. $this->IdForm .'-Form4' . '.png');

        //Close and output PDF document
        PDF::Output('Form4-'. $Form->id . '.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

}