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
              <h3 class="box-title">Student Classes</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Student</th>
				  <th>Teacher</th>
				  <th>TeamLead</th>
				  <th>Start time</th>
				  <th>Class Start time</th>
				  <th>Class End time</th>
				  <th>Class Duration</th>
				  <th>Date</th>
				  <th>Actions</th>			  
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 10; $x++) {
                ?>
                  <tr>
					<td>Student <?php echo $x; ?></td>
					<td>Teacher <?php echo $x; ?></td>
					<td>xyz TL</td>
					<td>14:00</td>
					<td>14:20</td>
					<td>14:58</td>
					<td>00:40:00</td>
					<td><?php echo date('Y-m-d'); ?></td>
					<td>
                      <a href="{!! url('/student_classes/'.$x) !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>
					
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
				  <th>TeamLead</th>
				  <th>Start time</th>
				  <th>Class Start time</th>
				  <th>Class End time</th>
				  <th>Class Duration</th>
				  <th>Date</th>
				  <th>Actions</th>				  
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