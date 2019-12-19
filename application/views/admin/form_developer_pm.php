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
	
	$("#pm_date").datetimepicker({
        format: "yyyy-mm-dd",
		autoclose: true,
		pickTime: false,
		minView : 2
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
		
		if ($.trim($('#pm_date').val()) === "") {
			alert('Selecte Payment Date ???');
			$('#pm_date').focus();
			return false;	
		} else if ($.trim($('#amount').val()) === "") {
			alert('Insert Paid Amount ???');
			$('#amount').focus();
			return false;	
		} else if ($.trim($('#notes').val()) === "") {
			alert('Insert Notes ???');
			$('#notes').focus();
			return false;	
		} else {
		
			$('#btnSubmit').prop('disabled',true);
			
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append("action","insertOrUpdate");

			$.ajax({
				url: '<?php echo base_url() ?>developer/insertOrUpdate',
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
	

	
});


function clearForm(){
	$("#submit_form").trigger('reset');	
	$("#temp_id").val('0');
}


function loadGrid(){
	var url = "<?php echo base_url() ?>developer/loadGrid";
	$("#filter_table").dataTable().fnDestroy();
	$.getJSON(url,function(data){	
		if(!jQuery.isEmptyObject(data.records)){
			$('#filter_table tbody tr').remove();
			var html = "";
			$.each(data.records, function(i,data){
				html += "<tr>";				
				html +="<td>"+data.id+"</td>";
				html +="<td>"+data.pm_date+"</td>";
				html +="<td align='right'>"+data.amount+"</td>";				
				html +="<td>"+data.notes+"</td>";			
				html += '</tr>';
			});				
			
			$('#filter_table tbody').append(html);


			/*Add Double Click Event on Data Grid*/
			$('#filter_table >tbody > tr').dblclick(function(){	
				
				var record_id = $(this).find('td:eq(0)').text();
				var url="<?php echo base_url() ?>developer/getInfo/"+record_id;
				$.getJSON(url,function(data){
					if(!jQuery.isEmptyObject(data.pmInfo)){
						$.each(data.pmInfo, function(i,data){
						
							$("#temp_id").val(data.id); 							
							$("#pm_date").val(data.pm_date); 							
							$("#amount").val(data.amount); 							
							$("#notes").val(data.notes); 					
							
							if(data.enabled === "A"){
								$("#rbActive").prop("checked",true);
							} else {
								$("#rbBlock").prop("checked",true);
							}

		
							
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
	<?php	if($userInfo->authority=='ROLE_DEVELOPER') { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title"><legend>Developer Payments</legend></div>
				</div>
				<div class="panel-body">
					<form id="submit_form" name="submit_form" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Paid Date :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="pm_date" name="pm_date" type="text">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Paid Amount :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="amount" name="amount" type="text">
						</div>
					  </div>				  
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Notes :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="notes" name="notes" type="text">
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
	<?php } ?>

	<!-- Data Table Starts -->
	<div class="row">
	
		<div class="col-md-12">
			
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title"><legend>Developer Payments</legend></div>
				</div>
				
				<div class="panel-body">
					<table  id="filter_table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="15%">ID</th>
								<th width="15%">Paid Date</th>
								<th width="20%">Paid Amount</th>
								<th width="50%">Notes</th>
							</tr>
						</thead>
						<tbody>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Data Table Ends -->
	
</div>