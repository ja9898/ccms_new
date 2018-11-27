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
        <form class="form-horizontal" action="{!! url('/teamlead_teacher_report/search'); !!}" method="post" enctype="multipart/form-data">
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
			  <div class="form-group col-md-6">
			  <div class="col-sm-12">
                <label>Select Main Teamlead</label>
                <select name="mttlId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Teamlead" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @foreach($main_teamleads as $key => $main_teamlead)
                    <option value="{{$key}}">{{$main_teamlead}} </option>
                  @endforeach                
                </select>
              </div>
			  </div>
			  
			  <div class="form-group col-md-6">
			  <div class="col-sm-12">
                <label>Select Teamlead</label>
                <select name="ttlId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Teamlead" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @foreach($teamleads as $key => $teamlead)
                    <option value="{{$key}}">{{$teamlead}} </option>
                  @endforeach                
                </select>
              </div>
			  </div>
			  
			  <div class="form-group col-md-6">
			  <div class="col-sm-12">
                <label>Select Teacher</label>
                <select name="teacherId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select teacher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @foreach($teachers as $key => $teacher)
                    <option value="{{$key}}">{{$teacher}} </option>
                  @endforeach                
                </select>
              </div>
			  </div>

			  <div class="form-group col-md-6">
			  <div class="col-sm-12">
                <label>Select Status</label>
                <select name="std_status" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select teacher" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @foreach($stdStatus as $key => $std_Status)
                    <option value="{{$key}}">{{$std_Status}} </option>
                  @endforeach                
                </select>
              </div>
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
              <h3 class="box-title">Teamlead Teacher Report</h3>
              <span class="pull-right">
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example4" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Student</th>
				  <th>Teacher</th>
				  <th>Email</th>
				  <th>Ext ID</th>
				  <th>Country</th>
				  <th>Course</th>
				  <th>TeamLead</th>
				  <th>Main TeamLead</th>
				  <th>Dues</th>				  
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
					<td>Student <?php echo $x; ?></td>
					<td>Teacher <?php echo $x; ?></td>
					<td>test@test.com</td>
					<td><?php echo 76010+1; ?></td>
					<td>Australia</td>
					<td>English</td>
					<td>abc</td>
					<td>xyz</td>
					<td>50</td>					
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                  <th>Student</th>
				  <th>Teacher</th>
				  <th>Email</th>
				  <th>Ext ID</th>
				  <th>Country</th>
				  <th>Course</th>
				  <th>TeamLead</th>
				  <th>Main TeamLead</th>
				  <th>Dues</th>	
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