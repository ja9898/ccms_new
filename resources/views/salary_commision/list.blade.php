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
        <form class="form-horizontal" action="{!! url('/salary_commision/search'); !!}" method="post" enctype="multipart/form-data">
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
                <label>Select Teamlead</label>
                <select name="ttlId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Teamlead" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="all">All</option>
                  @foreach($teamleads as $key => $teamlead)
                    <option value="{{$key}}">{{$teamlead}} </option>
                  @endforeach                
                </select>
              </div>
			  
			  <div class="form-group col-md-12">
                <label>Select Teacher</label>
                <select name="teacherId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select teacher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="all">All</option>
                  @foreach($teachers as $key => $teacher)
                    <option value="{{$key}}">{{$teacher}} </option>
                  @endforeach                
                </select>
              </div>			  

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
              <h3 class="box-title">Salary commision</h3>
              <span class="pull-right">
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example4" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>TeamLead</th>
                  <th>Teacher</th>
				  <th>Student</th>
				  <th>Current Month Due Date</th>
				  <th>Received Date</th>
				  <th>Received Amount</th>
				  <th>Pak Rs.</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
				  $business = 0;
				  $sum_total_usd = 0;
				  $business_pak = 0;
				  $sum_total_pak = 0;
				  
                  for ($x = 1; $x <= 10; $x++) {
                ?>
                  <tr>
					<td>TeamLead abc</td>
					<td>Teacher <?php echo $x; ?></td>
					<td>Student <?php echo $x; ?></td>
					<td><?php echo date('Y-m-d'); ?></td>					
					<td><?php echo date('Y-m-d'); ?></td>					
                    <td><?php echo $business = $business+10; 
					$sum_total_usd+=$business;?></td>
					<td><?php echo $business_pak = $business_pak+100; 
					$sum_total_pak+=$business_pak;?></td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr bgcolor="#fff">
					<td colspan="5" align="right"><b>Sum</b></td>
					<td><?php echo $sum_total_usd;?></td>
					<td><?php echo $sum_total_pak;?></td>
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