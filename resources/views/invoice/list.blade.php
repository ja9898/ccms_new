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
              <h3 class="box-title">Manage Send Invoice</h3>
              <span class="pull-right">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="" class="table table-bordered" style="width:100%">
                <thead>
                <tr>
				  <th>checkbox</th>
                  <th>Student Name</th>
                  <th>Sign in Date</th>
                  <th>Per month Dues</th>
                  <th>Per month Dues(US)</th>
				  <th>Status</th>
                  <th>Invoice Duration</th>
				  <th>Invoice Amount(US)</th>
				  <th>Invoice Amount</th>			  
                </tr>
                </thead>
                <tbody>
				  
				  <?php
				  $onemonth=1;
				  $original_curr_converted_output=0;
				  $grand_total_local_currency = 0;
				  //$showonly = $id ;
                  for ($x = 1; $x <= 3; $x++) {
                ?>
                  <tr>
				  					<td class="tbHead" align="center" bgcolor="#FFFFFF"> <input type="checkbox" name="child_list[]"  value="<?php echo  $x; ?>"  checked="checked"  onclick="calculate_total();"/></td>
                <input type="hidden" name="schedule_id_list[]"  value="<?php echo  $x; ?>"  /></td>
                
                    <td>Student <?php echo $x; ?></td>
					<td><?php echo date('d M Y'); ?></td>
					<td>50 (CAD)</td>
					<td>30 (USD)</td>
					<td>Regular</td>
					
					<td align="center">  
					   <select name="months_<?php echo $x; ?>" id="months_<?php echo $x; ?>"  onchange="calculate_total()">
					   <option value="0" <?php   if($x==0){?> selected="selected"<?php }?>>0 Month</option>
					   <option value="1" <?php   if($x==$onemonth){?> selected="selected"<?php }?>>1 Month</option>
					   <?php for($i=2;$i<=10;$i++){ ?>
					   <option value="<?php echo $i; ?>"><?php echo $i; ?> Months</option>
					   <?php }?>
					  </select>    
					   <select name="days_<?php echo $x; ?>" id="days_<?php echo $x; ?>"  onchange="calculate_total()">
					   <?php for($i=0;$i<=30;$i++){?>
					   <option value="<?php echo $i; ?>" <?php   if($x==$i){?> selected="selected"<?php }?>><?php echo $i; ?> days</option>
					   <?php }?>
					  </select>
					</td>
					
					<!-- USD Currency -->
					<td width="9%" class="tbHead" align="center"  style="font-size:12px;" >$<input name="send_amount_<?php echo  $x; ?>"   type="text" id="send_amount_<?php echo  $x; ?>" 
					value="<?php echo $original_curr_usd=30; ?>" size="6" maxlength="7" readonly="readonly"  />
					<?php //Original currency to USD conversion output<<<<<<<<<<<<<<<<<<<<<<
					$original_curr_converted_output += $original_curr_usd;
					//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ?>
					<input type="hidden" value="<?php echo 30; ?>" id="orignal_<?php echo  $x; ?>" name="orignal_<?php echo  $x; ?>" />
					<input type="hidden" value="<?php echo 30/30; ?>" id="per_day_amount_<?php echo $x; ?>" name="per_day_amount_<?php echo  $x; ?>" />
					</td>
					
					
					
                    <!-- Org Currency -->
					<td width="7%" class="tbHead" align="center"  style="font-size:12px;" >
                    <input name="send_local_amount_<?php echo  $due_amount_local_currency = $original_curr_usd+20; ?>"   type="text" id="send_local_amount_<?php echo  $x; ?>" value="<?php echo $original_curr_usd+20; ?>" size="6" maxlength="7" readonly="readonly"  />
					<?php 	 
						$grand_total_local_currency += $due_amount_local_currency; 	
					?>
					<input type="hidden" value="<?php echo ($due_amount_local_currency); ?>" id="local_orignal_<?php echo  $x; ?>" name="local_orignal_<?php echo  $x; ?>" />
					<input type="hidden" value="<?php echo ($due_amount_local_currency)/30; ?>" id="local_per_day_amount_<?php echo $x; ?>" name="local_per_day_amount_<?php echo  $x; ?>" />  
					</td>
					

                  </tr>

                <?php $onemonth=$onemonth+1;
                  }
                ?>
				  
                </tbody>
                <tfoot>
                
				<tr bgcolor="#fff">
                <?php if($x != 'USD') { ?>
               	<td colspan="7" align="right">&nbsp;</td>
                <?php }else{ ?>
               	<td colspan="7" align="right">&nbsp;</td>
                <?php }?>
                <td width="7%" colspan="" align="left" bgcolor="#fff"><b>&nbsp;&nbsp;&nbsp;&nbsp;Grand Total: </b><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$<input name="grand_total"  type="text" id="grand_total" size="6" maxlength="7" readonly="readonly"  value="<?php echo 	$original_curr_converted_output;?>"/></td>
                <?php if($x != 'USD') { ?>
                <td width="7%" colspan="" align="left" bgcolor="#fff"><b>&nbsp;&nbsp;&nbsp;&nbsp;Grand Total:</b><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 'CAD'; ?><input name="grand_total_local_currency"  type="text" id="grand_total_local_currency" size="6" maxlength="7" readonly="readonly"  value="<?php echo $grand_total_local_currency; ?>"/></td>
                <?php } ?>
                </tr>

                </tfoot>
              </table>

            </div>
            <!-- /.box-body -->
			
			<div class="box-footer">
                <a href="{!! url('/schedule_parent'); !!}" class="btn btn-default">Cancel</a>
                
				<a href="{!! url('/invoice/invoice_preview/'.$id); !!}" class="btn btn-info pull-right">Next</a>
                
            </div>
            <!-- /.box-footer -->
			
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->   


<script type="text/javascript">
function calculate_total(){
	var total =0;
	local_total = 0 ;
	var reg_fee =0;
	var chks = document.getElementsByName('child_list[]');	//having ids of child  chks[i].value
	for (var i = 0; i < chks.length; i++)
		{
		if(chks[i].checked==true)
		{	
			var months		=document.getElementById('months_'+chks[i].value).value;
			var days 		=document.getElementById('days_'+chks[i].value).value;
			var per_day 	=document.getElementById('per_day_amount_'+chks[i].value).value;
			var per_month 	=document.getElementById('orignal_'+chks[i].value).value;
			var perday = per_month/30;
			var days_amount =Math.round(perday* days);
			//alert(per_day+'*'+days+'='+Math.round(days_amount));
		document.getElementById('send_amount_'+chks[i].value).value = parseInt(months)*parseInt(document.getElementById('orignal_'+chks[i].value).value)+days_amount;
		total = parseInt(total)+parseInt(document.getElementById('send_amount_'+chks[i].value).value);
		//alert(total);
		
		
			var local_months		=	document.getElementById('months_'+chks[i].value).value;
			var local_days 			=	document.getElementById('days_'+chks[i].value).value;
			var local_per_day 		=	document.getElementById('local_per_day_amount_'+chks[i].value).value;
			var local_per_month 	=	document.getElementById('local_orignal_'+chks[i].value).value;
			var local_perday 		= 	local_per_month/30;
			var local_days_amount 	=	Math.round(local_perday * days);
			
			
		//	alert(local_perday+'*'+local_days+'='+Math.round(local_days_amount));
		// alert(Math.round(days_amount));
		//	return false ;
		document.getElementById('send_local_amount_'+chks[i].value).value = parseInt(months)* parseInt(document.getElementById('local_orignal_'+chks[i].value).value) + local_days_amount;
		local_total = parseInt(local_total)+parseInt(document.getElementById('send_local_amount_'+chks[i].value).value);
		//alert(parseInt(local_total)+ parseInt(reg_fee));
		//return false ;
		
		//reg_fee = parseInt(reg_fee)+parseInt(document.getElementById('registration_fee_'+chks[i].value).value);
		}
	}
	document.getElementById('grand_total').value =  parseInt(total)+ parseInt(reg_fee);
	//alert(parseInt(local_total)+ parseInt(reg_fee));
	//return false ;
	document.getElementById('grand_total_local_currency').value =  parseInt(local_total)+ parseInt(reg_fee);
}
	
function selectAll(main){
var chks = document.getElementsByName('child_list[]');	
if(main.checked == true){
		for (var i = 0; i < chks.length; i++)
		{
		chks[i].checked = true;
		}
}
if(main.checked == false){
		for (var i = 0; i < chks.length; i++)
		{
		chks[i].checked = false;
		}
}
	calculate_total();
}

function validate_create_invoice(){
	/*		if(document.getElementById('grand_total').value =='0')
		{
			alert('Grand total amount is zero.');
				return false;
		}*/
		
			var chks = document.getElementsByName('child_list[]');	
			for (var i = 0; i < chks.length; i++)
			{
				if(chks[i].checked == true)
					return true;
			}
	return false;		
}

function parseDate(str) {
    var mdy = str.split('-')
    return new Date(mdy[0], mdy[1]-1, mdy[2]);
}


function calculate_trial_amount(std_id){
var perday = (document.getElementById(std_id+'_due_amount').value)/30;
var today = new Date();
var d1 = parseDate(document.getElementById(std_id+'_due_date').value);
var oneday = 86400000;
var dayscount =  Math.round((d1-today) / oneday);
document.getElementById(std_id+'_days').value =dayscount+' days invoice';
document.getElementById(std_id+'_amount').value =Math.round(dayscount*perday);
	//	alert(perday+'*'+dayscount+'='+dayscount*perday);
}


function validate_trial(){
	var error=0;
	 $('.select_class').each(function() {
            if ($(this).val() == "0") {
				error=error+1;
               // return false;
            }
			
});
if(error>0){

	alert('Select Due Date for trials');
	return false;
}
}	
function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
}	
</script>

	  
	  
	  
@endsection