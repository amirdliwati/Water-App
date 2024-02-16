<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'Controller@index')->name('home');
Route::get('/', 'Controller@index')->name('homeRoot');

//First Form 
Route::get('/Form1', 'mutual\Form1Controller@ViewForm')->name('Form1Get');
Route::post('/Addform1', 'mutual\Form1Controller@AddForm')->name('Addform1Post');
Route::get('/FirstForms', 'mutual\Form1Controller@index')->name('FirstFormsGet');
Route::get('/Previwform1/{IdForm}', 'mutual\Form1Controller@PreviewForm')->name('PreviewForm1Get');
Route::get('delete-first-form','mutual\Form1Controller@DeleteForm');
Route::post('/EditForm1/{IdForm}', 'mutual\Form1Controller@Edit')->name('EditForm1Post');
Route::get('/EditForm1/{IdForm}', 'mutual\Form1Controller@Edit')->name('EditForm1Get');
Route::get('/ClientSignature/{IdForm}', 'mutual\Form1Controller@ClientSignature')->name('ClientSignatureGet');
Route::post('/ClientSignature/{IdForm}', 'mutual\Form1Controller@ClientSignature')->name('ClientSignaturePost');

//Second Form 
Route::get('/Form2', 'mutual\Form2Controller@ViewForm')->name('Form2Get');
Route::post('/Addform2', 'mutual\Form2Controller@AddForm')->name('Addform2Post');
Route::get('/SecondForms', 'mutual\Form2Controller@index')->name('SecondFormsGet');
Route::get('/Previwform2/{IdForm}', 'mutual\Form2Controller@PreviewForm')->name('PreviewForm2Get');
Route::get('delete-second-form','mutual\Form2Controller@DeleteForm');
Route::post('/EditForm2/{IdForm}', 'mutual\Form2Controller@Edit')->name('EditForm2Post');
Route::get('/EditForm2/{IdForm}', 'mutual\Form2Controller@Edit')->name('EditForm2Get');
Route::get('get-customer-details','mutual\Form2Controller@GetCustomerDetails');
Route::get('get-inspector-details','mutual\Form2Controller@GetInspectorDetails');

//Third Form 
Route::get('/Form3', 'mutual\Form3Controller@ViewForm')->name('Form3Get');
Route::post('/Addform3', 'mutual\Form3Controller@AddForm')->name('Addform3Post');
Route::get('/ThirdForms', 'mutual\Form3Controller@index')->name('ThirdFormsGet');
Route::get('/Previwform3/{IdForm}', 'mutual\Form3Controller@PreviewForm')->name('PreviewForm3Get');
Route::get('delete-third-form','mutual\Form3Controller@DeleteForm');
Route::post('/EditForm3/{IdForm}', 'mutual\Form3Controller@Edit')->name('EditForm3Post');
Route::get('/EditForm3/{IdForm}', 'mutual\Form3Controller@Edit')->name('EditForm3Get');

//Fourth Form 
Route::get('/Form4', 'mutual\Form4Controller@ViewForm')->name('Form4Get');
Route::post('/Addform4', 'mutual\Form4Controller@AddForm')->name('Addform4Post');
Route::get('/FourthForms', 'mutual\Form4Controller@index')->name('FourthFormsGet');
Route::get('/Previwform4/{IdForm}', 'mutual\Form4Controller@PreviewForm')->name('PreviewForm4Get');
Route::get('delete-fourth-form','mutual\Form4Controller@DeleteForm');
Route::get('/FourthFormsCustomers', 'mutual\Form4Controller@Customers')->name('FourthFormsCustomersGet');


//Users Controllers for admin
Route::get('/RegisterUser', 'Auth\RegisterUserController@register')->name('registerGet');
Route::post('/RegisterUser', 'Auth\RegisterUserController@create')->name('registerPost');
Route::get('/ViewUsers', 'admin\UserController@view')->name('ViewUsersGet');
Route::get('delete-user','admin\UserController@DeleteUser');
Route::get('/ViewLogs', 'admin\UserController@ViewLogs')->name('ViewLogsGet');
Route::get('status-user','admin\UserController@StatusUser');
Route::post('/EditUser/{idUser}', 'admin\UserController@Edit')->name('EditUserPost');
Route::get('/EditUser/{idUser}', 'admin\UserController@Edit')->name('EditUserGet');

// Branches
Route::post('/Branches', 'admin\BranchController@branchfunction')->name('branchpost');
Route::get('/Branches', 'admin\BranchController@branchfunction')->name('branchget');

// Inspectors
Route::post('/Inspectors', 'admin\InspectorController@inspectorfunction')->name('InspectorsPost');
Route::get('/Inspectors', 'admin\InspectorController@inspectorfunction')->name('InspectorsGet');

