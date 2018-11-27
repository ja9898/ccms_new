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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Previous Month</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				  <?php
				  $sum_usd = 30;
				  $sum_usd_deduct = 28;
				  $sum_total_usd = 0;
				  $sum_total_usd_deduct = 0;
				  
                  for ($x = 1; $x <= 20; $x++) {
                ?>
					<?php $sum_usd;
					$sum_total_usd+=$sum_usd; ?>
					
					<?php $sum_usd_deduct;
					$sum_total_usd_deduct+=$sum_usd_deduct; ?>

                <?php
                  }
                ?>

					<h3>Sum:
					<a href="{!! url('/pending/pre_month_pending') !!}"><?php echo $sum_total_usd;?></a></h3>
					<?php $sum_total_usd_deduct;?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  
		  
		  
		  
		  
		 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Current Month</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            

				  <?php
				  $sum_usd = 100;
				  $sum_usd_deduct = 95;
				  $sum_total_usd = 0;
				  $sum_total_usd_deduct = 0;
                  for ($x = 1; $x <= 30; $x++) {
                ?>
					<?php $sum_usd;
					$sum_total_usd+=$sum_usd; ?>

					<?php $sum_usd_deduct;
					$sum_total_usd_deduct+=$sum_usd_deduct; ?>
                <?php
                  }
                ?>

					<h3>Sum:
					<a href='/pending/curr_month_pending'><?php echo $sum_total_usd;?></a></h3>
					<?php $sum_total_usd_deduct;?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->   

@endsection