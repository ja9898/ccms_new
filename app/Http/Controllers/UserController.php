<?php
use App\User;
use App\Lead;
use App\Recording;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=\App\User::all();
        return view('admins',compact('users'));
    }
	
    public function view_lead()
    {
		//Working according to the id passed to find() but commenting for now
/* 		$leads = \App\Lead::find(1); // find the book with id 1
		echo $leads->user; // This gives you the user array that has the lead;
		echo $leads->businessName; //This give you Lead value */
		
		//$leads = \App\user::with('lead')->get();
		$leads = \App\Lead::with('user')->get();
		return view('lead.leadview', compact('leads'));

    }

	//Detailed view of the LEADS
    public function view_lead_detail($id)
    {
		$lead_id = $id;
		//Lead Details
		$lead_detail = \App\Lead::find($lead_id);
		//Recording of the lead
		$recordings = DB::table('recording')->select('*')->where('lead_id', '=',$lead_id)->get();
		return view('lead.lead_detail', compact('lead_detail','recordings'));
		
		
    }
	
	
    public function view_recording()
    {

		$record = \App\Recording::with('lead')->get();;
		return view('recording.recordingview', compact('record'));

    }
	
	//Detailed view of the RECORDINGS
    public function view_recording_detail($id)
    {
		$recording_id = $id;
		//Recording Details
		$recording_detail = \App\Recording::find($recording_id);
		return view('recording.recording_detail', compact('recording_detail'));
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adminscreate');

    }
	
	public function create_lead()
    {
        //
        return view('lead.leadcreate');

    }
	
	public function create_recording($id)
    {
        //
		$lead_id = $id;
        return view('recording.recordingcreate',[ 'lead_id' => $lead_id]);

    }	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('avatar-1'))
         {
            $file = $request->file('avatar-1');
            $avatarname=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/staff', $avatarname);
         }else{
            $avatarname="default_avatar_male.jpg";
         }
         
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phonenumber' => 'required'
        ]);

        $user= new \App\User;
        $user->fname=$request->get('fname');
        $user->lname=$request->get('lname');
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->phonenumber=$request->get('phonenumber');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $user->created_at = strtotime($format);
        $user->updated_at = strtotime($format);
        $user->avatar = $avatarname;
        $user->save();
        return redirect('admins/create')->with('success', 'Staff has been created successfully.');

    }
	
	public function store_lead(Request $request)
    {
		
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required',
			'businessName' => 'required',
			'businessNature' => 'required',
			'description' => 'required' 
        ]);
		//Customer Insertion
        $user= new \App\User;
        $user->fname=$request->get('fname');
        $user->lname=$request->get('lname');
        $user->email=$request->get('email');
        $user->phonenumber=$request->get('phonenumber');
        $user->status = 1;		
		$user->password=Hash::make(str_random(6));
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $user->created_at = strtotime($format);
        $user->updated_at = strtotime($format);
		$user->is_customer = 1;
		$user->save();
		//Getting last inserted user id to be used in LEADS
		$last_user_id = $user->id;
		
		//Lead Insertion
		$lead= new \App\Lead;
        $lead->businessName=$request->get('businessName');
        $lead->businessNature=$request->get('businessNature');
        $lead->description=$request->get('description');
        $lead->company_pro=$request->get('company_pro');echo "<br>";
        $lead->testimonials=$request->get('testimonials');echo "<br>";
        $lead->sol_ser=$request->get('sol_ser');echo "<br>";
        $lead->fb_link=$request->get('fb_link');
        $lead->tw_link=$request->get('tw_link');
        $lead->in_link=$request->get('in_link');
        $lead->li_link=$request->get('li_link');
        $lead->web_link=$request->get('web_link');
        $lead->user_id=$last_user_id;
		$lead->leadstatus=1;
		$date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $lead->created_at = strtotime($format);
        $lead->updated_at = strtotime($format);
		//dd($request->all());
		//exit;
		$lead->save();
        return redirect('lead/leadview')->with('success', 'Customer has been created successfully against the lead.');
		
		
		
    }

    public function store_recording(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'link' => 'required',
            'note' => 'required',
			'recording_file' => 'mimes:jpeg,jpg,bmp,png,mpga,wav'
        ]);		
         if($request->hasfile('recording_file'))
         {
            $file = $request->file('recording_file');
            $audio_file=time().$file->getClientOriginalName();
            $file->move(public_path().'/audio/mp3', $audio_file);
         }else{
            $audio_file="";
         }

        $record= new \App\Recording;
        $record->title=$request->get('title');
        $record->link=$request->get('link');
        $record->note=$request->get('note');
		$record->recording_file=$audio_file;
		$record->lead_id=$request->get('lead_id');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $record->created_at = strtotime($format);
        $record->updated_at = strtotime($format);
        $record->save();
        return redirect('recording/recordingview')->with('success', 'Recording Added successfully.');

    }
		
	
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=\App\User::find($id);
        return view('adminsshow',compact('user','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=\App\User::find($id);
        return view('adminsedit',compact('user','id'));
    }
	
	public function edit_lead($id)
    {
        //
		$edit_lead = \App\Lead::find($id);
		return view('lead.leadedit',['edit_lead' => $edit_lead, 'id' => $id ]);
    }

    //For Reset Password
    public function resetPassword($id)
    {
        $user=\App\User::find($id);
        return view('resetpassword',compact('user','id'));
    }
    //For Deactivate
    public function deactivate($id)
    {
        $user=\App\User::find($id);         
        $user->status=2;
        $date=now();
        $format = date_format($date,"Y-m-d");
        $user->updated_at = strtotime($format);
        $user->save();
        return redirect()->action(
            'UserController@index'
        )->with('success', 'Staff status has been deactivated.');
    }
    //For Active
    public function active($id)
    {
        $user=\App\User::find($id);         
        $user->status=1;
        $date=now();
        $format = date_format($date,"Y-m-d");
        $user->updated_at = strtotime($format);
        $user->save();
        return redirect()->action(
            'UserController@index'
        )->with('success', 'Staff status has been active.');
    }
	
	//Lead Active/Deactive
	//For Deactivate LEAD
    public function deactivate_lead($id)
    {
        $lead=\App\Lead::find($id);         
        $lead->leadstatus=2;
        $date=now();
        $format = date_format($date,"Y-m-d");
        $lead->updated_at = strtotime($format);
        $lead->save();
        return redirect()->action(
            'UserController@view_lead'
        )->with('success', 'Lead has been deactivated.');
    }
    //For Active LEAD
    public function active_lead($id)
    {
        $lead=\App\Lead::find($id);         
        $lead->leadstatus=1;
        $date=now();
        $format = date_format($date,"Y-m-d");
        $lead->updated_at = strtotime($format);
        $lead->save();
        return redirect()->action(
            'UserController@view_lead'
        )->with('success', 'Lead has been active.');
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
        
        if($request->get('changepassword')){
        //Change Password
        
            $user=\App\User::find($id); 
            //Check The Current Password Matched
            if (!Hash::check($request->get('oldpassword'), $user->password)){
                return redirect()->back()->with('error', "Current Password not matched.");
            }
            
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:6'
            ]);
    
            if ($validator->fails()) {
                return redirect('/changepassword/')
                            ->withErrors($validator)
                            ->withInput();
            }
            
            $user->password=Hash::make($request->get('password'));
            $date=date_create($request->get('date'));
            $format = date_format($date,"Y-m-d");
            $user->updated_at = strtotime($format);
            $user->save();
            return redirect()->back()->with('success', "Your Password has been changed.");


        }elseif($request->get('resetpassword')){
            //Reset Password
            $user=\App\User::find($id); 
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:6'
            ]);
    
            if ($validator->fails()) {
                return redirect('/resetpassword/'.$id)
                            ->withErrors($validator)
                            ->withInput();
            }
            
            $user->password=Hash::make($request->get('password'));
            $date=date_create($request->get('date'));
            $format = date_format($date,"Y-m-d");
            $user->updated_at = strtotime($format);
            $user->save();
            
            return redirect()->action(
                'UserController@resetPassword', ['id' => $user->id]
            )->with('success', 'Password has been reset.');
        }else{
        //Update Staff/User details
            if($request->hasfile('avatar-1'))
            {
                $file = $request->file('avatar-1');
                $avatarname=time().$file->getClientOriginalName();
                $file->move(public_path().'/img/staff', $avatarname);
            }

            $user=\App\User::find($id); 
            $this->validate(request(), [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'phonenumber' => 'required'
            ]);
            
            
            $user->fname=$request->get('fname');
            $user->lname=$request->get('lname');
            $user->email=$request->get('email');
            $user->phonenumber=$request->get('phonenumber');
            if(!$request->get('profile')){
            $user->status=$request->get('status');
            }
            $date=date_create($request->get('date'));
            $format = date_format($date,"Y-m-d");
            $user->updated_at = strtotime($format);
            if(isset($avatarname)){
                $user->avatar = $avatarname;
            }
            $user->save();
            if($request->get('profile')){
                $message='Profile details has been updated.';
            }else{
                $message='Staff details has been updated';
            }
            return redirect()->back()->with('success', $message);

            
        }

    }

    public function update_lead(Request $request, $id)
    {
        //
        $this->validate(request(), [
			'businessName' => 'required',
			'businessNature' => 'required',
			'description' => 'required' 
        ]);		
		$update_lead = \App\Lead::find($id);
		$update_lead->businessName=$request->get('businessName');
		$update_lead->businessNature=$request->get('businessNature');
		$update_lead->description=$request->get('description');
        $update_lead->company_pro=$request->get('company_pro');echo "<br>";
        $update_lead->testimonials=$request->get('testimonials');echo "<br>";
        $update_lead->sol_ser=$request->get('sol_ser');echo "<br>";
        $update_lead->fb_link=$request->get('fb_link');
        $update_lead->tw_link=$request->get('tw_link');
        $update_lead->in_link=$request->get('in_link');
        $update_lead->li_link=$request->get('li_link');
        $update_lead->web_link=$request->get('web_link');
		$update_lead->leadstatus=$request->get('leadstatus');
		$date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $update_lead->updated_at = strtotime($format);		
		$update_lead->save();
		return redirect('lead/leadview')->with('success', 'Lead Updated Successfully');
    }	

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->delete();
        return redirect()->action(
            'UserController@index' 
        )->with('success', 'Staff has been deleted.');
        
    }
	
    public function destroy_lead($id)
    {
        $user = \App\Lead::find($id);
        $user->delete();
        return redirect()->action(
            'UserController@view_lead' 
        )->with('success', 'Lead has been deleted.');
        
    }

	public function destroy_recording($id)
    {
        $user = \App\Recording::find($id);
        $user->delete();
        return redirect()->action(
            'UserController@view_recording' 
        )->with('success', 'Recording has been deleted.');
        
    }	
	
}
