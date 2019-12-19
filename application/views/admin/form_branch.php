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
		
		if ($.trim($('#manager_name').val()) === "") {
			alert('Insert Manager Name ???');
			$('#manager_name').focus();
			return false;	
		} else if ($.trim($('#userfile').val()) === "" && $.trim($('#temp_slider').val()) === "") {
			alert('Insert Photo ???');
			$('#userfile').focus();
			return false;	
		} else {
		
			$('#btnSubmit').prop('disabled',true);
			
			event.preventDefault();
			var formData = new FormData($(this)[0]);
			formData.append("action","insertOrUpdate");

			$.ajax({
				url: '<?php echo base_url() ?>branch/insertOrUpdate',
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
						alert("Brand Name < "+result.exists+" > Exists !!!");						
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
	var url = "<?php echo base_url() ?>branch/loadGrid";
	$("#filter_table").dataTable().fnDestroy();
	$.getJSON(url,function(data){	
		if(!jQuery.isEmptyObject(data.records)){
			$('#filter_table tbody tr').remove();
			var html = "";
			$.each(data.records, function(i,data){
				html += "<tr>";				
				html +="<td>"+data.id+"</td>";
				html +="<td>"+data.manager_name+"</td>";
				html +="<td align='center'>"+data.displayTp+"</td>";				
				html +="<td align='center'><a  class='thumbnail'><img style='height:100px;width:180px' src='<?php echo base_url() ?>uploads/manager/"+data.image_url+"' alt='...'></a></td>";
				html += '</tr>';
			});				
			
			$('#filter_table tbody').append(html);


			/*Add Double Click Event on Data Grid*/
			$('#filter_table >tbody > tr').dblclick(function(){	
				
				var record_id = $(this).find('td:eq(0)').text();
				var url="<?php echo base_url() ?>branch/getInfo/"+record_id;
				$.getJSON(url,function(data){
					if(!jQuery.isEmptyObject(data.managerInfo)){
						$.each(data.managerInfo, function(i,data){
						
							$("#temp_id").val(data.id); 							
							$("#manager_name").val(data.manager_name);
							$("#mobile").val(data.mobile);
							$("#email").val(data.email);
							$("#address").val(data.address);
							$("#temp_slider").val(data.image_url);
							
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
					<div class="panel-title"><legend>Slider</legend></div>
				</div>
				<div class="panel-body">
					<form id="submit_form" name="submit_form" class="form-horizontal" role="form">
					  
					  <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Manager Name :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="manager_name" name="manager_name" placeholder="Insert Branch Manager Name" type="text">
						</div>
					  </div>

					  <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Image : </label>
                        <div class="col-sm-10">
                            <input class="btn btn-default" id="userfile" name="userfile" type="file">
                        </div>
                      </div>

					 <div class="form-group">
						<label for="inputGroupName" class="col-sm-2 control-label">Mobile :</label>
						<div class="col-sm-10">
						  <input class="form-control" id="mobile" name="mobile" placeholder="Insert Mobile" type="text">
						</div>
					  </div>

					 <div class="form-group">
                        <label for="inputGroupName" class="col-sm-2 control-label">Email :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="email" name="email" placeholder="Insert Email" type="email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputGroupName" class="col-sm-2 control-label">Address :</label>
                        <div class="col-sm-10">
                          <input class="form-control" id="address" name="address" placeholder="Insert Present Address" type="text">
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
							<input type="hidden" id="temp_slider" name="temp_slider"/>
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
								<th>ID</th>
								<th>Slider Title</th>
								<th>Display</th>
								<th>Image</th>
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