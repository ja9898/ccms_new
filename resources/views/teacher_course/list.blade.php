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
              <h3 class="box-title">Manage Teacher Course</h3>
              <span class="pull-right">
              <a href="{!! url('/teacher_course/create'); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Add Course</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Teacher</th>
				  <th>Course</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 20; $x++) {
                ?>
                  <tr>
                    <td>Teacher <?php echo $x; ?></td>
					<td>Course <?php echo $x; ?></td>
                    <td>
                      <a href="{!! url('/teacher_course/'.$x) !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>
					  <a class="btn btn-success" title="Edit"  href="{!! url('/teacher_course/'.$x.'/edit') !!}"><i class="fa fa-edit"></i> </a>
                      <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
                  <th>Teacher</th>
				  <th>Course</th>
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