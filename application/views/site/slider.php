<!-- Homepage Slider -->
        <div class="homepage-slider">
        	<div id="sequence">
				<ul class="sequence-canvas">
					
				<?php foreach($slider as $value): ?>				
					<li class="bg3">
						<!-- Slide Title -->
						<h2 class="title"><?php echo $value['slider_title'] ?></h2>
						<!-- Slide Text -->
						<h3 class="subtitle"><?php echo $value['slider_sub_title'] ?></h3>
						<!-- Slide Image -->
						<img class="slide-img" src="<?php echo base_url() ?>uploads/slider/<?php echo $value['image'] ?>" alt="Slide 2" />
					</li>				
				<?php endforeach?>
					
					
					
				<div class="sequence-pagination-wrapper">
					<ul class="sequence-pagination">
						<li>1</li>
						<li>2</li>
						<li>3</li>
					</ul>
				</div>
			</div>
        </div>
        <!-- End Homepage Slider -->
		
		<!-- Call to Action Bar -->
	    <div class="section section-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="calltoaction-wrapper">
							<h3>We always ensure quality products.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Call to Action Bar -->