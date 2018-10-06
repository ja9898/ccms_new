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
              <h3 class="box-title">Edit Course </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="form-horizontal" action="{!! url('/user/1/edit'); !!}" method="post" enctype="multipart/form-data">
            @csrf

			  <div class="box-body" >
				<div class="row">
				  <div class="col-md-8">
					

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
					  <label for="courseID" class="col-sm-3 control-label">Course</label>
					  <div class="col-sm-6">
							<select id="courseID" name="courseID[]" class="form-control m-bot15">
					  
							@if ($course_list!='')
								@foreach($course_list as $key => $course)
									@if ($key>0)
									
								<option value="{{ $key }}" {{ $key == $id ? 'selected="selected"' : '' }}>{{ $course }}</option>
								
									@endif
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
					

				  </div>
				  </div>

			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/teacher_timing'); !!}" class="btn btn-default">Cancel</a>
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