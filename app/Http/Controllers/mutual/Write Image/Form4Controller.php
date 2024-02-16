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
            $newFormD -> name_employee = $Request->ResultsR[$i]['name_employee'];
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

    public function PreviewForm(Request $Request, $IdForm)
    { 
        //Get Data
        $Form = Fourth_form::find($IdForm);

        $FormDetails = $Form->fourth_forms_details;

        // set QR
        /*$QR = Image::make(DNS2D::getBarcodePNG($Form->id, 'QRCODE'));
        $QR->resize(275, null, function ($constraint) {$constraint->aspectRatio();});
        $QR->save('output/qr'.$Form->id.'_form4.png');
        $QRPath = 'output/qr'.$Form->id.'_form4.png';*/

        // set document information
        PDF::SetTitle($Form->id);
        
        // set default monospaced font
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);

        // set auto page breaks
        PDF::SetAutoPageBreak(FALSE, 0);

        // remove default footer & Header
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set Protection File
        //PDF::SetProtection(array('modify','copy'), 'Password', null, 0, null);
        PDF::SetProtection(array('modify','copy'), '', null, 0, null);

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

        /* NOTE:
         * *********************************************************
         * You can load external XHTML using :
         *
         * $html = file_get_contents('/path/to/your/file.html');
         *
         * External CSS files will be automatically loaded.
         * Sometimes you need to fix the path of the external CSS.
         * *********************************************************
         */

        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
        //PDF::Image(public_path('img/naya1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

        // set the starting point for the page content
        //PDF::setPageMark();

        // define some HTML content with style
        $html = <<<EOF
            <span style="color:#660000;font-size:20px;">اليوم: </span>
            <span style="font-size:20px;"> $Form->today </span>
            <span style="color:#660000;font-size:20px;">التاريخ: </span>
            <span style="font-size:20px;"> $Form->date </span><br /><br /><br />
            <table border="1" cellpadding="2" cellspacing="2">
                <thead>
                  <tr style="background-color:#a0a9b3;">
                    <th>الاسم</th>
                    <th>الحي </th>
                    <th>الوقت</th>
                    <th>نوع العقار </th>
                    <th>السعر </th>
                    <th>رقم الجوال </th>
                    <th>الفني </th>
                  </tr>
                </thead>
                <tbody>               
            EOF;
            foreach ($FormDetails as $Detail) {
                $html .= <<<EOF
                <tr> 
                    <td align="center"><b>$Detail->name</b></td>
                    <td>$Detail->address</td>
                    <td>$Detail->time</td>
                    <td>$Detail->type</td>
                    <td>$Detail->price</td>
                    <td>$Detail->phone_number</td>
                    <td>$Detail->name_employee</td>
                </tr>
                EOF;
            }
            $html .= <<<EOF
                </tbody>
            </table><!--end table-->
            EOF;

        // output the HTML content
        PDF::writeHTML($html, true, false, true, false, '');
                    
    ///////////////////////////////////////////////////////////////////////////////////////////////////

        // reset pointer to the last page
        PDF::lastPage();

        // ---------------------------------------------------------

        // Delete QR
        //Storage::disk('public_uploads')->delete('qr'.$IdForm .'_form1.png');

        //Close and output PDF document
        PDF::Output($Form->id.'.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
 
    }

    public function WriteImage($IdForm)
    {
        
        $Form = Fourth_form::find($IdForm);

        // set QR
        $QR = Image::make(DNS2D::getBarcodePNG($Form->id, 'QRCODE'));
        $QR->resize(275, null, function ($constraint) {$constraint->aspectRatio();});
        $QR->save('output/qr'.$Form->id.'_form4.png');

        $Arabic = new I18N_Arabic('Glyphs');

//////////////////////////////////// set QR And save final image ///////////////////////////////////////////

        $img->insert('output/qr'.$Form->id.'_form4.png', 'bottom-right', $PrintForm->qr_x, $PrintForm->qr_y);
        $img->save('output/'. $Form->id . '_form2' .'.png');

    }

}