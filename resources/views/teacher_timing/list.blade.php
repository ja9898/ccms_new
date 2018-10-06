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
              <h3 class="box-title">Manage Teacher Timingss</h3>
              <span class="pull-right">
              <a href="{!! url('/teacher_timing/create'); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Add Timings</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Teacher</th>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thur</th>
				  <th>Fri</th>
                  <th>Sat</th>
				  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 20; $x++) {
                ?>
                  <tr>
                    <td>Teacher <?php echo $x; ?></td>				  
					<td>ON</td>
                    <td>ON</td>
                    <td>ON</td>
                    <td>OFF</td>
                    <td>OFF</td>
                    <td>OFF</td>
                    <td>22:00</td>
                    <td>07:00</td>
                    <td>
                      <a href="{!! url('/teacher_timing/'.$x) !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>
					  <a class="btn btn-success" title="Edit"  href="{!! url('/teacher_timing/'.$x.'/edit') !!}"><i class="fa fa-edit"></i> </a>
                      <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
                  <th>Mon</th>
                  <th>Tue</th>
                  <th>Wed</th>
                  <th>Thur</th>
				  <th>Fri</th>
                  <th>Sat</th>
				  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Teacher</th>
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