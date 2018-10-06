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
              <h3 class="box-title">Edit Schedule </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="form-horizontal" action="{!! url('/user/1/edit'); !!}" method="post" enctype="multipart/form-data">
            @csrf

        <div class="box-body" >
            <div class="row">
              <div class="col-md-12">
				
                
				<div class="form-group">
					<label class="col-sm-3 control-label">Student</label>
					<div class="col-sm-6">
						<select id="search-studnet" name="search-studnet" class="form-control select2" style="width: 100%;">
						  <?php for ($x=1; $x<=10; $x++) { ?>
							<option value='1' {{ $x==$id ? 'selected="selected"' : ''  }}>Student <?php echo $x; ?></option>
						  <?php } ?>
						</select>
					</div>
					<!-- /.form-group -->			
				</div>

				
				<div class="form-group">
                  <label for="pakTime" class="col-sm-3 control-label">Pakistan time</label>
                  <div class="col-sm-6">
                      <select name="pakTime" id="pakTime" class="form-control"><option value=""></option><option value="0" selected="selected">Select  </option><option value="1">00:00</option><option value="2">00:30</option><option value="3">01:00</option><option value="4">01:30</option><option value="5">02:00</option><option value="6">02:30</option><option value="7">03:00</option><option value="8">03:30</option><option value="9">04:00</option><option value="10">04:30</option><option value="11">05:00</option><option value="12">05:30</option><option value="13">06:00</option><option value="14">06:30</option><option value="15">07:00</option><option value="16">07:30</option><option value="17">08:00</option><option value="18">08:30</option><option value="19">09:00</option><option value="20">09:30</option><option value="21">10:00</option><option value="22">10:30</option><option value="23">11:00</option><option value="24">11:30</option><option value="25">12:00</option><option value="26">12:30</option><option value="27">13:00</option><option value="28">13:30</option><option value="29">14:00</option><option value="30">14:30</option><option value="31">15:00</option><option value="32">15:30</option><option value="33">16:00</option><option value="34">16:30</option><option value="35">17:00</option><option value="36">17:30</option><option value="37">18:00</option><option value="38">18:30</option><option value="39">19:00</option><option value="40">19:30</option><option value="41">20:00</option><option value="42">20:30</option><option value="43">21:00</option><option value="44">21:30</option><option value="45">22:00</option><option value="46">22:30</option><option value="47">23:00</option><option value="48">23:30</option></select>
                    @if ($errors->has('pakTime'))
                          <span class="text-red">
                              <strong>{{ $errors->first('pakTime') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

				<div class="form-group">
					  <label for="startDate" class="col-sm-3 control-label">Start Date</label>
					  <div class="col-sm-6">
						<input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" autocomplete="off" />
					  </div>      
				</div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Select</label>
                  <div class="col-sm-6">
					  <select class="form-control" id="slotDuration" name="slotDuration">
						<option>30 mins</option>
						<option>60 mins</option>
						<option>90 mins</option>
					  </select>
					  @if ($errors->has('courseID'))
								  <span class="text-red">
									  <strong>{{ $errors->first('courseID') }}</strong>
								  </span>
					  @endif
				  </div>
                </div>
				
				<div class="form-group">
					  <label for="courseID" class="col-sm-3 control-label">Course</label>
					  <div class="col-sm-6">
							<select id="courseID" name="courseID" class="form-control m-bot15">
							@if ($course_list!='')
								@foreach($course_list as $key => $course)
								<option value="{{ $key }}" {{ $key == $id ? 'selected=selected' : '' }} >{{ $course }}</option>							
								@endforeach
							@endif

							</select>
							@if ($errors->has('courseID'))
							  <span class="text-red">
								  <strong>{{ $errors->first('courseID') }}</strong>
							  </span>
							@endif
					  </div>
				</div>
				
				<div class="form-group">
				  <label for="classType" class="col-sm-3 control-label">Class Type</label>
				  <div class="col-sm-6">
						<select id="classType" name="classType" class="form-control m-bot15">
						@if ($plan!='')
							@foreach($plan as $key => $classType)
							<option value="{{ $key }}" {{ $key == $id ? 'selected=selected' : '' }} >{{ $classType }}</option>							
							@endforeach
						@endif
						</select>
						@if ($errors->has('classType'))
						  <span class="text-red">
							  <strong>{{ $errors->first('classType') }}</strong>
						  </span>
					  @endif
				  </div>
				</div>
		
				<div class="form-group">
                  <label for="teacherID" class="col-sm-3 control-label">Teacher</label>
                  <div class="col-sm-6">
					<select class="form-control m-bot15" name="teacherID">
						<?php for($x=1; $x<=10; $x++) { ?>
							<option value=$x {{ $x == $id ? 'selected=selected' : '' }} >Teacher <?php echo $x;?></option>    
						<?php } ?>
					</select>
						@if ($errors->has('teacherID'))
							  <span class="text-red">
								  <strong>{{ $errors->first('teacherID') }}</strong>
							  </span>
						@endif
                  </div>
                </div>
				
				<div class="form-group">
					  <label for="skypetext" class="col-sm-3 control-label">Skype</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="skypetext" name="skypetext" placeholder="Enetr skype id" autocomplete="off" />
					  </div>  
					  @if ($errors->has('skypetext'))
                          <span class="text-red">
                              <strong>{{ $errors->first('skypetext') }}</strong>
                          </span>
                      @endif
				</div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Comments</label>
				    <div class="col-sm-6">
                      <textarea class="form-control" rows="3" id="comments" name="comments" placeholder="Enter Comments for teacher..."></textarea>
				    </div>
				</div>
				

              </div>
              </div>

        </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/schedule'); !!}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
</div>
<script>
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
@endsection