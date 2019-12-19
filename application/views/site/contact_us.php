<script>

$(document).ready(function(){
		
	$('#contact_name').keyup(function(){
		$('#message').html('');
	});
	
	
	/*Submit Button Action Performed*/
	$("form#submit_form").submit(function(event) {		
		
		if ($.trim($('#contact_name').val()) === "") {
			alert('Insert Contact Name ???');
			$('#contact_name').focus();
			return false;	
		} else if ($.trim($('#contact_email').val()) === "") {
			alert('Insert Contact Email ???');
			$('#contact_email').focus();
			return false;	
		} else if ($.trim($('#topic_tp').val()) === "0") {
			alert('Select Contact Type ???');
			$('#topic_tp').focus();
			return false;	
		} else if ($.trim($('#contact_message').val()) === "") {
			alert('Insert Contact Message ???');
			$('#contact_message').focus();
			return false;	
		} else {
		
			$('#btnSubmit').prop('disabled',true);
			$('#message').html('');
			
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append("action","insertOrUpdate");

			$.ajax({
				url: '<?php echo base_url() ?>home/send_contact',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data) {					
					
					$('#btnSubmit').prop('disabled',false);
					var result = JSON.parse(data);				
					if ($.trim(result.msg) === '1') {					
						$('#message').html('<div class="alert alert-info" role="alert">Successfully Sent...</div>');					
						$("#submit_form").trigger('reset');
					}  else if($.trim(result.msg) === 'EE') {
						$('#message').html('<div class="alert alert-danger" role="alert">Error !!!</div>');					
					}
				}
			});
			return false;	
		}	
		
	});	
	
		
});






</script>




<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1>Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
	        	<div class="row">
	        		<div class="col-sm-7">
	        			<!-- Map -->
	        			<div id="contact-us-map">

	        			</div>
	        			<!-- End Map -->
	        			<!-- Contact Info -->
	        			<p class="contact-us-details">
	        				<b>Address:</b> Profesor'para, Chandpur Sadar, Chandpur, Bangladesh.<br/>
	        				<b>Mobile:</b> +88-01633591928<br/>
	        				<b>Email:</b> bdgrandchoice@gmail.com
	        			</p>
	        			<!-- End Contact Info -->
	        		</div>
	        		<div class="col-sm-5">
	        			<!-- Contact Form -->
	        			<h3>Send Us a Message</h3>
						<div id="message">
						
							
						
						</div>
						
	        			<div class="contact-form-wrapper">
		        			<form id="submit_form" name="submit_form" class="form-horizontal" role="form">
		        				 <div class="form-group">
		        				 	<label for="Name" class="col-sm-3 control-label"><b>Your name</b></label>
		        				 	<div class="col-sm-9">
										<input class="form-control" id="contact_name" name="contact_name" type="text" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="contact-email" class="col-sm-3 control-label"><b>Your Email</b></label>
									<div class="col-sm-9">
										<input class="form-control" id="contact_email" name="contact_email" type="email" required placeholder="Insert Valid Email">
									</div>
								</div>
								<div class="form-group">
									<label for="contact-message" class="col-sm-3 control-label"><b>Select Topic</b></label>
									<div class="col-sm-9">
										<select class="form-control" id="topic_tp" name="topic_tp">
											<option value="0">Please select topic...</option>
											<option value="GE">General</option>
											<option value="SE">Services</option>
											<option value="OR">Orders</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="contact-message" class="col-sm-3 control-label"><b>Message</b></label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="5" id="contact_message" name="contact_message"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button id="btnSubmit" type="submit" class="btn pull-right">Send</button>
									</div>
								</div>
		        			</form>
		        		</div>
		        		<!-- End Contact Info -->
	        		</div>
	        	</div>
	    	</div>
	    </div>

	    