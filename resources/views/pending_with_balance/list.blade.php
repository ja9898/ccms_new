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
        <form class="form-horizontal" action="{!! url('/pending_with_balance/search'); !!}" method="post" enctype="multipart/form-data">
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
              <h3 class="box-title">Pending with Balance</h3>
              <span class="pull-right">
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example4" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Days</th>
                  <th>Pending</th>
				  <th>Received</th>
				  <th>Remaining</th>
				  <th>Balance</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
				  $pending = 10000;
				  $received = 1000;
				  $remain = 500;
				  $pending_sum = 0;
				  $received_sum = 0;
				  $remain_sum = 0;
				  $balance = 0;
				  
                  for ($x = 1; $x <= 30; $x++) {
                ?>
                  <tr>
					<td><?php echo $x; ?></td>
                    <td><?php echo $pending = $pending+10; 
					$pending_sum+=$pending;?></td>
					
                    <td><?php echo $received = $received+10; 
					$received_sum+=$received;?></td>
					
				
                    <td><?php echo $remain = $pending - $received;
					$remain_sum+=$remain;?></td>
					
					<td><?php echo $balance = $balance + $remain; ?></td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr bgcolor="#fff">
					<td colspan="1" align="right"><b>Sum</b></td>
					<td><?php echo $pending_sum;?></td>
					<td><?php echo $received_sum;?></td>
					<td><?php echo $remain_sum;?></td>
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