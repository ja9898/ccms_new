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
    <div class="col-md-12">
        <form class="form-horizontal" action="{!! url('/payment_record_report/search'); !!}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="box box-success collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Advance Filter</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="display: none;">
            
            <!--Search Form Begins -->
           

              <div class="form-group col-md-12">
                  <label>Select Date Range:</label>
  
                  <div class="input-group">
                    <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                      <span>{{date('F d, Y')}} - {{date('F d, Y')}}</span>
                      <input type="hidden" name="dateFrom" id="dateFrom" value="{{date('Y-m-d')}}">
                      <input type="hidden" name="dateTo" id="dateTo" value="{{date('Y-m-d')}}">
                      <i class="fa fa-caret-down"></i>
                    </button>
                  </div>
                </div>

              <script>
                
                 $(document).ready(function() { 
                  $('.select2').select2({
                      placeholder: "Select Staff",
                      multiple: false,
                  }); 
                  $('.select2').change(
                    console.log("123123")
                  );
                 
                  //Date range as a button
                  $('#daterange-btn').daterangepicker(
                    {
                      ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                      },
                      startDate: moment().subtract(29, 'days'),
                      endDate  : moment()
                    },
                    function (start, end) {
                      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                      $('#dateFrom').val(start.format('YYYY-MM-DD'));
                      $('#dateTo').val(end.format('YYYY-MM-DD'));
                    }
                  );

                  });
                


              </script>
            <!-- Search Form Ends -->
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-primary" id="searchRecords">Search
                <i class="fa fa-search"></i></button>
            </div>
        </div>
        <!-- /.box -->
      </form>
      </div>
</div>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payment Record Report</h3>
              <span class="pull-right">
              <!--<a href="{!! url('/payment_record_report/export_csv/1/10'); !!}" class="btn btn-success">
			  <span class="fa fa-file-excel-o"></span> Export CSV</a>-->
			  
				@if($selected_fromDate || $selected_toDate)
					<h4 class="box-title">Date Range : </h4>{{ $selected_fromDate }} to {{ $selected_toDate }}
				@else
					Nothing
				@endif
              <span class="pull-right">
              <a href="{!! url('/payment_record_report/export_csv/'.$selected_fromDate.'/'.$selected_toDate); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Export CSV</a>

			  
			  
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
                  for ($x = 1; $x <= 10; $x++) {
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