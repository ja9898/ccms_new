@extends('layouts.mainlayout')
@section('content')
@if(session('success'))
    <script>
      $( document ).ready(function() {
        swal("Success", "{{session('success')}}", "success");
      });
      
    </script>
@endif
<!-- some CSS styling changes and overrides -->
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>

    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Record Report - Details</h3>
				<span class="pull-right">
					<a href="{!! url('/payment_record_report/'.$id.'/edit' ); !!}" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a>  
				</span>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="row"> 
              <div class="col-md-12">
			  <h3>Student Information:</h3>
			  </div>
			  
			  <div class="col-md-12">
				<table class="table table-striped">
			    <tr>
                    <td><b>Current Month Date</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>
				<tr>
                    <td><b>Received Date</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>
                <tr>
                    <td width="25%"><b>Student </b></td>
                    <td width="75%">Student {{ $id }} {{ $id_en }}</td>
                </tr>
				
				<tr>
                    <td width="25%"><b>Recurring</b></td>
                    <td width="75%"><?php if($id<=5) { echo $id; } ?></td>
                </tr>
				<tr>
                    <td width="25%"><b>Signup</b></td>
                    <td width="75%"><?php if($id>5) { echo $id; } ?></td>
                </tr>
				</table>
			  </div>	



			  <div class="col-md-12">
			  <h3>Payment Details:</h3>
			  </div>
			  <div class="col-md-12">
				<table class="table table-striped">				
                <tr>
                    <td width="25%"><b>Amount Entered Local</b></td>
                    <td width="75%">50</td>
                </tr>
                <tr>
                    <td width="25%"><b>Amount Entered USD	</b></td>
                    <td width="75%" >40</td>
                </tr>
				
				<tr>
                    <td width="25%"><b>Discount</b></td>
                    <td width="75%">0</td>
                </tr>
                <tr>
                    <td width="25%"><b>Amount SCH USD</b></td>
                    <td width="75%">40</td>
                </tr>
                <tr>
                    <td width="25%"><b>Amount SCH Local	</b></td>
                    <td width="75%">50</td>
                </tr>
                <tr>
                    <td width="25%"><b>Currency</b></td>
                    <td width="75%">CAD</td>
                </tr>
				
				
				<tr>
                    <td width="25%"><b>Course</b></td>
                    <td width="75%">English</td>
                </tr>
				<tr>
                    <td width="25%"><b>Transation ID	</b></td>
                    <td width="75%">123123123123</td>
                </tr>
				<tr>
                    <td width="25%"><b>Mehtod</b></td>
                    <td width="75%">Paypal</td>
                </tr>
				
				<tr>
                    <td><b>Operator</b></td>
                    <td>Operator {{ $id }}</td>
                </tr>
				<tr>
                    <td><b>Comments</b></td>
                    <td>Lorun ipsum</td>
                </tr>
				<tr>
                    <td><b>Teacher</b></td>
                    <td>Teacher {{ $id }}</td>
                </tr>
				<tr>
                    <td><b>Teamlead</b></td>
                    <td>Teamlead {{ $id }}</td>
                </tr>
				<tr>
                    <td><b>Main Teamlead</b></td>
                    <td>Main Teamlead {{ $id }}</td>
                </tr>
				<tr>
                    <td><b>Sender</b></td>
                    <td>Sender Name</td>
                </tr>
				<tr>
                    <td><b>Email</b></td>
                    <td>test@test.com</td>
                </tr>
				<tr>
                    <td><b>Accounts DATES and FORM</b></td>
                    <td>Accounts</td>
                </tr>				
                <tr>
                    <td><b>Created At</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>
                <tr>
                    <td><b>Updated At</b></td>
                    <td><?php echo date('d-m-Y')?></td>
                </tr>				
				</table>
			  </div>                  

              </div>
              </div>
			  <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/payment_record_report'); !!}" class="btn btn-default">Back</a>
              </div>
              <!-- /.box-footer -->
          </div>
		  
		  
	  <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Physical/Bank/WesternUnion Images</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
		  				
				<ul class="mailbox-attachments clearfix">
						
							<li>
								<div class="mailbox-attachment-info">
									<p class="mailbox-attachment-name">Sample Image</p>
											<span class="mailbox-attachment-size">
												<a href="{{ URL::to('/') }}/topic/files/1537347171Hydrangeas.jpg" target="_blank" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
											</span>
								</div>
							</li>
						</ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->	  
		  

</div>

@endsection