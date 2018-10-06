<?php
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

use App\Notifications\RecordingPublished;
use App\Notifications\NewLead;
use Illuminate\Support\Collection;

Route::get('/', function () {
    return view('home');
});
//Notification toMail TEST Route	//Working
Route::get('/testemail', function () {
    //return view('testemail');
	$user = \App\User::first();
	$lead = \App\Lead::first();
	$check = $user->notify(new RecordingPublished($user,$lead)); 
	if($check){
		echo "EMAIL SENT";
	}
});

//Notification toDatabase TEST Route	//Working
Route::get('/testdatabase', function () {
	$user = \App\User::find(20);
	$lead = \App\Lead::find(9);
	$user->notify(new NewLead($user,$lead)); 
});

Route::get('/notify', function () {
	$users = \App\User::all();
	$letter = collect(['title' => 'New Policy Update' , 'body' =>'We have update our TOS' ]);
	Notification::send($users, new NewLead($letter));
	echo "Notification sent to all users";
});

Route::get('/markAsRead', function () {
	Auth::user()->notifications->markAsRead();
	return redirect()->back();
})->name('markAsRead');

Route::get('/markAsUnRead', function () {
	Auth::user()->notifications->markAsUnRead();
	return redirect()->back();
})->name('markAsUnRead');

 Route::get('/markAsRead_NOT/{id}', 'UserController@markAsRead_NOT')->middleware('auth');

Auth::routes();
// Two Factor Authentication
Route::get('/otp', 'TwoFactorController@showTwoFactorForm');
Route::post('/otp', 'TwoFactorController@verifyTwoFactor');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', ['as' => 'dashboard' , function () {
   return view('dashboard');
}])->middleware('auth');
//Dashboard TeamLead
Route::get('/dashboard_teamlead', ['as' => 'dashboard_teamlead' , function () {
   return view('dashboard_teamlead');
}])->middleware('auth');
//Dashboard Teacher
Route::get('/dashboard_teacher', ['as' => 'dashboard_teacher' , function () {
   return view('dashboard_teacher');
}])->middleware('auth');

Route::get('/changepassword', ['as' => 'changepassword' , function () {
    return view('changepassword');
 }])->middleware('auth');

 Route::get('/profile', ['as' => 'profile' , function () {
    return view('profile');
 }])->middleware('auth');

 Route::resource('roles', 'RolesController')->middleware('auth');


 //Sub admins/staff
 Route::get('/resetpassword/{id}', 'UserController@resetPassword')->middleware('auth');
 Route::get('/admins/deactivate/{id}', 'UserController@deactivate')->middleware('auth');
 Route::get('/admins/active/{id}', 'UserController@active')->middleware('auth');
 Route::resource('admins', 'UserController')->middleware('auth');
 
 //Category
 Route::resource('categories', 'CategoryController')->middleware('auth');
 
 
 
 //users
 Route::resource('user', 'UsersController')->middleware('auth'); 
 
 //teachers
 Route::resource('teacher', 'TeacherController')->middleware('auth');
 
 //parents
 Route::resource('parent', 'ParentController')->middleware('auth');
 
 //students
 Route::resource('student', 'StudentController')->middleware('auth');

 //teamlead assign
 Route::resource('teamlead_assign', 'TeamleadAssignController')->middleware('auth');
 Route::post('/teamlead_assign/select-ajax', ['as'=>'/teamlead_assign/select-ajax','uses'=>'TeamleadAssignController@selectAjax']);
 
 //teacher timing
 Route::resource('teacher_timing','TeacherTimingController')->middleware('auth');
 
 //teacher course
 Route::resource('teacher_course','TeacherCourseController')->middleware('auth');
 
 //schedule
 Route::resource('schedule','ScheduleController')->middleware('auth');
 Route::post('/schedule/availableTeacher', ['as'=>'/schedule/availableTeacher','uses'=>'ScheduleController@showAvailableTeacher']);
 Route::get('/schedule/createMakeRegular/{id}','ScheduleController@createMakeRegular')->middleware('auth')->name('createMakeRegular');
 
 //daily schedule
 Route::resource('daily_schedule','DailyScheduleController')->middleware('auth');
 Route::get('/daily_schedule/startClass/{id}','DailyScheduleController@startClass')->middleware('auth');
 Route::get('/daily_schedule/endClass/{id}','DailyScheduleController@endClass')->middleware('auth');
 
 //Trial Confirmation
 Route::resource('trial_confirmation','TrialConfirmationController')->middleware('auth');
 Route::get('/trial_confirmation/active/{id}','TrialConfirmationController@active')->middleware('auth');
 
 //student classes
 Route::resource('student_classes','ClassDetailsController')->middleware('auth');
 
 //Invoice
 Route::resource('invoice','InvoiceController')->middleware('auth');
 Route::get('/invoice/invoice_preview/{id}','InvoiceController@invoice_preview')->middleware('auth');
 
 //schedule parent
 Route::resource('schedule_parent','ScheduleParentController')->middleware('auth'); 
 Route::post('/schedule_parent/search','ScheduleParentController@index')->middleware('auth')->name('schedule_parent.search'); 
 Route::get('/schedule_parent/createInvoice/{id}','ScheduleParentController@createInvoice')->middleware('auth');
 
 //pending
 Route::resource('pending','PendingController')->middleware('auth'); 
 
 //total payments
 Route::resource('total_payments','TotalPaymentsController')->middleware('auth'); 
 Route::get('/total_payments/pay/{id}','TotalPaymentsController@pay')->middleware('auth');
 