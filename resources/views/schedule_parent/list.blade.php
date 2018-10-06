@extends('layouts.mainlayout')
@section('content')
@if(session('success'))
    <script>
      $( document ).ready(function() {
        swal("Success", "{{session('success')}}", "success");
      });
      
    </script>
@endif
@if(session('failed'))
    <script>
      $( document ).ready(function() {
        swal("Failed", "{{session('failed')}}", "error");
      });
      
    </script>
@endif

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{!! url('/schedule_parent/search'); !!}" method="post" enctype="multipart/form-data">
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
                <label>Select Staff</label>
                <select name="parentid" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Satff" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="all">All</option>
                  @foreach($parents as $key => $parent)
                    <option value="{{$key}}">{{$parent}} </option>
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
              <h3 class="box-title">Manage Schedule Parent</h3>&nbsp;
			  	@if($selected_parent)
					<h4 class="box-title">Parent Selected : </h4>{{ $selected_parent }} 
				@else
					Nothing
				@endif
              <span class="pull-right">
              <a href="{!! url('/schedule_parent/createInvoice/'.$selected_parent); !!}" class="btn btn-info"><span class="fa fa-plus"></span> Make Invoice</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Student</th>
				  <th>Parent</th>
                  <th>Teacher</th>
				  <th>Course</th>
				  <th>Class Days</th>
				  <th>Dues</th>
				  <th>Dues (USD)</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
                  for ($x = 1; $x <= 3; $x++) {
                ?>
                  <tr>
					<td>Student <?php echo $x; ?></td>
					<td>Parnet <?php echo $x; ?></td>
					<td>Teacher <?php echo $x; ?></td>
					<td>Course <?php echo $x; ?></td>
					<td>Mon,Tues,Wed</td>
					<td>50</td>
					<td>30</td>
                    <td>Regular</td>
					<td>
                      <a class="btn btn-warning" title="Create Invoice"  href="{!! url('/schedule_parent/createInvoice/'.$selected_parent) !!}"><i class="fa fa-newspaper-o"></i> </a>
                    </td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr>
                  <th>Student</th>
				  <th>Parent</th>
                  <th>Teacher</th>
				  <th>Course</th>
				  <th>Class Days</th>
				  <th>Dues</th>
				  <th>Dues (USD)</th>
				  <th>Status</th>
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