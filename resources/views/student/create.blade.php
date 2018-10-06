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
              <h3 class="box-title">Add Student</h3>
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

                <!--<div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off" require>
                    @if ($errors->has('email'))
                          <span class="text-red">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>-->

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

                <!--<div class="form-group">
                  <label for="phonenumber" class="col-sm-3 control-label">Phone Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" value="{{ old('phonenumber') }}" autocomplete="off" require>
                    @if ($errors->has('phonenumber'))
                          <span class="text-red">
                              <strong>{{ $errors->first('phonenumber') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>-->
				
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
						<option value="4" selected>Student - 4</option>
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
						<option value="15">Parent</option>	
					  </select>
						@if ($errors->has('user_type'))
                          <span class="text-red">
                              <strong>{{ $errors->first('user_type') }}</strong>
                          </span>
						@endif
                  </div>
                </div>
				
              <div class="form-group">
                <label class="col-sm-3 control-label">Parent</label>
                <div class="col-sm-9">
					<select class="form-control select2" style="width: 100%;">
					  <option  value='1' selected="selected">Parent20</option>
					  <option value='2'>Parent30</option>
					  <option value='3'>Parent40</option>
					  <option value='4'>Parent50</option>
					  <option value='5'>Parent60</option>
					  <option value='6'>Parent70</option>
					  <option value='7'>Parent80</option>
					  <option value='8'>Parent8889</option>
					</select>
				</div>
				<!-- /.form-group -->			
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
											

              </div>
              </div>

          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/student'); !!}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
            </form>
</div>
@endsection