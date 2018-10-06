@extends('layouts.mainlayout')
@section('content')
@if(session('success'))
    <script>
      $( document ).ready(function() {
        swal("Success", "{{session('success')}}", "success");
      });
      
    </script>
@endif
<!-- some CSS styling changes and overrides -->
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Staff</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="form-horizontal" action="{!! url('/admins'); !!}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body" >
            <div class="row">
              <div class="col-md-4 text-center">
                  <div class="kv-avatar">
                      <div class="file-loading">
                          
                          <input id="avatar-1" name="avatar-1" type="file">
                      </div>
                  </div>
                  <div class="kv-avatar-hint"><small>Select file < 1000 KB</small></div>
              </div> 
              <div class="col-md-8">
                <div class="form-group">
                  <label for="fname" class="col-sm-3 control-label">First Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" autocomplete="off" value="{{ old('fname') }}" require >
                    @if ($errors->has('fname'))
                          <span class="text-red">
                              <strong>{{ $errors->first('fname') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="lname" class="col-sm-3 control-label">Last Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="{{ old('lname') }}" autocomplete="off" require>
                    @if ($errors->has('lname'))
                          <span class="text-red">
                              <strong>{{ $errors->first('lname') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off" require>
                    @if ($errors->has('email'))
                          <span class="text-red">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" require>
                    @if ($errors->has('password'))
                          <span class="text-red">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="phonenumber" class="col-sm-3 control-label">Phone Number</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" value="{{ old('phonenumber') }}" autocomplete="off" require>
                    @if ($errors->has('phonenumber'))
                          <span class="text-red">
                              <strong>{{ $errors->first('phonenumber') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

				<div class="form-group">
                  <label for="status" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <select disabled name="status" class="form-control">
						<option value="1">Active</option>
						<option value="2">Deactivate</option>					
					</select>
					@if ($errors->has('status'))
                          <span class="text-red">
                              <strong>{{ $errors->first('status') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>










                <div class="form-group">
                  <label for="user_type" class="col-sm-3 control-label">User type</label>

                  <div class="col-sm-9">
                      <select name="user_type" class="form-control">
						<option value="0">Select Type</option>
						<option value="1">Super Admin</option>
						<option value="2">Admin</option>
						<option value="3">Teacher</option>
						<option value="4">Student</option>
						<option value="5">Agent</option>
						<option value="6">Accounts</option>
						<option value="7">Floor Assistant</option>
						<option value="8">Teacher TeamLead</option>
						<option value="9">Agent TeamLead</option>
						<option value="10">Human Resource</option>
						<option value="11">Main Teacher TeamLead</option>
						<option value="12">Main Agent TeamLead</option>
						<option value="13">IT Department</option>
						<option value="14">Quality Assurance</option>						
					  </select>
                    @if ($errors->has('user_type'))
                          <span class="text-red">
                              <strong>{{ $errors->first('user_type') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="gender" class="col-sm-3 control-label">Gender</label>

                  <div class="col-sm-9">
                    <select name="gender" class="form-control">
						<option value="0">Select Gender</option>
						<option value="1">Male</option>
						<option value="2">Female</option>					
					</select>
					@if ($errors->has('gender'))
                          <span class="text-red">
                              <strong>{{ $errors->first('gender') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="countryId" class="col-sm-3 control-label">Country</label>
                  <div class="col-sm-9">
					<select class="form-control m-bot15" name="countryId">
						@if ($country_list!='')
							@foreach($country_list as $key => $country)
								<option value="{{ $key }}" >{{ $country }}</option>    
							@endforeach
						@endif
					</select>
				  @if ($errors->has('countryId'))
                          <span class="text-red">
                              <strong>{{ $errors->first('countryId') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="empShift" class="col-sm-3 control-label">Employee Shift</label>

                  <div class="col-sm-9">
                    <select name="empShift" class="form-control">
						<option value="0">Select Shift</option>
						<option value="1">Morning</option>
						<option value="2">Night</option>
						<option value="3">Evening</option>			
					</select>
					@if ($errors->has('empShift'))
                          <span class="text-red">
                              <strong>{{ $errors->first('empShift') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>					
				
				<div class="form-group">
					  <label for="appointDate" class="col-sm-3 control-label">Appointment Date</label>
					  <div class="col-sm-9">
						<input type="date" class="form-control" id="appointDate" name="appointDate" placeholder="Start Date" autocomplete="off" />
					  </div>      
				</div>
				<div class="form-group">
					  <label for="confirmDate" class="col-sm-3 control-label">Confirm Date</label>
					  <div class="col-sm-9" >
						<input type="date" class="form-control" id="confirmDate" name="confirmDate" placeholder="End Date" autocomplete="off"  />
					  </div>   
				</div>			

              </div>
              </div>

          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/user'); !!}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
            </form>
</div>
@endsection