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
              <h3 class="box-title">Trial Confirmation</h3>
              <span class="pull-right">
              <a href="{!! url('/schedule/create'); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Add Schedule</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Start Time</th>
				  <th>Start Date</th>
				  <th>End Date</th>
				  <th>Student</th>
                  <th>Teacher</th>
				  <th>Agent</th>
				  <th>Class Days</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 5; $x++) {
                ?>
                  <tr>
					<td>09:00</td>
					<td><?php echo date('d-m-Y')?></td>
					<td><?php echo date('d-m-Y')?></td>
					<td>Studentt <?php echo $x; ?></td>
					<td>Teacher <?php echo $x; ?></td>
					<td>Agent <?php echo $x; ?></td>
                    <td>Mon,Tues,Wed</td>
					<td>                      
					  <a href="{!! url('/trial_confirmation/active/'.$x); !!}"  class="btn btn-info" title="Confirm Trial"><i class="fa fa-check"></i> </a>
                    </td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
                  <th>Start Time</th>
				  <th>Start Date</th>
				  <th>End Date</th>
				  <th>Student</th>
                  <th>Teacher</th>
				  <th>Agent</th>
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