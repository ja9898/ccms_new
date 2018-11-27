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
        <form class="form-horizontal" action="{!! url('/regular_class_statistics/search'); !!}" method="post" enctype="multipart/form-data">
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
                <label>Select Main Teamlead</label>
                <select name="mttlId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Main Teamlead" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="all">All</option>
                  @foreach($main_teamleads as $key => $main_teamlead)
                    <option value="{{$key}}">{{$main_teamlead}} </option>
                  @endforeach                
                </select>
                
              </div>
			  
			  <div class="form-group col-md-12">
                <label>Select Teamlead</label>
                <select name="ttlId" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Teamlead" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="all">All</option>
                  @foreach($teamleads as $key => $teamlead)
                    <option value="{{$key}}">{{$teamlead}} </option>
                  @endforeach                
                </select>
                
              </div>


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
              <h3 class="box-title">Regular Class Statistics</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example4" class="display responsive nowrap" style="width:100%">
                <thead>
                <tr>
				  <th>Serial</th>
				  <th>Main TeamLead</th>
				  <th>TeamLead</th>
                  <th>Teacher</th>
				  <th>Count</th>
				  <th>Business</th>
                </tr>
                </thead>
                <tbody>
				  
				  <?php
				  $business = 0;
				  $sum_total_usd = 0;
                  for ($x = 1; $x <= 10; $x++) {
                ?>
                  <tr>
					<td> <?php echo $x; ?></td>
					<td>TeamLead abc</td>
					<td>Main TeamLead xyz</td>
					<td>Teacher <?php echo $x; ?></td>
                    <td><?php echo $x+2; ?></td>
                    <td><?php echo $business = $business+100; 
					$sum_total_usd+=$business;?></td>
                  </tr>

                <?php
                  }
                ?>
				  
                </tbody>
                <tfoot>
                <tr bgcolor="#fff">
					<td colspan="5" align="right"><b>Sum</b></td>
					<td><?php echo $sum_total_usd;?></td>
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