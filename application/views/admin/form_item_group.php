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
		
		if ($.trim($('#group_name').val()) === "") {
			alert('Insert Group Name ???');
			$('#group_name').focus();
			return false;	
		} else if ($.trim($('#group_tp').val()) === "0") {
			alert('Select Group Type ???');
			$('#group_tp').focus();
			return false;	
		} else {
		
			$('#btnSubmit').prop('disabled',true);
			
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append("action","insertOrUpdate");

			$.ajax({
				url: '<?php echo base_url() ?>item_group/insertOrUpdate',
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
						alert("Group Name < "+result.exists+" > Exists !!!");						
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
	
		
});


function clearForm(){
	$("#submit_form").trigger('reset');	
	$("#temp_id").val('0');
	$('#btnSubmit').prop('disabled',false);
}


function loadGrid(){
	var url = "<?php echo base_url() ?>item_group/loadGrid";
	$("#filter_table").dataTable().fnDestroy();
	$.getJSON(url,function(data){	
		if(!jQuery.isEmptyObject(data.records)){
			$('#filter_table tbody tr').remove();
			var html = "";
			$.each(data.records, function(i,data){
				html += "<tr>";				
				html +="<td>"+data.id+"</td>";
				html +="<td>"+data.group_name+"</td>";
				html +="<td>"+data.groupTp+"</td>";
				html +="<td align='center'>"+data.displayTp+"</td>";				
				html += '</tr>';
			});				
			
			$('#filter_table tbody').append(html);


			/*Add Double Click Event on Data Grid*/
			$('#filter_table >tbody > tr').dblclick(function(){	
				
				var record_id = $(this).find('td:eq(0)').text();
				var url="<?php echo site_url() ?>/item_group/getInfo/"+record_id;
				$.getJSON(url,function(data){
					if(!jQuery.isEmptyObject(data.groupInfo)){
						$.each(data.groupInfo, function(i,data){
						
							$("#temp_id").val(data.id); 							
							$("#group_name").val(data.group_name); 							
							$("#group_tp").val(data.group_tp); 							
							$("#user_email").val(data.email); 							
							$("#mobile_number").val(data.mobile); 							
							
							if(data.display === "S"){
								$("#rbShow").prop("checked",true);
							} else {
								$("#rbHide").prop("checked",true);
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

	<div class="row">
		<div class="col-md-12">
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title"><legend>Item Group</legend></div>
				</div>
				<div class="panel-body">
					<form id="submit_form" name="submit_form" class="form-horizontal" role="form">
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Group Name :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="group_name" name="group_name" placeholder="Group Name" type="text">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-2 control-label">Group Type: </label>
						<div class="col-sm-10">
							<select class="form-control" id="group_tp" name="group_tp">
								<option value="0">Select...</option>
								<option value="MA">Men's Fashion</option>
								<option value="WO">Women's Fashion</option>
								<option value="KD">Kids's Fashion</option>
								<option value="HL">Home & Living</option>							
							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-2 control-label">Display : </label>
						<div class="col-sm-10">					  
							<label class="radio radio-inline"><input id="rbShow" name="diplay" value="S" type="radio" checked>Show </label>
							<label class="radio radio-inline"><input id="rbHide" name="diplay" value="H" type="radio">Hide </label>										
						</div>
					  </div>				  
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">	
							<input type="hidden" id="temp_id" name="temp_id" value="0"/>
							<button type="button" id="btnClear" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Clear</button>
							<button type="submit" id="btnSubmit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Save</button>
						</div>
					  </div>
					</form>
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
								<th>Group ID</th>
								<th>Group Name</th>
								<th>Group Type</th>
								<th>Display</th>
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


	

	











