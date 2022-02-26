		<div class="second-sec team-sec">
			<div class="container">	
				<div class="row justify-content-between align-items-center">
            		<div class="col-lg-5 about-img">
            			<img src="<?php the_field('image_tm_ls');?>" alt="" class="team-img">
            			<div class="text-center">	
							<a href="mailto:<?php the_field('email_id_tm_ls');?>" class="build"><i class="far fa-envelope"></i><?php the_field('email_id_tm_ls');?></a>
						</div>
            		</div>
            		<div class="col-lg-6">
            			<div class="heading-area heading-area2">
            				<h4><?php the_field('subtitle_tm_rs');?></h4>
							<h2><?php the_field('title_tm_rs');?></h2>
						</div>
						<div class="team-p-area">
						<?php the_field('content_tm_rs');?>
						</div>
						<h3>Neem contact op</h3>
						<div class="contact-team-area">
							<a href="tel:<?php the_field('mobile_tm_rs');?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/phn.png" alt=""><?php the_field('mobile_tm_rs');?></a>
							<a href="mailto:<?php the_field('email_tm_rs');?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/email.png" alt=""><?php the_field('email_tm_rs');?></a>
						</div>
					</div>
				</div>	
			</div>		
		</div>