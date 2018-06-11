<?php
use App\Staff;
use App\Photo;
use App\User;
use App\Product;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['loggedin']], function(){    
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('/submitregistrationform', 'Addits@submitregistrationform');
Route::resource('/fullregistration', 'Addits@fullregistration');
Route::resource('/submitloginform', 'Addits@submitloginform');
Route::resource('/profilelogin', 'Addits@profilelogin');
Route::get('/userslogin', function(){
    return view('users.login');
});
Route::resource('/usersendmessage', 'ProfileController@usersendmessage');
Route::group(['middleware' => ['auth', 'isaddmited']], function(){    
    Route::resource('/profile', 'ProfileController@index');
    Route::resource('/useradmissionletter', 'ProfileController@useradmissionletter');
    Route::resource('/schoolfeespayments', 'ProfileController@schoolfeespayments');
    Route::resource('/otherpayments', 'ProfileController@otherpayments');
});

Route::get('/makeadmin', function(){
    return view('admin.adminregister');
});
Route::resource('/makeadminuser', 'AdminController@makeadminuser');

Route::group(['middleware' => ['web','auth','completepayment']], function(){    
    Route::resource('/courseregistration', 'ProfileController@courseregistration'); 
});


Route::group(['middleware' => ['auth', 'isadmin']], function(){    
    Route::resource('/adminpage', 'AdminController@index');
    Route::resource('/editadminprofiles', 'AdminController@editadminprofiles');
    Route::resource('/currentadminchangepassword', 'AdminController@currentadminchangepassword');
    Route::resource('/createadminuser', 'AdminController@createadminuser');
    Route::resource('/adminposttask', 'AdminController@adminposttask');
    Route::resource('/tasksrefresh', 'AdminController@tasksrefresh');
    Route::resource('/tasksdelete', 'AdminController@tasksdelete');
    Route::resource('/taskscompleted', 'AdminController@taskscompleted');
    Route::post('/adminphotoupload/{id}', 'AdminController@adminphotoupload');
    Route::post('/adminsearch', 'AdminController@adminsearch');
    Route::resource('/admissionlist', 'AdminController@admissionlist');
    Route::resource('/editadmissionlist', 'AdminController@editadmissionlist');
    Route::resource('/admittedlist', 'AdminController@admittedlist');
    Route::resource('/admitstudent', 'AdminController@admitstudent');
    Route::resource('/unadmitstudent', 'AdminController@unadmitstudent');


    Route::resource('/fulltimeprogcreate', 'AdminController@fulltimeprogcreate');
    Route::resource('/fulltimeprogedit', 'AdminController@fulltimeprogedit');
    Route::resource('/fulltimeprogview', 'AdminController@fulltimeprogview');
    Route::resource('/fulltimeprogdelete', 'AdminController@fulltimeprogdelete');
    Route::resource('/fulltimeprogtypesubmitcreate', 'AdminController@fulltimeprogtypesubmitcreate');
    Route::resource('/fulltimedepartmentsubmitcreate', 'AdminController@fulltimedepartmentsubmitcreate');
    Route::resource('/fulltimecoursesubmitcreate', 'AdminController@fulltimecoursesubmitcreate');
    Route::resource('/fulltimeprogtypesubmitedit', 'AdminController@fulltimeprogtypesubmitedit');
    Route::resource('/fulltimedepartmentsubmitedit', 'AdminController@fulltimedepartmentsubmitedit');
    Route::resource('/fulltimecoursesubmitedit', 'AdminController@fulltimecoursesubmitedit');
    Route::resource('/fulltimeprogtypesubmitdelete', 'AdminController@fulltimeprogtypesubmitdelete');
    Route::resource('/fulltimedepartmentsubmitdelete', 'AdminController@fulltimedepartmentsubmitdelete');
    Route::resource('/fulltimecoursesubmitdelete', 'AdminController@fulltimecoursesubmitdelete');


    Route::resource('/parttimeprogcreate', 'AdminController@parttimeprogcreate');
    Route::resource('/parttimeprogedit', 'AdminController@parttimeprogedit');
    Route::resource('/parttimeprogview', 'AdminController@parttimeprogview');
    Route::resource('/parttimeprogdelete', 'AdminController@parttimeprogdelete');
    Route::resource('/parttimeprogtypesubmitcreate', 'AdminController@parttimeprogtypesubmitcreate');
    Route::resource('/parttimedepartmentsubmitcreate', 'AdminController@parttimedepartmentsubmitcreate');
    Route::resource('/parttimecoursesubmitcreate', 'AdminController@parttimecoursesubmitcreate');
    Route::resource('/parttimeprogtypesubmitedit', 'AdminController@parttimeprogtypesubmitedit');
    Route::resource('/parttimedepartmentsubmitedit', 'AdminController@parttimedepartmentsubmitedit');
    Route::resource('/parttimecoursesubmitedit', 'AdminController@parttimecoursesubmitedit');
    Route::resource('/parttimeprogtypesubmitdelete', 'AdminController@parttimeprogtypesubmitdelete');
    Route::resource('/parttimedepartmentsubmitdelete', 'AdminController@parttimedepartmentsubmitdelete');
    Route::resource('/parttimecoursesubmitdelete', 'AdminController@parttimecoursesubmitdelete');


    Route::resource('/viewprofiles', 'AdminController@viewprofiles');
    Route::resource('/editprofiles', 'AdminController@editprofiles');
    Route::resource('/adminsubmitregistrationform', 'AdminController@adminsubmitregistrationform');
    Route::resource('/admindeleteprofile', 'AdminController@admindeleteprofile');
    Route::resource('/admineditprofile', 'AdminController@admineditprofile');
    Route::resource('/submitadmisionletter', 'AdminController@submitadmisionletter');
    Route::resource('/updateadmisionletter', 'AdminController@updateadmisionletter');
});

/// /Stripe payment route
Route::get('/addmoney/stripe', array('as'=>'addmoney.paywithstripe', 'uses'=>'AddMoneyController@payWithStripe'));
Route::post('/addmoney/stripe', array('as'=>'addmoney.stripe', 'uses'=>'AddMoneyController@postPaymentWithStripe'));