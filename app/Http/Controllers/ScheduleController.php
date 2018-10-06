<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Lead;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('schedule.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Remove Later
		$course_list=array('Select Course','MS Office','Graphics Designinig','Web Designing','Web Development-PHP','AutoCad','Bundle','Design and Development','Basic Networking','English','CCNA','Quran Pak','Web Development-.Net','Physics','Chemistry','Biology','Math-Minor','Urdu','French','C++','ACCA','Accounts','Economics','Science','Calculus','Statistics','Math-Major','Assignments','QURAN WITH TAJWEED','HIFZ QURAN','TRANSLATION OF QURAN','ISLAMIC EDUACTION','SMM');
		$plan=array('Select Plan','Monday,Tuesday,Wednesday','Thursday,Friday,Saturday','Monday-Friday','Monday-Saturday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		return view('schedule.create',compact('course_list','plan'));		
    }
	
	public function showAvailableTeacher(Request $request)
	{
		if($request->ajax()){
    		$leads = DB::table('leads')->where('user_id',$request->classType)->pluck("businessName","id")->all();
			$data = view('schedule.showAvailableTeachers',compact('leads'))->render();
    		return response()->json(['options'=>$data]);
    	}

	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		return view('schedule.show',compact('id'));		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Remove Later
		$course_list=array('Select Course','MS Office','Graphics Designinig','Web Designing','Web Development-PHP','AutoCad','Bundle','Design and Development','Basic Networking','English','CCNA','Quran Pak','Web Development-.Net','Physics','Chemistry','Biology','Math-Minor','Urdu','French','C++','ACCA','Accounts','Economics','Science','Calculus','Statistics','Math-Major','Assignments','QURAN WITH TAJWEED','HIFZ QURAN','TRANSLATION OF QURAN','ISLAMIC EDUACTION','SMM');
		$plan=array('Select Plan','Monday,Tuesday,Wednesday','Thursday,Friday,Saturday','Monday-Friday','Monday-Saturday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		return view('schedule.edit',compact('course_list','plan','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	//Make Regular
	public function createMakeRegular($id)
    {
        //Remove Later
		$paymentMode=array('Payment Mode','Paypal','Western Union','Bank','Physical payment','Cash','Card Save','Others','Virtual Terminal');
		$bankNameList=array('Select Bank','HBL','ABL','ALFALAH','UBL','MCB','Soneri','Other');
		$currency=array('Select Currency','GBP','USD','CAD','AUD','NZD','SGD','PKR');
  
		return view('schedule.createMakeRegular',compact('id','paymentMode','bankNameList','currency'));
    }
	
}
