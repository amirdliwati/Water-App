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
use App\Models\{First_form,General_informatione,Field_examination,Result,Template_first_form};

use Storage;
use Image;
use PDF;
use File;
use DNS2D;
use Johntaa\Arabic\I18N_Arabic;

class Form1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('PreviewForm');
    }

    public function index(Request $Request)
    {
        if (Auth::user()->id == 1) {
        	$FirstForms = First_form::all();
        	$arr = array('FirstForms' => $FirstForms);
            return view('mutual/ViewFirstForm',$arr);
        } else {
            $FirstForms = First_form::where('user_id', Auth::user()->id)->get();
            $arr = array('FirstForms' => $FirstForms);
            return view('mutual/ViewFirstForm',$arr);
        }
    }

    public function ViewForm(Request $Request)
    {

        return view('mutual/AddForm1');

    }

    public function AddForm(Request $Request)
    {
        $newForm = new First_form();
        $newForm -> company_code = 'WAQ19_0016';
        $newForm -> notes = $Request->input('notes');
        $newForm -> employee_name = $Request->input('employee_name');
        $newForm -> inspector = $Request->input('inspector');
        $newForm -> inspector2 = $Request->input('inspector2');
        $newForm -> user_id = Auth::user()->id;
        $newForm -> save();

        $newFormG = new General_informatione();
        $newFormG -> date = $Request->input('date');
        $newFormG -> name = $Request->input('name');
        $newFormG -> phone_number = $Request->input('phone_number');
        $newFormG -> account_number = $Request->input('account_number');
        $newFormG -> region = $Request->input('region');
        $newFormG -> inventory = $Request->input('inventory');
        $newFormG -> counter_number = $Request->input('counter_number');
        $newFormG -> counter_type = $Request->input('counter_type');
        $newFormG -> counter_state = $Request->input('counter_state');
        $newFormG -> city = $Request->input('city');
        $newFormG -> soporific_type = $Request->input('soporific_type');
        $newFormG -> soporific_category = $Request->input('soporific_category');
        $newFormG -> soporific_space = $Request->input('soporific_space');
        $newFormG -> estimated_average = $Request->input('estimated_average');
        $newFormG -> recommended = $Request->input('recommended');
        $newFormG -> employee_signature = 'Signatures_Form1/'.$newForm->id.'/employee_signature_Form1.png';
        Storage::disk('local')->putFileAs('Signatures_Form1/'.$newForm->id.'/', $Request->image_employee, 'employee_signature_Form1.png');
        $newFormG -> first_form_id = $newForm->id;
        $newFormG -> save();

        $newFormF = new Field_examination();
        $newFormF -> count_residents = $Request->input('count_residents');
        $newFormF -> count_employees = $Request->input('count_employees');
        $newFormF -> count_students = $Request->input('count_students');
        $newFormF -> estimated_average_beneficiary = $Request->input('estimated_average_beneficiary');
        $newFormF -> count_wc = $Request->input('count_wc');
        $newFormF -> count_kitchen = $Request->input('count_kitchen');
        $newFormF -> pool = $Request->input('pool');
        $newFormF -> size_pool = $Request->input('size_pool');
        $newFormF -> resource_pool = $Request->input('resource_pool');
        $newFormF -> other_restaurant = $Request->input('other_restaurant');
        $newFormF -> other_laundry = $Request->input('other_laundry');
        $newFormF -> other = $Request->input('other');
        $newFormF -> create_tools = $Request->input('create_tools');
        $newFormF -> ac_1 = $Request->input('ac_1');
        $newFormF -> ac_2 = $Request->input('ac_2');
        $newFormF -> ac_3 = $Request->input('ac_3');
        $newFormF -> ac_4 = $Request->input('ac_4');
        $newFormF -> ac_5 = $Request->input('ac_5');
        $newFormF -> ac_6 = $Request->input('ac_6');
        $newFormF -> estimated_average_ac = $Request->input('estimated_average_ac');
        $newFormF -> garden = $Request->input('garden');
        $newFormF -> garden_space = $Request->input('garden_space');
        $newFormF -> count_tree = $Request->input('count_tree');
        $newFormF -> tree_tall = $Request->input('tree_tall');
        $newFormF -> area_humidity = $Request->input('area_humidity');
        $newFormF -> count_tree_n = $Request->input('count_tree_n');
        $newFormF -> count_flower = $Request->input('count_flower');
        $newFormF -> count_tree_small = $Request->input('count_tree_small');
        $newFormF -> Irrigation_method_1 = $Request->input('Irrigation_method_1');
        $newFormF -> Irrigation_method_2 = $Request->input('Irrigation_method_2');
        $newFormF -> Irrigation_method_3 = $Request->input('Irrigation_method_3');
        $newFormF -> Irrigation_method_4 = $Request->input('Irrigation_method_4');
        $newFormF -> estimated_average_garden = $Request->input('estimated_average_garden');
        $newFormF -> resource_Irrigation = $Request->input('resource_Irrigation');
        $newFormF -> first_read = $Request->input('first_read');
        $newFormF -> second_read = $Request->input('second_read');
        $newFormF -> duration = $Request->input('duration');
        $newFormF -> date_1 = $Request->input('date_1');
        $newFormF -> date_2 = $Request->input('date_2');
        $newFormF -> average_now = $Request->input('average_now');
        $newFormF -> first_form_id = $newForm->id;
        $newFormF -> save();

        $newFormR = new Result();
        $newFormR -> previous_problem = $Request->input('previous_problem');
        $newFormR -> ground_tank = $Request->input('ground_tank');
        $newFormR -> link_ground_tank = $Request->input('link_ground_tank');
        $newFormR -> under_line = $Request->input('under_line');
        $newFormR -> faucet = $Request->input('faucet');
        $newFormR -> box = $Request->input('box');
        $newFormR -> above_ground_tank = $Request->input('above_ground_tank');
        $newFormR -> area_problem_1 = $Request->input('area_problem_1');
        $newFormR -> area_problem_2 = $Request->input('area_problem_2');
        $newFormR -> area_problem_3 = $Request->input('area_problem_3');
        $newFormR -> area_problem_4 = $Request->input('area_problem_4');
        $newFormR -> area_problem_count_1 = $Request->input('area_problem_count_1');
        $newFormR -> area_problem_count_2 = $Request->input('area_problem_count_2');
        $newFormR -> area_problem_count_3 = $Request->input('area_problem_count_3');
        $newFormR -> area_problem_11 = $Request->input('area_problem_11');
        $newFormR -> area_problem_33 = $Request->input('area_problem_33');
        $newFormR -> first_form_id = $newForm->id;
        $newFormR -> save();


        $this->AddToLog(' جديد نموذج فحص التسربات الداخلية للمباني  ' , $newFormG->name ,$newForm->id);

        return redirect('/FirstForms');

    }

    public function Edit (Request $Request)
    {
        if ($Request->isMethod('post')) {
            $editForm =  First_form::find($Request->IdForm);
            $editForm -> company_code = 'WAQ19_0016';
            $editForm -> notes = $Request->input('notes');
            $editForm -> employee_name = $Request->input('employee_name');
            $editForm -> inspector = $Request->input('inspector');
            $editForm -> inspector2 = $Request->input('inspector2');
            $editForm -> save();

            $editFormG =  General_informatione::where('first_form_id',$Request->IdForm)->first();
            $editFormG -> date = $Request->input('date');
            $editFormG -> name = $Request->input('name');
            $editFormG -> phone_number = $Request->input('phone_number');
            $editFormG -> account_number = $Request->input('account_number');
            $editFormG -> region = $Request->input('region');
            $editFormG -> inventory = $Request->input('inventory');
            $editFormG -> counter_number = $Request->input('counter_number');
            $editFormG -> counter_type = $Request->input('counter_type');
            $editFormG -> counter_state = $Request->input('counter_state');
            $editFormG -> city = $Request->input('city');
            $editFormG -> soporific_type = $Request->input('soporific_type');
            $editFormG -> soporific_category = $Request->input('soporific_category');
            $editFormG -> soporific_space = $Request->input('soporific_space');
            $editFormG -> estimated_average = $Request->input('estimated_average');
            $editFormG -> recommended = $Request->input('recommended');
            $editFormG -> save();

            $editFormF =  Field_examination::where('first_form_id',$Request->IdForm)->first();
            $editFormF -> count_residents = $Request->input('count_residents');
            $editFormF -> count_employees = $Request->input('count_employees');
            $editFormF -> count_students = $Request->input('count_students');
            $editFormF -> estimated_average_beneficiary = $Request->input('estimated_average_beneficiary');
            $editFormF -> count_wc = $Request->input('count_wc');
            $editFormF -> count_kitchen = $Request->input('count_kitchen');
            $editFormF -> pool = $Request->input('pool');
            $editFormF -> size_pool = $Request->input('size_pool');
            $editFormF -> resource_pool = $Request->input('resource_pool');
            $editFormF -> other_restaurant = $Request->input('other_restaurant');
            $editFormF -> other_laundry = $Request->input('other_laundry');
            $editFormF -> other = $Request->input('other');
            $editFormF -> create_tools = $Request->input('create_tools');
            $editFormF -> ac_1 = $Request->input('ac_1');
            $editFormF -> ac_2 = $Request->input('ac_2');
            $editFormF -> ac_3 = $Request->input('ac_3');
            $editFormF -> ac_4 = $Request->input('ac_4');
            $editFormF -> ac_5 = $Request->input('ac_5');
            $editFormF -> ac_6 = $Request->input('ac_6');
            $editFormF -> estimated_average_ac = $Request->input('estimated_average_ac');
            $editFormF -> garden = $Request->input('garden');
            $editFormF -> garden_space = $Request->input('garden_space');
            $editFormF -> count_tree = $Request->input('count_tree');
            $editFormF -> tree_tall = $Request->input('tree_tall');
            $editFormF -> area_humidity = $Request->input('area_humidity');
            $editFormF -> count_tree_n = $Request->input('count_tree_n');
            $editFormF -> count_flower = $Request->input('count_flower');
            $editFormF -> count_tree_small = $Request->input('count_tree_small');
            $editFormF -> Irrigation_method_1 = $Request->input('Irrigation_method_1');
            $editFormF -> Irrigation_method_2 = $Request->input('Irrigation_method_2');
            $editFormF -> Irrigation_method_3 = $Request->input('Irrigation_method_3');
            $editFormF -> Irrigation_method_4 = $Request->input('Irrigation_method_4');
            $editFormF -> estimated_average_garden = $Request->input('estimated_average_garden');
            $editFormF -> resource_Irrigation = $Request->input('resource_Irrigation');
            $editFormF -> first_read = $Request->input('first_read');
            $editFormF -> second_read = $Request->input('second_read');
            $editFormF -> duration = $Request->input('duration');
            $editFormF -> date_1 = $Request->input('date_1');
            $editFormF -> date_2 = $Request->input('date_2');
            $editFormF -> average_now = $Request->input('average_now');
            $editFormF -> save();

            $editFormR =  Result::where('first_form_id',$Request->IdForm)->first();
            $editFormR -> previous_problem = $Request->input('previous_problem');
            $editFormR -> ground_tank = $Request->input('ground_tank');
            $editFormR -> link_ground_tank = $Request->input('link_ground_tank');
            $editFormR -> under_line = $Request->input('under_line');
            $editFormR -> faucet = $Request->input('faucet');
            $editFormR -> box = $Request->input('box');
            $editFormR -> above_ground_tank = $Request->input('above_ground_tank');
            $editFormR -> area_problem_1 = $Request->input('area_problem_1');
            $editFormR -> area_problem_2 = $Request->input('area_problem_2');
            $editFormR -> area_problem_3 = $Request->input('area_problem_3');
            $editFormR -> area_problem_4 = $Request->input('area_problem_4');
            $editFormR -> area_problem_count_1 = $Request->input('area_problem_count_1');
            $editFormR -> area_problem_count_2 = $Request->input('area_problem_count_2');
            $editFormR -> area_problem_count_3 = $Request->input('area_problem_count_3');
            $editFormR -> area_problem_11 = $Request->input('area_problem_11');
            $editFormR -> area_problem_33 = $Request->input('area_problem_33');
            $editFormR -> save();


            $this->AddToLog(' تعديل  نموذج فحص التسربات الداخلية للمباني  ' , $editFormG->name ,$editForm->id);

            return redirect('/FirstForms');
        }

        else
        {
            $Form = First_form::find($Request->IdForm);
            $arr = array('Form' => $Form);
            return view('mutual/EditForm1',$arr);
        }

    }

    public function ClientSignature(Request $Request)
    {
        if ($Request->isMethod('post'))
        {
            $Signature =  General_informatione::where('first_form_id',$Request->IdForm)->first();
            $Signature -> client_signature = 'Signatures_Form1/'.$Request->IdForm.'/client_signature_Form1.png';
            $Signature -> save();

            Storage::disk('local')->putFileAs('Signatures_Form1/'.$Request->IdForm.'/', $Request->image_client, 'client_signature_Form1.png');

            return redirect('/FirstForms');
        }
        else
        {
            $Form = First_form::find($Request->IdForm);
            $arr = array('Form' => $Form);
            return view('mutual/signatures/Signatures_Form1_Client',$arr);
        }

    }

    public function DeleteForm(Request $request)
    {
	  	$DeleteForm = First_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('   حذف نموذج فحص التسربات الداخلية للمباني   ',$DeleteForm->employee_name , $DeleteForm->id);

        $FirstForm = First_form::all();
        return response()->json($FirstForm);
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
            $Form = First_form::find($this->IdForm);

            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

            // set QR
            $QR = Image::make(DNS2D::getBarcodePNG(config('app.myurl') . 'Previwform1/' . $Form->id, 'QRCODE'));
            $QR->resize(250, null, function ($constraint) {$constraint->aspectRatio();});
            $QR->save('output/qr'.$Form->id.'_form1.png');

            $img = Image::make('templates/Form1.png');
            //////////////////////////////////// set QR And save final image ///////////////////////////////////////////

            $img->insert('output/qr'.$Form->id.'_form1.png', 'top-right', 550, 30);
            //save Image
            $img->save('output/temp/' . $this->IdForm .'-Form1' . '.png');
            $pdf->Image(public_path('output/temp/' . $this->IdForm .'-Form1' . '.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

            // restore auto-page-break status
            $pdf->SetAutoPageBreak(TRUE, $bMargin);
            // set the starting point for the page content
            $pdf->setPageMark();

            PDF::SetTextColor(0, 63, 127);
        });

        // Custom Footer
        PDF::setFooterCallback(function($pdf) {

        });
    }

    public function InitinalPDF($Request)
    {
        $Form = First_form::find($this->IdForm);
        // set document information
        PDF::SetCreator('Frontier IBS Inc.');
        PDF::SetAuthor('Durra Management System');
        PDF::SetTitle($this->IdForm ."'s Form1");
        PDF::SetSubject('Durra');
        PDF::SetKeywords('Form1');
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

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
        {
            require_once(dirname(__FILE__).'/lang/eng.php');
            PDF::setLanguageArray($l);
        }

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
        $First_form = First_form::find($this->IdForm);
        //Number
        PDF::writeHTMLCell(20, 10, 171, 12, $First_form->id, 0,1, 0, true, 'C', true);
        //date
        PDF::writeHTMLCell(50, 10, 50, 28, $First_form->general_informatione->date, 0,1, 0, true, 'C', true);

        //////////////////////////////////// general_informationes ///////////////////////////////////////////
        PDF::SetFont('aealarabiya', '', 8);
        // add a page
        //name
        if ($First_form->general_informatione->name != "")
        {
            PDF::writeHTMLCell(56, 30, 47, 36, $First_form->general_informatione->name, 0,1, 0, true, 'R', true);
        }
        PDF::SetFont('dejavusans', '', 8);
        //phone_number
        PDF::writeHTMLCell(56, 10, 47, 44, $First_form->general_informatione->phone_number, 0,1, 0, true, 'R', true);
        //account_number
        PDF::writeHTMLCell(56, 10, 47, 48, $First_form->general_informatione->account_number, 0,1, 0, true, 'R', true);
        //region
        if ($First_form->general_informatione->region != "")
        {
            PDF::writeHTMLCell(20, 10, 55, 52, $First_form->general_informatione->region, 0,1, 0, true, 'R', true);
        }

        //inventory
        if ($First_form->general_informatione->inventory != "")
        {
            PDF::writeHTMLCell(20, 10, 83, 52, $First_form->general_informatione->inventory, 0,1, 0, true, 'R', true);
        }

        //counter_number
        PDF::writeHTMLCell(30, 10, 47, 57, $First_form->general_informatione->counter_number, 0,1, 0, true, 'R', true);

        //counter_type
        if ($First_form->general_informatione->counter_type != "")
        {
            PDF::writeHTMLCell(20, 10, 83, 56, $First_form->general_informatione->counter_type, 0,1, 0, true, 'R', true);
        }
        //counter_state
        if ($First_form->general_informatione->counter_state == 1)
        {
            PDF::writeHTMLCell(10, 10, 62, 60, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'R', true);   //open
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 47, 60, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'R', true);   //locked
        }
        //city
        if ($First_form->general_informatione->city != "")
        {
            PDF::writeHTMLCell(56, 10, 47, 65, $First_form->general_informatione->city, 0,1, 0, true, 'R', true);
        }

        //soporific_type
        if ($First_form->general_informatione->soporific_type != "")
        {
            PDF::writeHTMLCell(56, 10, 47, 70, $First_form->general_informatione->soporific_type, 0,1, 0, true, 'R', true);
        }

        //soporific_category
        if ($First_form->general_informatione->soporific_category != "")
        {
            PDF::writeHTMLCell(56, 10, 47, 74, $First_form->general_informatione->soporific_category, 0,1, 0, true, 'R', true);
        }
        //soporific_space
        PDF::writeHTMLCell(56, 10, 47, 79, $First_form->general_informatione->soporific_space, 0,1, 0, true, 'R', true);

        //estimated_average
        PDF::writeHTMLCell(10, 10, 170, 32, $First_form->general_informatione->estimated_average, 0,1, 0, true, 'R', true);
        //recommended
        if ($First_form->general_informatione->recommended != "")
        {
            $needles = array("<br>", "&#13;", "<br/>", "\n");
            $replacement = "<br />";
            $p_long_desc = str_replace($needles, $replacement, $First_form->general_informatione->recommended);
            PDF::writeHTMLCell(88, 34, 107, 48, $p_long_desc, 0,1, 0, true, 'J', true);
        }

        //////////////////////////////////// field_examinations ///////////////////////////////////////////
        //count_residents
        PDF::writeHTMLCell(10, 10, 50, 97, $First_form->field_examination->count_residents, 0,1, 0, true, 'C', true);

        //count_employees
        PDF::writeHTMLCell(10, 10, 50, 102, $First_form->field_examination->count_employees, 0,1, 0, true, 'C', true);

        //count_students
        PDF::writeHTMLCell(10, 10, 50, 107, $First_form->field_examination->count_students, 0,1, 0, true, 'C', true);

        //estimated_average_beneficiary
        PDF::writeHTMLCell(10, 10, 70, 97, $First_form->field_examination->estimated_average_beneficiary, 0,1, 0, true, 'C', true);

        //count_wc
        PDF::writeHTMLCell(10, 10, 41, 122, $First_form->field_examination->count_wc, 0,1, 0, true, 'C', true);

        //count_kitchen
        PDF::writeHTMLCell(10, 10, 41, 127, $First_form->field_examination->count_kitchen, 0,1, 0, true, 'C', true);

        //pool
        if ($First_form->field_examination->pool != "")
        {
            PDF::writeHTMLCell(10, 10, 41, 132, $First_form->field_examination->pool, 0,1, 0, true, 'C', true);
        }

        //size_pool
        PDF::writeHTMLCell(10, 10, 41, 138, $First_form->field_examination->size_pool, 0,1, 0, true, 'C', true);

        //resource_pool
        if ($First_form->field_examination->resource_pool != "")
        {
            PDF::writeHTMLCell(35, 5, 70, 137, $First_form->field_examination->resource_pool, 0,1, 0, true, 'C', true);
        }
        //other_restaurant
        if ($First_form->field_examination->other_restaurant == 1)
        {
            PDF::writeHTMLCell(10, 10, 23, 152, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'R', true);
        }
        //other_laundry
        if ($First_form->field_examination->other_laundry == 1)
        {
            PDF::writeHTMLCell(10, 10, 50, 152, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'R', true);
        }
        //counter_state
        if ($First_form->field_examination->other == 1)
        {
            PDF::writeHTMLCell(10, 10, 86, 152, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'R', true);
        }
        //create_tools
        if ($First_form->field_examination->create_tools != "")
        {
            PDF::writeHTMLCell(35, 5, 68, 162, $First_form->field_examination->create_tools, 0,1, 0, true, 'C', true);
        }
        //ac_1
        PDF::writeHTMLCell(10, 10, 47, 180, $First_form->field_examination->ac_1, 0,1, 0, true, 'C', true);

        //ac_2
        PDF::writeHTMLCell(10, 10, 47, 185, $First_form->field_examination->ac_2, 0,1, 0, true, 'C', true);

        //ac_3
        PDF::writeHTMLCell(10, 10, 47, 190, $First_form->field_examination->ac_3, 0,1, 0, true, 'C', true);

        //ac_4
        PDF::writeHTMLCell(10, 10, 47, 194, $First_form->field_examination->ac_4, 0,1, 0, true, 'C', true);

        //ac_5
        PDF::writeHTMLCell(10, 10, 47, 199, $First_form->field_examination->ac_5, 0,1, 0, true, 'C', true);

        //ac_6
        PDF::writeHTMLCell(10, 10, 47, 203, $First_form->field_examination->ac_6, 0,1, 0, true, 'C', true);

        //estimated_average_ac
        PDF::writeHTMLCell(10, 10, 70, 176, $First_form->field_examination->estimated_average_ac, 0,1, 0, true, 'C', true);

        //garden
        if ($First_form->field_examination->garden == 1)
        {
            PDF::writeHTMLCell(10, 10, 150, 90, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'R', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 169, 90, '<span style="font-size:16px;">&#10004;</span>', 0,1, 0, true, 'R', true);
        }
        //garden_space
        PDF::writeHTMLCell(10, 10, 149, 96, $First_form->field_examination->garden_space, 0,1, 0, true, 'C', true);
        //count_tree
        PDF::writeHTMLCell(10, 10, 149, 101, $First_form->field_examination->count_tree, 0,1, 0, true, 'C', true);

        //tree_tall
        PDF::writeHTMLCell(10, 10, 149, 106, $First_form->field_examination->tree_tall, 0,1, 0, true, 'C', true);

        //area_humidity
        PDF::writeHTMLCell(10, 10, 149, 112, $First_form->field_examination->area_humidity, 0,1, 0, true, 'C', true);

        //count_tree_n
        PDF::writeHTMLCell(10, 10, 149, 117, $First_form->field_examination->count_tree_n, 0,1, 0, true, 'C', true);

        //count_flower
        PDF::writeHTMLCell(10, 10, 149, 122, $First_form->field_examination->count_flower, 0,1, 0, true, 'C', true);

        //count_tree_small
        PDF::writeHTMLCell(10, 10, 149, 127, $First_form->field_examination->count_tree_small, 0,1, 0, true, 'C', true);

        //Irrigation_method_1
        if ($First_form->field_examination->Irrigation_method_1 == 1)
        {
            PDF::writeHTMLCell(10, 10, 114, 148, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //Irrigation_method_2
        if ($First_form->field_examination->Irrigation_method_2 == 1)
        {
            PDF::writeHTMLCell(10, 10, 133, 148, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //Irrigation_method_3
        if ($First_form->field_examination->Irrigation_method_3 == 1)
        {
            PDF::writeHTMLCell(10, 10, 155, 148, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //Irrigation_method_4
        if ($First_form->field_examination->Irrigation_method_4 == 1)
        {
            PDF::writeHTMLCell(10, 10, 173, 148, '<span style="font-size:17px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //estimated_average_garden
        PDF::writeHTMLCell(10, 10, 157, 163, $First_form->field_examination->estimated_average_garden, 0,1, 0, true, 'C', true);

        //resource_Irrigation
        if ($First_form->field_examination->resource_Irrigation != "")
        {
            PDF::writeHTMLCell(30, 5, 121, 157, $First_form->field_examination->resource_Irrigation, 0,1, 0, true, 'C', true);
        }

        //first_read
        PDF::writeHTMLCell(22, 5, 130, 183, $First_form->field_examination->first_read, 0,1, 0, true, 'C', true);

        //second_read
        PDF::writeHTMLCell(22, 5, 130, 188, $First_form->field_examination->second_read, 0,1, 0, true, 'C', true);

        //duration
        PDF::writeHTMLCell(15, 10, 167, 178, $First_form->field_examination->duration, 0,1, 0, true, 'C', true);

        //date_1
        PDF::writeHTMLCell(20, 10, 164, 183, $First_form->field_examination->date_1, 0,1, 0, true, 'C', true);

        //date_2
        PDF::writeHTMLCell(20, 10, 164, 188, $First_form->field_examination->date_2, 0,1, 0, true, 'C', true);

        //average_now
        PDF::writeHTMLCell(15, 10, 155, 201, $First_form->field_examination->average_now, 0,1, 0, true, 'C', true);

        //////////////////////////////////// results ///////////////////////////////////////////
        //previous_problem
        if ($First_form->result->previous_problem != "")
        {
            PDF::writeHTMLCell(168, 15, 24, 211, $First_form->result->previous_problem, 0,1, 0, true, 'J', true);
        }

        //ground_tank
        if ($First_form->result->ground_tank == 0)
        {
            PDF::writeHTMLCell(10, 10, 62, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        elseif ($First_form->result->ground_tank == 1)
        {
            PDF::writeHTMLCell(10, 10, 77, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 92, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //link_ground_tank
        if ($First_form->result->link_ground_tank == 0)
        {
            PDF::writeHTMLCell(10, 10, 62, 243, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);

        }
        elseif ($First_form->result->link_ground_tank == 1)
        {
            PDF::writeHTMLCell(10, 10, 77, 243, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 92, 243, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //under_line
        if ($First_form->result->under_line == 0)
        {
            PDF::writeHTMLCell(10, 10, 62, 246, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        elseif ($First_form->result->under_line == 1)
        {
            PDF::writeHTMLCell(10, 10, 77, 246, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 92, 246, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //faucet
        if ($First_form->result->faucet == 0)
        {
            PDF::writeHTMLCell(10, 10, 62, 250, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        elseif ($First_form->result->faucet == 1)
        {
            PDF::writeHTMLCell(10, 10, 77, 250, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 92, 250, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //box
        if ($First_form->result->box == 0)
        {
            PDF::writeHTMLCell(10, 10, 62, 253, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        elseif ($First_form->result->box == 1)
        {
            PDF::writeHTMLCell(10, 10, 77, 253, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 92, 253, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //above_ground_tank
        if ($First_form->result->above_ground_tank == 0)
        {
            PDF::writeHTMLCell(10, 10, 62, 256, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        elseif ($First_form->result->above_ground_tank == 1)
        {
            PDF::writeHTMLCell(10, 10, 77, 256, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        else
        {
            PDF::writeHTMLCell(10, 10, 92, 256, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //area_problem_1
        if ($First_form->result->area_problem_1 == 1)
        {
            PDF::writeHTMLCell(10, 10, 117, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //area_problem_2
        if ($First_form->result->area_problem_2 == 1)
        {
            PDF::writeHTMLCell(10, 10, 133, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //area_problem_3
        if ($First_form->result->area_problem_3 == 1)
        {
            PDF::writeHTMLCell(10, 10, 151, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //area_problem_4
        if ($First_form->result->area_problem_4 == 1)
        {
            PDF::writeHTMLCell(10, 10, 166, 239, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //area_problem_count_1
        PDF::writeHTMLCell(15, 4, 136, 246, $First_form->result->area_problem_count_1, 0,1, 0, true, 'C', true);

        //area_problem_count_2
        PDF::writeHTMLCell(15, 4, 154, 246, $First_form->result->area_problem_count_2, 0,1, 0, true, 'C', true);

        //area_problem_count_3
        PDF::writeHTMLCell(15, 4, 169, 246, $First_form->result->area_problem_count_3, 0,1, 0, true, 'C', true);

        //area_problem_11
        if ($First_form->result->area_problem_11 == 1)
        {
            PDF::writeHTMLCell(10, 10, 117, 257, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }
        //area_problem_33
        if ($First_form->result->area_problem_33 == 1)
        {
            PDF::writeHTMLCell(10, 10, 138, 257, '<span style="font-size:13px;">&#10004;</span>', 0,1, 0, true, 'C', true);
        }

        //////////////////////////////////// first_forms ///////////////////////////////////////////
        //notes
        if ($First_form->notes != "")
        {
            PDF::writeHTMLCell(178, 16, 18, 264, $First_form->notes, 0,1, 0, true, 'J', true);
        }

        PDF::SetFont('aealarabiya', '', 8);
        //employee_name
        if ($First_form->employee_name != "")
        {
            PDF::writeHTMLCell(42, 5, 18, 287, $First_form->employee_name, 0,1, 0, true, 'C', true);
        }

        //employee_signature
        if ($First_form->general_informatione->employee_signature != "")
        {
            $employee_signature = Image::make(Storage::get($First_form->general_informatione->employee_signature));
            $employee_signature->resize(null, 30, function ($constraint) {
                $constraint->aspectRatio();});
            $employee_signature->save('output/temp/Signatures_Form1-' . $this->IdForm .'-employee'. '.png');
            PDF::writeHTMLCell(42, 4, 100, 286, '<img src="' . public_path('output/temp/Signatures_Form1-' . $this->IdForm .'-employee'. '.png') . '">', 0,1, 0, true, 'C', true);
        }

        //inspector
        PDF::writeHTMLCell(40, 4, 108, 286, $First_form->inspector, 0,1, 0, true, 'C', true);


        //inspector2
        if ($First_form->inspector2 != "")
        {
            PDF::writeHTMLCell(20, 4, 128, 290, $First_form->inspector2, 0,1, 0, true, 'R', true);
        }

        //client_signature
        if ($First_form->general_informatione->client_signature != "")
        {
            $employee_signature = Image::make(Storage::get($First_form->general_informatione->client_signature));
            $employee_signature->resize(null, 30, function ($constraint) {
                $constraint->aspectRatio();});
            $employee_signature->save('output/temp/Signatures_Form1-' . $this->IdForm .'-client'. '.png');
            PDF::writeHTMLCell(42, 4, 190, 286, '<img src="' . public_path('output/temp/Signatures_Form1-' . $this->IdForm .'-client'. '.png') . '">', 0,1, 0, true, 'C', true);
        }

    }

    public function EndPDF($Request)
    {
        $Form = First_form::find($this->IdForm);

        // reset pointer to the last page
        PDF::lastPage();

        // ---------------------------------------------------------

        // Delete QR & Backround
        Storage::disk('public_uploads')->delete('/temp/'. $this->IdForm .'-Form1' . '.png');

        // Delete employee_signature
        Storage::disk('public_uploads')->delete('/temp/Signatures_Form1-'. $this->IdForm .'-employee' . '.png');
        // Delete client_signature
        Storage::disk('public_uploads')->delete('/temp/Signatures_Form1-'. $this->IdForm .'-client' . '.png');

        //Close and output PDF document
        PDF::Output('Form1-'. $Form->id . '.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }
}
