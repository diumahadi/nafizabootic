<script>

$(document).ready(function(){
	
	jQuery.ajaxSetup({
	  beforeSend: function() {
		 $('#wait').show();
	  },
	  complete: function(){
		 $('#wait').hide();
	  },
	  success: function() {}
	});
	
	/*Form Onload Action Performed*/
	clearForm();
	
	/*Clear Button Action Performed*/
	$('#btnClear').click(function(){
		clearForm();
	});
	
	
	/*Submit Button Action Performed*/
	$("form#submit_form").submit(function(event) {		
		
		if ($.trim($('#old_password').val()) === "") {
			alert('Insert Old Password ???');
			$('#old_password').focus();
			return false;	
		} else if ($.trim($('#new_password').val()) === "") {
			alert('Insert New Password ???');
			$('#new_password').focus();
			return false;	
		} else if ($.trim($('#conf_new_password').val()) === "") {
			alert('Retype New Password ???');
			$('#conf_new_password').focus();
			return false;	
		} else if ($.trim($('#conf_new_password').val()) !== $.trim($('#new_password').val())) {
			alert('New Password doesnot match with confirm password !!!');			
			return false;	
		} else {
		
			$('#btnSubmit').prop('disabled',true);
			
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append("action","insertOrUpdate");

			$.ajax({
				url: '<?php echo base_url() ?>login/changePassword',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data) {					
					
					$('#btnSubmit').prop('disabled',false);
					var result = JSON.parse(data);		
					
					if ($.trim(result.msg) === 'OP') {								
						alert(result.errorDesc);					
					} else if($.trim(result.msg) === '2'){
						clearForm();					
						alert("Password Changed Successfully.");
					}
				}
			});
			return false;	
		}	
		
	});	
	
	
});


function clearForm(){
	$("#submit_form").trigger('reset');	
	$("#temp_id").val('0');
}




</script>


<div class="col-md-9">

	<div class="row">
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title"><legend>Change User Password</legend></div>
				</div>
				<div class="panel-body">
					<form id="submit_form" name="submit_form" class="form-horizontal" role="form">
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Username :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="username" name="username" value="<?php echo $userInfo->username ?>" readonly type="text">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Old Password :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="old_password" name="old_password" placeholder="Type Your Old Password" type="password">
						</div>
					  </div>				  
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">New Password :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="new_password" name="new_password" placeholder="Type Your New Password" type="password">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Retype Password :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="conf_new_password" name="conf_new_password" placeholder="Retype Your New Password" type="password">
						</div>
					  </div>			  
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">	
							<input type="hidden" id="temp_id" name="temp_id" value="0"/>
							<button type="button" id="btnClear" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Clear</button>
							<button type="submit" id="btnSubmit" class="btn btn-primary" style="width:120px;"><i class="glyphicon glyphicon-ok"></i> Save</button>
						  
						</div>
					  </div>
					</form>
					
					<div id="wait" style="display:none;width:150px;height:150px;position:absolute;top:30%;left:40%;padding:2px;"><img src='<?php echo base_url() ?>resources/logo/demo_wait.gif' width="150" height="150" /></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Form END -->
	
	
</div>