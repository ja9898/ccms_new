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
              <h3 class="box-title">Pay</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
            <form class="form-horizontal" action="{!! url('/admins'); !!}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body" >
            <div class="row">
              <div class="col-md-12">
			  
				<div class="form-group">
					  <label for="signInDate" class="col-sm-3 control-label">SignUp Date(Read only)</label>
					  <div class="col-sm-6">
						<label type="date" class="control-label" id="signInDate" 
						name="signInDate" placeholder="" autocomplete="off" 
						onchange='date_rec_date_signin()'> <?php echo date('Y-m-d'); ?> <label/>
					  </div>      
				</div>
				
				<div class="form-group">
					  <label for="studentID" class="col-sm-3 control-label">Student Name(Static)</label>
					  <div class="col-sm-6">
						<label for="studentID" class="control-label">xyz</label>
					  </div>      
				</div>
				
				<div class="form-group">
					  <label for="teacherID" class="col-sm-3 control-label">Teacher Name(Static)</label>
					  <div class="col-sm-6">
						<label for="teacherID" class="control-label">xyz</label>
					  </div>      
				</div>
				
				<div class="form-group">
					  <label for="courseID" class="col-sm-3 control-label">Course(Static)</label>
					  <div class="col-sm-6">
						 <label for="courseID" class="control-label">abc</label>
					  </div>      
				</div>
				
				<div class="form-group">
					  <label for="paydate" class="col-sm-3 control-label">Start Time(Static)</label>
					  <div class="col-sm-6">
						<label for="paydate" class="control-label">01:00</label>
					  </div>      
				</div>

				<div class="form-group">
					  <label for="paydate" class="col-sm-3 control-label">Recurring/Paying date</label>
					  <div class="col-sm-6">
						<input type="date" class="form-control" id="paydate" name="paydate" placeholder="" autocomplete="off" readonly='readonly' />
					  </div>      
				</div>
				
				
				
				
				
				
				
				
				<div class="form-group">
					  <label for="dateReceived" class="col-sm-3 control-label">Date Received</label>
					  <div class="col-sm-6">
						<input type="date" class="form-control" id="dateReceived" name="dateReceived" placeholder="" autocomplete="off" 	/>
					  </div>      
				</div>
				
				<div class="form-group">
					  <label for="transactionID" class="col-sm-3 control-label">Transaction ID</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="transactionID" name="transactionID" placeholder="" autocomplete="off" />
					  </div>  
					  @if ($errors->has('transactionID'))
                          <span class="text-red">
                              <strong>{{ $errors->first('transactionID') }}</strong>
                          </span>
                      @endif
				</div>
				
				<div class="form-group">
					  <label for="paymentMode" class="col-sm-3 control-label">Method</label>
					  <div class="col-sm-6">
							<select id="method_new" name="method_new" class="form-control m-bot15" onchange='update_payment_method();'>
							@if ($paymentMode!='')
								@foreach($paymentMode as $key => $paymentModes)
								<option value="{{ $key }}" >{{ $paymentModes }}</option>							
								@endforeach
							@endif

							</select>
							@if ($errors->has('method_new'))
							  <span class="text-red">
								  <strong>{{ $errors->first('method_new') }}</strong>
							  </span>
							@endif
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="currency" class="col-sm-3 control-label">Currency</label>
					  <div class="col-sm-6">
							<select id="currency" name="currency" class="form-control m-bot15">
							@if ($currency!='')
								@foreach($currency as $key => $curr)
								<option value="{{ $key }}" >{{ $curr }}</option>							
								@endforeach
							@endif
							</select>
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="cardSave_ccv_code" class="col-sm-3 control-label">CCV CODE</label>
					  <div class="col-sm-6">
						<input type="text" style="visibility:hidden;" class="form-control" id="cardSave_ccv_code" name="cardSave_ccv_code" placeholder="" />
					  </div>  
				</div>
				<div class="form-group">
					  <label for="VirtualTerminal_name" class="col-sm-3 control-label">Card holder name</label>
					  <div class="col-sm-6">
						<input type="text" style="visibility:hidden;" class="form-control" id="VirtualTerminal_name" name="VirtualTerminal_name" placeholder="" />
					  </div>  
				</div>
				<div class="form-group">
					  <label for="VirtualTerminal_number" class="col-sm-3 control-label">Card number</label>
					  <div class="col-sm-6">
						<input type="text" style="visibility:hidden;" class="form-control" id="VirtualTerminal_number" name="VirtualTerminal_number" placeholder="" />
					  </div>  
				</div>
				<div class="form-group">
					  <label for="VirtualTerminal_date" class="col-sm-3 control-label">Expiry date</label>
					  <div class="col-sm-6">
						<input type="text" style="visibility:hidden;" class="form-control" id="VirtualTerminal_date" name="VirtualTerminal_date" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="bank_payment_image" class="col-sm-3 control-label">Select file</label>
					  <div class="col-sm-6">
						<input class='form-control' style="visibility:hidden;" type="file" name="bank_payment_image" id="bank_payment_image">						
                        <span class="text-red" style="visibility:hidden;">Only JPG,PNG files are allowed</span>
					  </div>
				</div>
				
				<div class="form-group">
					  <label for="bankName" class="col-sm-3 control-label">Bank Selection</label>
					  <div class="col-sm-6">
							<select id="bankName" style="visibility:hidden;" name="bankName" class="form-control m-bot15">
							@if ($bankNameList!='')
								@foreach($bankNameList as $key => $bankName)
								<option value="{{ $key }}" >{{ $bankName }}</option>							
								@endforeach
							@endif
							</select>
					  </div>
				</div>
				
				
				
				
				
				<div class="form-group">
					  <label for="amountDefaultNew" class="col-sm-3 control-label">Actual Slot rate (Editable)</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="amountDefaultNew" name="amountDefaultNew" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="amountOriginalNew" class="col-sm-3 control-label">Invoiced Amount</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="amountOriginalNew" name="amountOriginalNew" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="totalReceivedNew" class="col-sm-3 control-label">Net Received</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="totalReceivedNew" name="totalReceivedNew" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="feeDeductNew" class="col-sm-3 control-label">Paypal Fee</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="feeDeductNew" name="feeDeductNew" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="discountNew" class="col-sm-3 control-label">Discount Given</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="discountNew" name="discountNew" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="additionalFee" class="col-sm-3 control-label">Additional Fee</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="additionalFee" name="additionalFee" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="amountUsdSimpleNew" class="col-sm-3 control-label">Net Converted Amount USD</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="amountUsdSimpleNew" name="amountUsdSimpleNew" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="sender_name" class="col-sm-3 control-label">Sender Name</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
					  <label for="email" class="col-sm-3 control-label">Email</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="email" name="email" placeholder="" />
					  </div>  
				</div>
				
				<div class="form-group">
                  <label class="col-sm-3 control-label">Comments</label>
				    <div class="col-sm-6">
                      <textarea class="form-control" rows="3" id="comments" name="comments" placeholder="Enter Comments for teacher..."></textarea>
				    </div>
				</div>
				
				<div class="form-group">
					  <label for="grade" class="col-sm-3 control-label">Recording Link</label>
					  <div class="col-sm-6">
						<input type="text" class="form-control" id="record_link" name="record_link" placeholder="" />
					  </div>  
				</div>

              </div>
              </div>

          </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{!! url('/total_payments'); !!}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
            </form>
</div>
<script>
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>

<script type="text/javascript">
//Function to change DATE RECEIVED with SIGNIN DATE in make_regular.php
function date_rec_date_signin()
{
	var signInDate = document.getElementById('signInDate').value;
	document.getElementById('dateReceived').value = signInDate;
	document.getElementById('paydate').value = signInDate;
	if(signInDate = document.getElementById('dateReceived').value)
	{
		alert("SignIn Date MATCHES Date Received & Recurring/Paying Date");
	}
	else
	{
		alert("SignIn Date DOESN'T MATCH Date Received");
	}
}

//Function to update METHOD in the transaction_new.php
function update_payment_method()
{
	var pay_method_new_value = document.getElementById('method_new');
	var pay_method_new_text = pay_method_new_value.options[pay_method_new_value.selectedIndex].text;
	/* document.getElementById('method').value = pay_method_new_text;
	if(pay_method_new_text = document.getElementById('method').value)
	{
		//alert("Method READONLY populated");
	}
	else
	{
		//alert("Method READONLY NOT populated");
	} */
	var ccv_code_value = document.getElementById('method_new');
	var ccv_code_text = ccv_code_value.options[ccv_code_value.selectedIndex].text;
	//alert(ccv_code_text);
	cardSave_ccv_code = inputID=document.getElementById('cardSave_ccv_code');
	
	//Virtual termincal fields alomg with card save NEWLY ADDED // 28-11-16
	VirtualTerminal_name = inputID=document.getElementById('VirtualTerminal_name');
	VirtualTerminal_number = inputID=document.getElementById('VirtualTerminal_number');
	VirtualTerminal_date = inputID=document.getElementById('VirtualTerminal_date');
	//Bank payment image upload field along with CARDSAVE and VIRTUAL TERMINAL //17-01-17
	WU_BANK_PHY_payment_image = inputID=document.getElementById('bank_payment_image');
	//Bank Selection //27-07-18
	BANK_NAME = inputID=document.getElementById('bankName');
	if(ccv_code_text=="Card Save")
	{
		//alert("You have selected "+ccv_code_text+" - Enabling CCV Code Textbox");
		cardSave_ccv_code.style.visibility='visible';
		//Virtual terminal- Name,Number,Expiry
		VirtualTerminal_name.style.visibility='hidden';
		VirtualTerminal_number.style.visibility='hidden';
		VirtualTerminal_date.style.visibility='hidden';
		//Bank payment image upload field making visible
		WU_BANK_PHY_payment_image.style.visibility='hidden';
		//Bank Selection
		BANK_NAME.style.visibility='hidden';
	}
	else if(ccv_code_text=="Virtual Terminal")
	{
		cardSave_ccv_code.style.visibility='visible';
		//Virtual terminal- Name,Number,Expiry
		VirtualTerminal_name.style.visibility='visible';
		VirtualTerminal_number.style.visibility='visible';
		VirtualTerminal_date.style.visibility='visible';
		//Bank payment image upload field making visible
		WU_BANK_PHY_payment_image.style.visibility='hidden';
		//Bank Selection
		BANK_NAME.style.visibility='hidden';
	}
	else if(ccv_code_text=="Western Union" || ccv_code_text=="Bank" || ccv_code_text=="Physical payment") //Newly added for bank payment //17-01-17
	{
		
		cardSave_ccv_code.style.visibility='hidden';
		//Virtual terminal- Name,Number,Expiry
		VirtualTerminal_name.style.visibility='hidden';
		VirtualTerminal_number.style.visibility='hidden';
		VirtualTerminal_date.style.visibility='hidden';
		//Bank payment image upload field making visible
		WU_BANK_PHY_payment_image.style.visibility='visible';
		//Bank Selection
		BANK_NAME.style.visibility='visible';
	}
	else
	{
		cardSave_ccv_code.style.visibility='hidden';
		//Virtual terminal- Name,Number,Expiry
		VirtualTerminal_name.style.visibility='hidden';
		VirtualTerminal_number.style.visibility='hidden';
		VirtualTerminal_date.style.visibility='hidden';
		//Bank payment image upload field making visible
		WU_BANK_PHY_payment_image.style.visibility='hidden';
		//Bank Selection
		BANK_NAME.style.visibility='hidden';		
	}
}


</script>
@endsection