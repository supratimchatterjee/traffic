<div class="second-sec">
			<div class="container">	
				<div class="row justify-content-between align-items-center">
					<?php $image_con = get_field('image_con');
					if($image_con){ ?>
            		<div class="col-lg-5 about-img">
            			<img src="<?php the_field('image_con'); ?>" alt="">
            		</div>

            		<div class="col-lg-6">
            			<div class="heading-area heading-area2">
            				<h4><?php the_field('subheading_cim'); ?></h4>
							<h2><?php the_field('heading_cim'); ?></h2>
						</div>
						<p><?php the_field('content_cim'); ?></p>
						<a href="<?php the_field('button_link_cim'); ?>" class="more"><?php the_field('button_label_cim'); ?><img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
            		</div>
            		<?php }else{ ?>
            		<div class="col-lg-12">
            			<div class="heading-area heading-area2">
            				<h4><?php the_field('subheading_cim'); ?></h4>
							<h2><?php the_field('heading_cim'); ?></h2>
						</div>
						<p><?php the_field('content_cim'); ?></p>
						<a href="<?php the_field('button_link_cim'); ?>" class="more"><?php the_field('button_label_cim'); ?><img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
            		</div>	
            		<?php } ?>
				</div>	
			</div>		
		</div>