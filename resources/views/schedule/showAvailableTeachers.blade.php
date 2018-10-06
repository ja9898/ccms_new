
<option>--- Select Teacher ---</option>
@if(!empty($leads) or $leads!=0)
  
    <?php for($x=1; $x<=10; $x++) { ?>
									<option value="$x" >Teacher <?php echo $x;?></option>    
	<?php } ?>
@else
	<option value="0" >No Data</option>
@endif


