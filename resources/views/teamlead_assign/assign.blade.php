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













.facet-container{
  width: 330px;
}
.right {
  float: right;
}
.left {
  float: left;
}
p {
  clear: both;
  padding-top: 1em;
}
.facet-list {
  list-style-type: none;
  margin: 0;
  padding: 0;
  margin-right: 10px;
  background: #eee;
  padding: 5px;
  width: 143px;
  min-height: 1.5em;
  font-size: 0.85em;
}
.facet-list li {
  margin: 5px;
  padding: 5px;
  font-size: 1.2em;
  width: 120px;
}
.facet-list li.placeholder {
  height: 1.2em
}
.facet {
  border: 1px solid #bbb;
  background-color: #fafafa;
  cursor: move;
}
.facet.ui-sortable-helper {
  opacity: 0.5;
}
.placeholder {
  border: 1px solid orange;
  background-color: #fffffd;
}
</style>
	<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script> 

    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Assign Teachers</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="form-horizontal" action="{!! url('/admins'); !!}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body" >
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="usertype_teamlead" class="col-sm-3 control-label">Select Type</label>
                  <div class="col-sm-9">
                    <select id="usertype_teamlead" name="usertype_teamlead" class="form-control">
						<option value="0">Select Type</option>
						<option value="8">Teacher Teamlead</option>
						<option value="9">Agent Teamlead</option>					
					</select>
					@if ($errors->has('usertype_teamlead'))
                          <span class="text-red">
                              <strong>{{ $errors->first('usertype_teamlead') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="lead_id" class="col-sm-3 control-label">Teamlead Name</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="lead_id" id="lead_id">
                    
                    </select>
					@if ($errors->has('lead_id'))
                          <span class="text-red">
                              <strong>{{ $errors->first('lead_id') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
			<div class="col-md-12">
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-12">
							<label>Available Teachers</label>
							<ul id="allFacets" class="todo-list">
							<?php
										  for ($x = 1; $x <= 10; $x++) {
										?>
							  <li class="facet">
								<!-- drag handle -->
								<span class="handle">
									<i class="fa fa-ellipsis-v"></i>
									<i class="fa fa-ellipsis-v"></i>
								</span>
								Available <?php echo $x; ?>
							  </li>
							  <?php
										  }
										?>
							</ul>
						</div>
					</div>	
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-12">
							<label>Assigned Teachers</label>
							<ul id="userFacets" class="todo-list">
								<?php
										  for ($y = 11; $y <= 20; $y++) {
										?>
								<li class="facet">
									<!-- drag handle -->
									<span class="handle">
										<i class="fa fa-ellipsis-v"></i>
										<i class="fa fa-ellipsis-v"></i>
									</span>
									Assigned <?php echo $y; ?>
								</li>
								  <?php
										  }
										?>
							</ul>
						</div>
					</div>
				</div>
				
			</div>	  
			</div>
          <!-- /.row -->


			
			
			
			</div>		
              
			<div class="box-footer">
                <a href="{!! url('/dashboard'); !!}" class="btn btn-default">Cancel</a>
                <!--<button type="submit" class="btn btn-info pull-right">Add</button>-->
              </div>
              <!-- /.box-footer -->
	</div>
              <!-- /.box-body -->
              
            </form>
</div>

<script>
$(function() {
    $("#allFacets, #userFacets").sortable({
      connectWith: "ul",
      placeholder: "placeholder",
      delay: 150
    })
    .disableSelection()
    .dblclick( function(e){
      var item = e.target;
      if (e.currentTarget.id === 'allFacets') {
        //move from all to user
        $(item).fadeOut('fast', function() {
          $(item).appendTo($('#userFacets')).fadeIn('slow');
        });
      } else {
        //move from user to all
        $(item).fadeOut('fast', function() {
          $(item).appendTo($('#allFacets')).fadeIn('slow');
        });
      }
    });
  });

</script>

<script type="text/javascript">
  $("select[name='usertype_teamlead']").change(function(){
      var usertype_teamlead = $(this).val();
	  console.log(usertype_teamlead);
      var token = $("input[name='_token']").val();
	  //alert(usertype_teamlead);
	  $.ajax({
          url: "<?php echo route('/teamlead_assign/select-ajax') ?>",
		  dataType : 'json',
          method: 'POST',
          data: {usertype_teamlead:usertype_teamlead,_token:token},
          success: function(data) {
			  console.log(token);
			  console.log(data);
            $("select[name='lead_id'").html('');
            $("select[name='lead_id'").html(data.options);
          }
      });
  });
</script>
@endsection