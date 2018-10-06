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
              <h3 class="box-title">Total Payments</h3>
              <span class="pull-right">
              <a href="{!! url('/schedule/create'); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Add Schedule</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  
				  <th>Student</th>
                  <th>Teacher</th>
				  <th>Course</th>
                  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Class Days</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 10; $x++) {
                ?>
                  <tr>
					<td>Student <?php echo $x; ?></td>
					<td>Teacher <?php echo $x; ?></td>
					<td>Course <?php echo $x; ?></td>
					<td>09:00</td>
                    <td>17:00</td>
                    <td>Mon,Tues,Wed</td>
                    <td>Regular</td>
					<td>
                      <a class="btn btn-warning" title="Total payments"  href="{!! url('/total_payments/pay/'.$x) !!}"><i class="fa fa-gear"></i> </a>
                      
					  <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
                  <th>Student</th>
                  <th>Teacher</th>
				  <th>Course</th>
                  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Class Days</th>
				  <th>Status</th>
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