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
              <h3 class="box-title">End Class</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="form-horizontal" action="{!! url('/admins'); !!}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body" >
            <div class="row">
              <div class="col-md-12">
				
				<!--Science Teachers Part -->
				<h3 class="box-title">Science Teacher:</h3>
				<div class="form-group">
					<label for="startDate" class="col-sm-3 control-label">Status:</label>
					<div class="col-sm-9">
						
							<input type="radio" name="status" value="0">
							<label for="status">Absent</label>
						
						<br>               
						
							<input type="radio" name="status" value="1">
							<label for="status">Present</label>
						
					</div>
				</div>
				
				<div class="form-group">
					  <label for="grade" class="col-sm-3 control-label">Grade</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="grade" name="grade" placeholder="" />
					  </div>  
				</div>
				
				
				<div class="form-group">
					  <label for="bank_payment_image" class="col-sm-3 control-label">Select file</label>
					  <div class="col-sm-6">
						<input class='form-control' type="file" name="lecture_file" id="lecture_file">						
                        <span class="text-red" >Only JPG are allowed(200KB)</span>
					  </div>
				</div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Lesson Details</label>
				    <div class="col-sm-6">
                      <textarea class="form-control" rows="3" id="lessonDetails" name="lessonDetails" placeholder="Enter Lesson Details..."></textarea>
				    </div>
				</div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Comments</label>
				    <div class="col-sm-6">
                      <textarea class="form-control" rows="3" id="comments" name="comments" placeholder="Enter Comments..."></textarea>
				    </div>
				</div>
				
				<!--Quran Teachers Part -->
				<h3 class="box-title">Quran Teacher:</h3>
				<div class="form-group">
					  <label for="dua" class="col-sm-3 control-label">Dua</label>
					  <div class="col-sm-6">
							<select id="dua" name="dua" class="form-control m-bot15" >
								<option value='0'>Select Dua</option>
								<option value='1'>Dua1</option>
								<option value='2'>Dua2</option>
								<option value='3'>Dua3</option>
							</select>
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="prayer" class="col-sm-3 control-label">Prayer</label>
					  <div class="col-sm-6">
							<select id="prayer" name="prayer" class="form-control m-bot15" >
								<option value='0'>Select Prayer</option>
								<option value='1'>prayer1</option>
								<option value='2'>prayer2</option>
								<option value='3'>prayer3</option>
							</select>
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="kalima" class="col-sm-3 control-label">kalima</label>
					  <div class="col-sm-6">
							<select id="kalima" name="kalima" class="form-control m-bot15" >
								<option value="" selected="selected">Select Kalima </option>
                                <option value="Kalima 1">Kalima 1</option>
                                <option value="Kalima 2">Kalima 2</option>
                                <option value="Kalima 3">Kalima 3</option>
                                <option value="Kalima 4">Kalima 4</option>
                                <option value="Kalima 5">Kalima 5</option>
                                <option value="Kalima 6">Kalima 6</option>
							</select>
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="lesson" class="col-sm-3 control-label">Lesson Recited</label>
					  <div class="col-sm-6">
							<select id="lesson" name="lesson" class="form-control m-bot15" >
								<option value='0'>Select Lesson</option>
								<option value='1'>Lesson1</option>
								<option value='2'>Lesson2</option>
								<option value='3'>Lesson3</option>
							</select>
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="surah" class="col-sm-3 control-label">Surah</label>
					  <div class="col-sm-6">
							<select id="surah" name="surah" class="form-control m-bot15" >
								<option value='0'>Select Surah</option>
								<option value='1'>Suarh1</option>
								<option value='2'>Suarh2</option>
								<option value='3'>Suarh3</option>
							</select>
					  </div>
				</div>
				
				
				<div class="form-group">
                  <label for="verseFrom" class="col-sm-3 control-label">VerseFrom</label>
                  <div class="col-sm-6">
                      <select class="form-control m-bot15" name="verseFrom">
						@if ($verses!='')
							@foreach($verses as $key => $verse)
								<option value="{{ $key }}" >{{ $verse }}</option>    
							@endforeach
						@endif
					</select>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="verseTo" class="col-sm-3 control-label">VerseTo</label>
                  <div class="col-sm-6">
                      <select class="form-control m-bot15" name="verseTo">
						@if ($verses!='')
							@foreach($verses as $key => $verse)
								<option value="{{ $key }}" >{{ $verse }}</option>    
							@endforeach
						@endif
					</select>
                  </div>
                </div>
				
				<div class="form-group">
					  <label for="record_link" class="col-sm-3 control-label">Recording link</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="record_link" name="record_link" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Comments</label>
				    <div class="col-sm-6">
                      <textarea class="form-control" rows="3" id="comments_quran" name="comments_quran" placeholder="Enter Comments..."></textarea>
				    </div>
				</div>
				
              </div>
              </div>

          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/daily_schedule'); !!}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">End Class</button>
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

<script type="text/javascript">
  $("select[name='classType']").change(function(){
	
	if ($("select[name='classType']")[0].selectedIndex <= 0) {
		$("select[name='teacherID'").html('');
    //alert('Please select Class days.');
    $("select[name='classType']").focus();
    return false;
}
      var classType = $(this).val();
	  console.log(classType);
      var token = $("input[name='_token']").val();
	  //alert(usertype_teamlead);
	  $.ajax({
          url: "<?php echo route('/schedule/availableTeacher') ?>",
		  dataType : 'json',
          method: 'POST',
          data: {classType:classType,_token:token},
          success: function(data) {
			  console.log(token);
			  console.log(data);
            $("select[name='teacherID'").html('');
            $("select[name='teacherID'").html(data.options);
          }
      });
  });
</script>
@endsection