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
              <h3 class="box-title">Payment Record Report - EXPORT PAGE</h3>
              <span class="pull-right">
				{{ $st_dt }}---{{ $en_dt }}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>				  
				  <th>Month Payment Date</th>
                  <th>Received Date</th>
				  <th>Student</th>
                  <th>RECURRING</th>
				  <th>SIGNUP</th>
				  <th>Amount Entered Local</th>
				  <th>Amount Entered USD</th>
				  <th>Discount</th>
				  <!--<th>Amount SCH USD</th>
				  <th>Amount SCH Local</th>-->
				  <th>Currency</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
				  $id_st = "$st_dt";
                  $id_en = "$en_dt";
				  for ($x = 1; $x <= $id_en; $x++) {
                ?>
                  <tr>
					<td><?php echo date('Y-m-d'); ?></td>
					<td><?php echo date('Y-m-d'); ?></td>
					<td>Student <?php echo $x; ?></td>
					<?php if($x<=5) { echo "<td>".$x."</td>";
									  echo "<td></td>";} ?>
					<?php if($x>5) { echo "<td></td>";
									 echo "<td>".$x."</td>"; } ?>
					<td>50</td>
                    <td>40</td>
					<td>0</td>
					<!--<td>40</td>
                    <td>50</td>-->
					<td>CAD</td>
					<td>
                      <a href="{!! url('/payment_record_report/'.$x) !!}" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>
					  <a class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
					  
					</td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
				  <th>Current Date</th>
                  <th>Received Date</th>
				  <th>Student</th>
                  <th>RECURRING</th>
				  <th>SIGNUP</th>
				  <th>Amount Entered Local</th>
				  <th>Amount Entered USD</th>
				  <th>Discount</th>
					<!--<th>Amount SCH USD</th>
				  <th>Amount SCH Local</th>-->
				  <th>Currency</th>
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