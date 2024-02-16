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
        $this->middleware('auth'); 
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

        $newFormR = new Result();;
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

    public function DeleteForm(Request $request)
    {
	  	$DeleteForm = First_form::find($request->id_form);
        $DeleteForm -> delete();

        $this->AddToLog('   حذف نموذج فحص التسربات الداخلية للمباني   ',$DeleteForm->employee_name , $DeleteForm->id);

        $FirstForm = First_form::all();
        return response()->json($FirstForm); 
    }

    public function PreviewForm(Request $Request, $IdForm)
    { 
        $this->WriteImage($IdForm);

        PDF::SetTitle("Form1 Export");
        PDF::setPrintHeader(false);
        PDF::setPrintFooter(false);
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);
        PDF::SetAutoPageBreak(false, 0);
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
        PDF::AddPage('P','A4');

        // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

        PDF::Image(public_path('output/'. $IdForm .'_form1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        PDF::Output('Form1-'.$IdForm.'.pdf', 'I');   
        Storage::disk('public_uploads')->delete($IdForm .'_form1.png');
        Storage::disk('public_uploads')->delete('qr'.$IdForm .'_form1.png');
 
    }

    private $siz;
    private $align;
    public function WriteImage($IdForm)
    {
        
        $Form = First_form::find($IdForm);

        // set QR
		$QR = Image::make(DNS2D::getBarcodePNG(config('app.myurl'), 'QRCODE'));
	    $QR->resize(275, null, function ($constraint) {$constraint->aspectRatio();});
	    $QR->save('output/qr'.$Form->id.'_form1.png');

        $img = Image::make('templates/'. 'Form1' .'.png');

        $PrintForm = Template_first_form::find(1);
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

//////////////////////////////////// general_informationes ///////////////////////////////////////////
        //date
        $this->siz=$PrintForm->date_s;
        $img->text($Form->general_informatione->date, $PrintForm->date_x, $PrintForm->date_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //name
        $this->siz=$PrintForm->name_s;
        if ($Form->general_informatione->name != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->name), $PrintForm->name_x, $PrintForm->name_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }
        
        //phone_number
        $this->siz=$PrintForm->phone_number_s;
        $img->text($Form->general_informatione->phone_number, $PrintForm->phone_number_x, $PrintForm->phone_number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('center');    
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //account_number
        $this->siz=$PrintForm->account_number_s;
        $img->text($Form->general_informatione->account_number, $PrintForm->account_number_x, $PrintForm->account_number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('center');    
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //region
        $this->siz=$PrintForm->region_s;
        if ($Form->general_informatione->region != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->region), $PrintForm->region_x, $PrintForm->region_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //inventory
        $this->siz=$PrintForm->inventory_s;
        if ($Form->general_informatione->inventory != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->inventory), $PrintForm->inventory_x, $PrintForm->inventory_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //counter_number
        $this->siz=$PrintForm->counter_number_s;
        $img->text($Form->general_informatione->counter_number, $PrintForm->counter_number_x, $PrintForm->counter_number_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');  
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //counter_type
        $this->siz=$PrintForm->counter_type_s;
        if ($Form->general_informatione->counter_type != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->counter_type), $PrintForm->counter_type_x, $PrintForm->counter_type_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('center');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //counter_state
        $this->siz=$PrintForm->counter_state_s;
        if ($Form->general_informatione->counter_state == 1) {

        	$img->text('*', $PrintForm->counter_state_x, $PrintForm->counter_state_y, function($font)
		    { 
		        $font->file(public_path('font/trado.ttf'));
		        $font->size($this->siz);  
		        $font->color('#000000');   
		        $font->valign('bottom');  
		        $font->angle(0);  
		    });
		}
		else{

			$img->text('*', 1850, 730, function($font)
		    { 
		        $font->file(public_path('font/trado.ttf'));
		        $font->size($this->siz);  
		        $font->color('#000000');   
		        $font->valign('bottom');  
		        $font->angle(0);  
		    });			
		}
        
        //city
        $this->siz=$PrintForm->city_s;
        if ($Form->general_informatione->city != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->city), $PrintForm->city_x, $PrintForm->city_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //soporific_type
        $this->siz=$PrintForm->soporific_type_s;
        if ($Form->general_informatione->soporific_type != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->soporific_type), $PrintForm->soporific_type_x, $PrintForm->soporific_type_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //soporific_category	
        $this->siz=$PrintForm->soporific_category_s;
        if ($Form->general_informatione->soporific_category != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->soporific_category), $PrintForm->soporific_category_x, $PrintForm->soporific_category_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //soporific_space
        $this->siz=$PrintForm->soporific_space_s;
        $img->text($Form->general_informatione->soporific_space, $PrintForm->soporific_space_x, $PrintForm->soporific_space_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('right');    
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //estimated_average
        $this->siz=$PrintForm->estimated_average_s;
        $img->text($Form->general_informatione->estimated_average, $PrintForm->estimated_average_x, $PrintForm->estimated_average_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');
            $font->align('center');    
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //recommended	
        $this->siz=$PrintForm->recommended_s;
        if ($Form->general_informatione->recommended != "") {
            $img->text($Arabic->utf8Glyphs($Form->general_informatione->recommended), $PrintForm->recommended_x, $PrintForm->recommended_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('top');  
                $font->angle(0);  
            });
        }

//////////////////////////////////// field_examinations ///////////////////////////////////////////
        //count_residents
        $this->siz=$PrintForm->count_residents_s;
        $img->text($Form->field_examination->count_residents, $PrintForm->count_residents_x, $PrintForm->count_residents_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_employees
        $this->siz=$PrintForm->count_employees_s;
        $img->text($Form->field_examination->count_employees, $PrintForm->count_employees_x, $PrintForm->count_employees_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_students
        $this->siz=$PrintForm->count_students_s;
        $img->text($Form->field_examination->count_students, $PrintForm->count_students_x, $PrintForm->count_students_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //estimated_average_beneficiary
        $this->siz=$PrintForm->estimated_average_beneficiary_s;
        $img->text($Form->field_examination->estimated_average_beneficiary, $PrintForm->estimated_average_beneficiary_x, $PrintForm->estimated_average_beneficiary_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_wc
        $this->siz=$PrintForm->count_wc_s;
        $img->text($Form->field_examination->count_wc, $PrintForm->count_wc_x, $PrintForm->count_wc_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_kitchen
        $this->siz=$PrintForm->count_kitchen_s;
        $img->text($Form->field_examination->count_kitchen, $PrintForm->count_kitchen_x, $PrintForm->count_kitchen_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //pool	
        $this->siz=$PrintForm->pool_s;
        if ($Form->field_examination->pool != "") {
            $img->text($Arabic->utf8Glyphs($Form->field_examination->pool), $PrintForm->pool_x, $PrintForm->pool_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //size_pool
        $this->siz=$PrintForm->size_pool_s;
        $img->text($Form->field_examination->size_pool, $PrintForm->size_pool_x, $PrintForm->size_pool_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //resource_pool 
        $this->siz=$PrintForm->resource_pool_s;
        if ($Form->field_examination->resource_pool != "") {
            $img->text($Arabic->utf8Glyphs($Form->field_examination->resource_pool), $PrintForm->resource_pool_x, $PrintForm->resource_pool_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //other_restaurant
        $this->siz=$PrintForm->other_restaurant_s;
        if ($Form->field_examination->other_restaurant == 1) {

            $img->text('*', $PrintForm->other_restaurant_x, $PrintForm->other_restaurant_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //other_laundry
        $this->siz=$PrintForm->other_laundry_s;
        if ($Form->field_examination->other_laundry == 1) {

            $img->text('*', $PrintForm->other_laundry_x, $PrintForm->other_laundry_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //counter_state
        $this->siz=$PrintForm->other_s;
        if ($Form->field_examination->other == 1) {

            $img->text('*', $PrintForm->other_x, $PrintForm->other_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //create_tools  
        $this->siz=$PrintForm->create_tools_s;
        if ($Form->field_examination->create_tools != "") {
            $img->text($Arabic->utf8Glyphs($Form->field_examination->create_tools), $PrintForm->create_tools_x, $PrintForm->create_tools_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //ac_1
        $this->siz=$PrintForm->ac_1_s;
        $img->text($Form->field_examination->ac_1, $PrintForm->ac_1_x, $PrintForm->ac_1_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //ac_2
        $this->siz=$PrintForm->ac_2_s;
        $img->text($Form->field_examination->ac_2, $PrintForm->ac_2_x, $PrintForm->ac_2_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //ac_3
        $this->siz=$PrintForm->ac_3_s;
        $img->text($Form->field_examination->ac_3, $PrintForm->ac_3_x, $PrintForm->ac_3_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //ac_4
        $this->siz=$PrintForm->ac_4_s;
        $img->text($Form->field_examination->ac_4, $PrintForm->ac_4_x, $PrintForm->ac_4_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //ac_5
        $this->siz=$PrintForm->ac_5_s;
        $img->text($Form->field_examination->ac_5, $PrintForm->ac_5_x, $PrintForm->ac_5_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //ac_6
        $this->siz=$PrintForm->ac_6_s;
        $img->text($Form->field_examination->ac_6, $PrintForm->ac_6_x, $PrintForm->ac_6_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //estimated_average_ac
        $this->siz=$PrintForm->estimated_average_ac_s;
        $img->text($Form->field_examination->estimated_average_ac, $PrintForm->estimated_average_ac_x, $PrintForm->estimated_average_ac_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //garden
        $this->siz=$PrintForm->garden_s;
        if ($Form->field_examination->garden == 1) {

            $img->text('*', $PrintForm->garden_x, $PrintForm->garden_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }
        else{

            $img->text('*', 400, 1121, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });         
        }

        //garden_space
        $this->siz=$PrintForm->garden_space_s;
        $img->text($Form->field_examination->garden_space, $PrintForm->garden_space_x, $PrintForm->garden_space_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_tree
        $this->siz=$PrintForm->count_tree_s;
        $img->text($Form->field_examination->count_tree, $PrintForm->count_tree_x, $PrintForm->count_tree_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //tree_tall
        $this->siz=$PrintForm->tree_tall_s;
        $img->text($Form->field_examination->tree_tall, $PrintForm->tree_tall_x, $PrintForm->tree_tall_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //area_humidity
        $this->siz=$PrintForm->area_humidity_s;
        $img->text($Form->field_examination->area_humidity, $PrintForm->area_humidity_x, $PrintForm->area_humidity_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_tree_n
        $this->siz=$PrintForm->count_tree_n_s;
        $img->text($Form->field_examination->count_tree_n, $PrintForm->count_tree_n_x, $PrintForm->count_tree_n_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_flower
        $this->siz=$PrintForm->count_flower_s;
        $img->text($Form->field_examination->count_flower, $PrintForm->count_flower_x, $PrintForm->count_flower_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //count_tree_small
        $this->siz=$PrintForm->count_tree_small_s;
        $img->text($Form->field_examination->count_tree_small, $PrintForm->count_tree_small_x, $PrintForm->count_tree_small_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //Irrigation_method_1
        $this->siz=$PrintForm->Irrigation_method_1_s;
        if ($Form->field_examination->Irrigation_method_1 == 1) {

            $img->text('*', $PrintForm->Irrigation_method_1_x, $PrintForm->Irrigation_method_1_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //Irrigation_method_2
        $this->siz=$PrintForm->Irrigation_method_2_s;
        if ($Form->field_examination->Irrigation_method_2 == 1) {

            $img->text('*', $PrintForm->Irrigation_method_2_x, $PrintForm->Irrigation_method_2_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //Irrigation_method_3
        $this->siz=$PrintForm->Irrigation_method_3_s;
        if ($Form->field_examination->Irrigation_method_3 == 1) {

            $img->text('*', $PrintForm->Irrigation_method_3_x, $PrintForm->Irrigation_method_3_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //Irrigation_method_4
        $this->siz=$PrintForm->Irrigation_method_4_s;
        if ($Form->field_examination->Irrigation_method_4 == 1) {

            $img->text('*', $PrintForm->Irrigation_method_4_x, $PrintForm->Irrigation_method_4_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //estimated_average_garden
        $this->siz=$PrintForm->estimated_average_garden_s;
        $img->text($Form->field_examination->estimated_average_garden, $PrintForm->estimated_average_garden_x, $PrintForm->estimated_average_garden_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //resource_Irrigation   
        $this->siz=$PrintForm->resource_Irrigation_s;
        if ($Form->field_examination->resource_Irrigation != "") {
            $img->text($Arabic->utf8Glyphs($Form->field_examination->resource_Irrigation), $PrintForm->resource_Irrigation_x, $PrintForm->resource_Irrigation_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //first_read
        $this->siz=$PrintForm->first_read_s;
        $img->text($Form->field_examination->first_read, $PrintForm->first_read_x, $PrintForm->first_read_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //second_read
        $this->siz=$PrintForm->second_read_s;
        $img->text($Form->field_examination->second_read, $PrintForm->second_read_x, $PrintForm->second_read_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //duration
        $this->siz=$PrintForm->duration_s;
        $img->text($Form->field_examination->duration, $PrintForm->duration_x, $PrintForm->duration_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //date_1
        $this->siz=$PrintForm->date_1_s;
        $img->text($Form->field_examination->date_1, $PrintForm->date_1_x, $PrintForm->date_1_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //date_2
        $this->siz=$PrintForm->date_2_s;
        $img->text($Form->field_examination->date_2, $PrintForm->date_2_x, $PrintForm->date_2_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //average_now
        $this->siz=$PrintForm->average_now_s;
        $img->text($Form->field_examination->average_now, $PrintForm->average_now_x, $PrintForm->average_now_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

//////////////////////////////////// results ///////////////////////////////////////////
        //previous_problem  
        $this->siz=$PrintForm->previous_problem_s;
        if ($Form->result->previous_problem != "") {
            $img->text($Arabic->utf8Glyphs($Form->result->previous_problem), $PrintForm->previous_problem_x, $PrintForm->previous_problem_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //ground_tank
        $this->siz=$PrintForm->ground_tank_s;
        if ($Form->result->ground_tank == 0) {

            $img->text('*', $PrintForm->ground_tank_x, $PrintForm->ground_tank_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        elseif ($Form->result->ground_tank == 1) {

            $img->text('*', 1515 , 2880 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        else {

            $img->text('*', 1320 , 2880 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //link_ground_tank
        $this->siz=$PrintForm->link_ground_tank_s;
        if ($Form->result->link_ground_tank == 0) {

            $img->text('*', $PrintForm->link_ground_tank_x, $PrintForm->link_ground_tank_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        elseif ($Form->result->link_ground_tank == 1) {

            $img->text('*',1515 ,2925 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        else {

            $img->text('*',1320 ,2925 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //under_line
        $this->siz=$PrintForm->under_line_s;
        if ($Form->result->under_line == 0) {

            $img->text('*', $PrintForm->under_line_x, $PrintForm->under_line_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        elseif ($Form->result->under_line_x == 1) {

            $img->text('*',1515 ,2970 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        else {

            $img->text('*',1320 ,2970 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //faucet
        $this->siz=$PrintForm->faucet_s;
        if ($Form->result->faucet == 0) {

            $img->text('*', $PrintForm->faucet_x, $PrintForm->faucet_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        elseif ($Form->result->faucet == 1) {

            $img->text('*',1515 ,3015 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        else {

            $img->text('*',1320 ,3015 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //box
        $this->siz=$PrintForm->box_s;
        if ($Form->result->box == 0) {

            $img->text('*', $PrintForm->box_x, $PrintForm->box_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        elseif ($Form->result->box == 1) {

            $img->text('*',1515 ,3060 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        else {

            $img->text('*',1320 ,3060 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //above_ground_tank
        $this->siz=$PrintForm->above_ground_tank_s;
        if ($Form->result->above_ground_tank == 0) {

            $img->text('*', $PrintForm->above_ground_tank_x, $PrintForm->above_ground_tank_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        elseif ($Form->result->above_ground_tank == 1) {

            $img->text('*',1515 ,3105 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        else {

            $img->text('*',1320 ,3105 , function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //area_problem_1
        $this->siz=$PrintForm->area_problem_1_s;
        if ($Form->result->area_problem_1 == 1) {

            $img->text('*', $PrintForm->area_problem_1_x, $PrintForm->area_problem_1_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //area_problem_2
        $this->siz=$PrintForm->area_problem_2_s;
        if ($Form->result->area_problem_2 == 1) {

            $img->text('*', $PrintForm->area_problem_2_x, $PrintForm->area_problem_2_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //area_problem_3
        $this->siz=$PrintForm->area_problem_3_s;
        if ($Form->result->area_problem_3 == 1) {

            $img->text('*', $PrintForm->area_problem_3_x, $PrintForm->area_problem_3_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //area_problem_4
        $this->siz=$PrintForm->area_problem_4_s;
        if ($Form->result->area_problem_4 == 1) {

            $img->text('*', $PrintForm->area_problem_4_x, $PrintForm->area_problem_4_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //area_problem_count_1
        $this->siz=$PrintForm->area_problem_count_1_s;
        $img->text($Form->result->area_problem_count_1, $PrintForm->area_problem_count_1_x, $PrintForm->area_problem_count_1_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //area_problem_count_2
        $this->siz=$PrintForm->area_problem_count_2_s;
        $img->text($Form->result->area_problem_count_2, $PrintForm->area_problem_count_2_x, $PrintForm->area_problem_count_2_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //area_problem_count_3
        $this->siz=$PrintForm->area_problem_count_3_s;
        $img->text($Form->result->area_problem_count_3, $PrintForm->area_problem_count_3_x, $PrintForm->area_problem_count_3_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });

        //area_problem_11
        $this->siz=$PrintForm->area_problem_11_s;
        if ($Form->result->area_problem_11 == 1) {

            $img->text('*', $PrintForm->area_problem_11_x, $PrintForm->area_problem_11_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //area_problem_33
        $this->siz=$PrintForm->area_problem_33_s;
        if ($Form->result->area_problem_33 == 1) {

            $img->text('*', $PrintForm->area_problem_33_x, $PrintForm->area_problem_33_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');   
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }
        

//////////////////////////////////// first_forms ///////////////////////////////////////////
        //notes 
        $this->siz=$PrintForm->notes_s;
        if ($Form->notes != "") {
            $img->text($Arabic->utf8Glyphs($Form->notes), $PrintForm->notes_x, $PrintForm->notes_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('right');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        //employee_name     
        $this->siz=$PrintForm->employee_name_s;
        if ($Form->employee_name != "") {
            $img->text($Arabic->utf8Glyphs($Form->employee_name), $PrintForm->employee_name_x, $PrintForm->employee_name_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('center');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }

        /*//inspector   
        $this->siz=$PrintForm->inspector_s;
        $img->text($Arabic->utf8Glyphs($Form->inspector), $PrintForm->inspector_x, $PrintForm->inspector_y, function($font)
        { 
            $font->file(public_path('font/trado.ttf'));
            $font->size($this->siz);  
            $font->color('#000000');   
            $font->valign('bottom');  
            $font->angle(0);  
        });*/

        //inspector2    
        $this->siz=$PrintForm->inspector2_s;
        if ($Form->inspector2 != "") {
            $img->text($Arabic->utf8Glyphs($Form->inspector2), $PrintForm->inspector2_x, $PrintForm->inspector2_y, function($font)
            { 
                $font->file(public_path('font/trado.ttf'));
                $font->size($this->siz);  
                $font->color('#000000');
                $font->align('center');    
                $font->valign('bottom');  
                $font->angle(0);  
            });
        }


//////////////////////////////////// set QR And save final image ///////////////////////////////////////////

        $img->insert('output/qr'.$Form->id.'_form1.png', 'bottom-right', $PrintForm->qr_x, $PrintForm->qr_y);
        $img->save('output/'. $Form->id . '_form1' .'.png');

    }


}