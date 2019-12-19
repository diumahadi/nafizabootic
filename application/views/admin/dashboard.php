<script type="text/javascript">
	
	window.onload = function () {	
		
		var url="<?php echo base_url() ?>item/getItemEntryEachGroup";
		$.getJSON(url, function (data) {			
			
			var itemEntryEveryGroup = new CanvasJS.Chart("itemEntryEveryGroup", {
				title: {
					text: "Total Item Count "+data.totalItemCount
				},
				animationEnabled: true,
				zoomEnabled:true,
				options: {
					 legend: {
						display: false
					 }
				},				
				legend: {
					verticalAlign: "center",
					horizontalAlign: "left",
					fontSize: 15,
					fontFamily: "Arial, Helvetica, sans-serif",
					itemTextFormatter:"mahadi"
				},				
				theme: "theme2",				
				data: [
				{
					type: "pie",					
					percentFormatString: "#0.##",
					indexLabelFontFamily: "Garamond",
					indexLabelFontSize: 15,
					indexLabel: " {label} #percent%",
					indexLabelFontColor: "#262626",
					toolTipContent: "{legendText} {total} Items",
					dataPoints: data.records
				}
				]
			});        
			itemEntryEveryGroup.render();
		});	
		
		
		
		var url="<?php echo base_url() ?>item/getUserItemEntry";
		$.getJSON(url, function (data) {		
			var userItemEntry = new CanvasJS.Chart("userItemEntry", {
				theme: "theme2",
				animationEnabled: true,
				title: {
					text: "User Based Item Entry",
					padding:30
				},
				axisY: {
					suffix: "",						
					titleFontColor: "#7CA1CE"
				},				
				legend:{
					itemTextFormatter: function ( e ) {
						return "Total Item Count : "+parseInt(data.totalItemCount);  
					}  
				},
				data: [
				{
					type: "column", 
					showInLegend: true,
					indexLabel: "{y}",
					indexLabelPlacement: "outside",  
					markerSize: 10,
					indexLabelFontColor: "red",
					indexLabelOrientation: "horizontal",
					dataPoints: data.records
				}
				]
			});        
			userItemEntry.render();
		});	
		
		
		
		var url="<?php echo base_url() ?>item/getItemEntryProgress";
		$.getJSON(url, function (data) {		
			var yearlyItemEntryProgress = new CanvasJS.Chart("yearlyItemEntryProgress", {
				theme: "theme2",
				animationEnabled: true,
				title: {
					text: "Yearly Item Entry, "+new Date().getFullYear(),
					padding:30
				},
				axisY: {
					suffix: "",
						
					titleFontColor: "#7CA1CE"
				},				
				legend:{
					itemTextFormatter: function ( e ) {
						return "Total Item Count : "+parseInt(data.totalItemCount);  
					}  
				},
				data: [
				{
					type: "column", 
					showInLegend: true,
					indexLabel: "{y}",
					indexLabelPlacement: "outside",  
					markerSize: 10,
					indexLabelFontColor: "red",
					indexLabelOrientation: "horizontal",
					dataPoints: data.records
				}
				]
			});        
			yearlyItemEntryProgress.render();
		});
		
		
		var url="<?php echo base_url() ?>home/getVisitorProgress";
		$.getJSON(url, function (data) {		
			var yearlyVisitorProgress = new CanvasJS.Chart("yearlyVisitorProgress", {
				theme: "theme2",
				animationEnabled: true,
				title: {
					text: "Yearly Visitors, "+new Date().getFullYear(),
					padding:30
				},
				axisY: {
					suffix: "",
						
					titleFontColor: "#7CA1CE"
				},				
				legend:{
					itemTextFormatter: function ( e ) {
						return "Total Visitor Count : "+parseInt(data.totalItemCount);  
					}  
				},
				data: [
				{
					type: "column", 
					showInLegend: true,
					indexLabel: "{y}",
					indexLabelPlacement: "outside",  
					markerSize: 10,
					indexLabelFontColor: "red",
					indexLabelOrientation: "horizontal",
					dataPoints: data.records
				}
				]
			});        
			yearlyVisitorProgress.render();
		});
		
	}
	

</script>



<div class="col-md-9">
	
	<div class="row">	
		<div class="panel panel-default">
		  <div id="itemEntryEveryGroup"  style="height: 350px;margin-bottom:50px; width: 95%;"  class="panel-body">
			
		  </div>
		</div>
	</div>

	<div class="row">	
		<div class="panel panel-default">
		  <div id="userItemEntry"  style="height: 500px;margin-bottom:50px; width: 95%;"  class="panel-body">
			
		  </div>
		</div>
	</div>
	
	<div class="row">	
		<div class="panel panel-default">
		  <div id="yearlyItemEntryProgress"  style="height: 500px;margin-bottom:50px; width: 95%;"  class="panel-body">
			
		  </div>
		</div>
	</div>
	
	<div class="row">	
		<div class="panel panel-default">
		  <div id="yearlyVisitorProgress"  style="height: 500px;margin-bottom:50px; width: 95%;"  class="panel-body">
			
		  </div>
		</div>
	</div>
	
	

	
  </div>