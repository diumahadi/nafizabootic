
	<!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Events</h1>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- Sidebar -->
				<div class="col-sm-3 blog-sidebar">
					
					<h4>Recent Events</h4>
					<ul class="recent-posts">
					<?php foreach ($recent as $value):?>	
						<li><?php echo $value['event_name'] ?></li>
					<?php endforeach;?>
					</ul>
					
					<!-- h4>Archive</h4 -->
					<!-- ul>
						<li><a href="#">January 2013</a></li>
						<li><a href="#">February 2013</a></li>
						<li><a href="#">March 2013</a></li>
						<li><a href="#">April 2013</a></li>
						<li><a href="#">May 2013</a></li>
					</ul -->
				</div>
				<!-- End Sidebar -->
				
				<div class="col-sm-9">
					<?php foreach ($events as $value):?>
					<div class="blog-post blog-single-post">
						<div class="single-post-title">
							<h3><?php echo $value['event_name'] ?></h3>
						</div>
						<div class="single-post-info">
							<i class="glyphicon glyphicon-time"></i><?php echo $value['postDate'] ?>
						</div>
						<div class="single-post-image">
							<img src="<?php echo base_url() ?>uploads/event/<?php echo $value['profile_image'] ?>" alt="Event Title">
						</div>
						<div class="single-post-content">
							<h3><?php echo $value['organizeDate'] ?></h3>
							<p>
								<?php echo $value['description'] ?>
							</p>
							
							
						</div>
						<!-- Comments -->
						
						
					</div>
					<?php endforeach;?>
				</div>
				
				
				
				<!-- End Blog Post -->
			</div>
		</div>
	</div>
		
		
        
        
	