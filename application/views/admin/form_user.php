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
	loadGrid();	
	
	/*Clear Button Action Performed*/
	$('#btnClear').click(function(){
		clearForm();
		loadGrid();	
	});
	
	
	/*Submit Button Action Performed*/
	$("form#submit_form").submit(function(event) {		
		
		if ($.trim($('#username').val()) === "") {
			alert('Insert Username ???');
			$('#username').focus();
			return false;	
		} else if ($.trim($('#full_name').val()) === "") {
			alert('Insert User Full Name ???');
			$('#full_name').focus();
			return false;	
		} else {
		
			$('#btnSubmit').prop('disabled',true);
			
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append("action","insertOrUpdate");

			$.ajax({
				url: '<?php echo base_url() ?>user/insertOrUpdate',
				type: 'POST',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data) {					
					
					$('#btnSubmit').prop('disabled',false);
					var result = JSON.parse(data);				
					
					if ($.trim(result.msg) === 'EX'){
						alert("Username < "+result.userExists+" > Exists !!!");						
					} else if ($.trim(result.msg) === '1') {						
						clearForm();
						loadGrid();
						alert("Successfully Saved.");					
					} else if($.trim(result.msg) === '2'){
						clearForm();
						loadGrid();
						alert("Successfully Updated.");
					} else if($.trim(result.msg) === 'EE') {
						alert(result.errorDesc);
					}
				}
			});
			return false;	
		}	
		
	});	
	
	var options = {
		url: function(phrase) {
			return "<?php echo base_url() ?>user/match_name/" + phrase;
		},
		getValue: "label",
		list: {
			onSelectItemEvent: function() {
				var value = $("#function-data").getSelectedItemData().id;
				$("#data-holder").val(value).trigger("change");
			}
		}
	};
	$("#function-data").easyAutocomplete(options);	
});


function clearForm(){
	$("#submit_form").trigger('reset');	
	$("#temp_id").val('0');
	$("#username").prop("readonly",false);
}


function loadGrid(){
	var url = "<?php echo base_url() ?>user/loadGrid";
	$("#filter_table").dataTable().fnDestroy();
	$.getJSON(url,function(data){	
		if(!jQuery.isEmptyObject(data.records)){
			$('#filter_table tbody tr').remove();
			var html = "";
			$.each(data.records, function(i,data){
				html += "<tr>";				
				html +="<td>"+data.username+"</td>";
				html +="<td>"+data.full_name+"</td>";
				html +="<td>"+data.email+"</td>";
				html +="<td>"+data.mobile+"</td>";
				html +="<td align='center'>"+data.enabled+"</td>";				
				html += '</tr>';
			});				
			
			$('#filter_table tbody').append(html);


			/*Add Double Click Event on Data Grid*/
			$('#filter_table >tbody > tr').dblclick(function(){	
				
				var record_id = $(this).find('td:eq(0)').text();
				var url="<?php echo base_url() ?>user/getInfo/"+record_id;
				$.getJSON(url,function(data){
					if(!jQuery.isEmptyObject(data.userInfo)){
						$.each(data.userInfo, function(i,data){
						
							$("#temp_id").val(data.username); 							
							$("#username").val(data.username); 							
							$("#full_name").val(data.full_name); 							
							$("#user_email").val(data.email); 							
							$("#mobile_number").val(data.mobile); 							
							
							if(data.enabled === "A"){
								$("#rbActive").prop("checked",true);
							} else {
								$("#rbBlock").prop("checked",true);
							}

							$("#username").prop("readonly",true);	
							
						});			
					}					
				});	
			
			});	
		}

		$('#filter_table').dataTable();	
	});
}


</script>


<div class="col-md-9">

	<div class="row">
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title"><legend>User</legend></div>
				</div>
				<div class="panel-body">
					<form id="submit_form" name="submit_form" class="form-horizontal" role="form">
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Username :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="username" name="username" placeholder="Username" type="text">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">User Full Name :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="full_name" name="full_name" placeholder="User Full Name" type="text">
						</div>
					  </div>				  
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Email :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="user_email" name="user_email" placeholder="Email" type="email">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Mobile Number :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="mobile_number" name="mobile_number" placeholder="Valid Mobile Number" type="text">
						</div>
					  </div>				  
					  
					  <div class="form-group">
						<label class="col-sm-2 control-label">Active : </label>
						<div class="col-sm-10">					  
							<label class="radio radio-inline"><input id="rbActive" name="isActive" value="A" type="radio" checked>Active </label>
							<label class="radio radio-inline"><input id="rbBlock" name="isActive" value="B" type="radio">Block </label>										
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
	
	<!-- Data Table Starts -->
	<div class="row">
	
		<div class="col-md-12">

			<div class="content-box-large">
				<div class="panel-body">
					<table  id="filter_table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Username</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Enabled</th>
							</tr>
						</thead>
						<tbody>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</div>