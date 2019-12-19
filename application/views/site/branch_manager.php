<style>
	.customHeight{
		height:300px !important;
	}
</style>

		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Branch Managers</h1>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Branch Manager's List-->		
		<div class="eshop-section section">
	    	<div class="container">
	    		
				<div class="row">
					<?php $i=1; foreach ($managers as $value):?>
					
					<div class="col-md-4 col-sm-6">
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="javascript:void(0)"><img class="customHeight" src="<?php echo base_url() ?>uploads/manager/<?php echo $value['image_url'] ?>" alt="<?php echo $value['manager_name'] ?>"></a>
							</div>
							<div class="portfolio-info">
								<ul>
									<li class="portfolio-project-name"><?php echo $value['manager_name'] ?></li>
									
								</ul>
							</div>
						</div>
					</div>
					<?php if(fmod($i,3)==0){						
							echo '</div><div class="row">';
						}
						$i++;
					?>

					<?php endforeach?>					
				</div>
					
			</div>
	    </div>
		<!-- Branch Manager's List-->
		