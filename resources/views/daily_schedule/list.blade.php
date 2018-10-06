@extends('layouts.mainlayout')
@section('content')
@if(session('success'))
    <script>
      $( document ).ready(function() {
        swal("Success", "{{session('success')}}", "success");
      });
      
    </script>
@endif

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daily Schedule</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Due Date</th>				
				  <th>Student</th>
				  <th>username</th>
				  <th>password</th>
				  <th>Course</th>
				  <th>Status</th>
				  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Class Days</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 10; $x++) {
                ?>
                  <tr>
				    <td><?php echo $x+5; ?></td>
					<td>Student <?php echo $x; ?></td>	
					<td>username_<?php echo $x; ?></td>
					<td>password_<?php echo $x; ?></td>
					<td>Course <?php echo $x; ?></td>
					<td>Regular</td>
					<td>14:00</td>
					<td>15:00</td>
                    <td>Mon,Tues,Wed</td>
					<td>
                      <a href="{!! url('/daily_schedule/'.$x) !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>
					  <a class="btn btn-danger" title="Start Class"  href="{!! url('/daily_schedule/startClass/'.$x) !!}"><i class="glyphicon glyphicon-blackboard"></i> </a>
                      <a class="btn btn-success" title="End Class"  href="{!! url('/daily_schedule/endClass/'.$x) !!}"><i class="fa fa-times"></i> </a>
                      
					
                    </td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
				  <th>Due Date</th>				
				  <th>Student</th>
				  <th>username</th>
				  <th>password</th>
				  <th>Course</th>
				  <th>Status</th>
				  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Class Days</th>
				  <th>Action</th>
                </tr>
                </tfoot>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->   

@endsection