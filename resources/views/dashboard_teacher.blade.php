@extends('layouts.mainlayout')
@section('content')
 
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Salary</span>
              <span class="info-box-number">Rs. 18000<small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-pie-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Recurring Commision</span>
              <span class="info-box-number">Rs. 11222</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-percent"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Trial Commision</span>
              <span class="info-box-number">Rs. 400</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
	  
      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Students Recurring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p>Total Students:</p>

              <div class="progress active">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                  12
                </div>
              </div>
              <p>Recurring Received From: </p>

              <div class="progress active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                  8
                </div>
              </div>
              <p>Remaining</p>

              <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                  4
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Today's Classes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<p>Total :</p>
              <div class="progress">
                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">16 Classes</span>
                </div>
              </div>
			<p>Present :</p>  
              <div class="progress">
                <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                  <span class="">4 Classes</span>
                </div>
              </div>
			<p>Absent :</p>  
              <div class="progress">
                <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                  <span class="">3 Classes</span>
                </div>
              </div>
			<p>Ongoing :</p>  
              <div class="progress">
                <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                  <span class="">6 Classes</span>
                </div>
              </div>
			<p>Remaining :</p>  
              <div class="progress">
                <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                  <span class="">3 Classes</span>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->	  




<div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daily Schedule</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example4" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>			
				  <th>Student</th>
				  <th>Course</th>
				  <th>Start Time</th>
				  <th>Class Days</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 10; $x++) {
                ?>
                  <tr>
					<td>Student <?php echo $x; ?></td>	
					<td>Course <?php echo $x; ?></td>
					<td>14:00</td>
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
				  <th>Student</th>
				  <th>Course</th>
				  <th>Start Time</th>
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