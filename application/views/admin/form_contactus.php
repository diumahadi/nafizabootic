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

	loadGrid();	
	
});




function loadGrid(){
	var url = "<?php echo base_url() ?>contactus/loadGrid";
	$("#filter_table").dataTable().fnDestroy();
	$.getJSON(url,function(data){	
		if(!jQuery.isEmptyObject(data.records)){
			$('#filter_table tbody tr').remove();
			var html = "";
			$.each(data.records, function(i,data){
				html += "<tr>";				
				html +="<td>"+data.id+"</td>";
				html +="<td>"+data.person_name+"</td>";
				html +="<td>"+data.email+"</td>";
				html +="<td align='center'>"+data.topicTp+"</td>";
				html +="<td>"+data.message+"</td>";				
				html +="<td align='center'>"+data.sentDate+"</td>";			
				html += '</tr>';
			});				
			
			$('#filter_table tbody').append(html);


			/*Add Double Click Event on Data Grid*/
			$('#filter_table >tbody > tr').dblclick(function(){	
				
				var record_id = $(this).find('td:eq(0)').text();
				var url="<?php echo base_url() ?>contactus/getInfo/"+record_id;
				$.getJSON(url,function(data){
					if(!jQuery.isEmptyObject(data.pmInfo)){
						$.each(data.pmInfo, function(i,data){
						
							//$("#temp_id").val(data.id); 							
							

		
							
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

	<!-- Data Table Starts -->
	<div class="row">
	
		<div class="col-md-12">
			
			<div class="content-box-large">
				<div class="panel-heading">
					<div class="panel-title"><legend>Contact Us</legend></div>
				</div>
				
				<div class="panel-body">
					<table  id="filter_table" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="10%">Contact ID</th>
								<th width="15%">Person Name</th>
								<th width="15%">Email</th>
								<th width="5%">Topic</th>
								<th width="45%">Message</th>
								<th width="10%">Date</th>
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