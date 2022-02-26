		<div class="innerpg-first-sec">
			<div class="container">
				<?php the_field('content_webinar');?>

				<div class="webinars_form_section">
					<div class="row">
						<div class="col-lg-6">
							<?php if (have_rows('white_boxes_webinar')):?>
								<?php while(have_rows('white_boxes_webinar')): the_row();?>
								<?php $sub_heading = get_sub_field('content_webinar_wb');?>	
							<div class="webinars_box">
								<h3><?php the_sub_field('title_webinar_wb');?></h3>
								<?php if ($sub_heading):?><?php echo $sub_heading;?><?php endif;?>
								<div class="prtition"></div>
								<h4><?php the_sub_field('title_bl_webinar');?></h4>
							<?php if (have_rows('links_webinar')):?>
								<?php while(have_rows('links_webinar')): the_row();?>
									<a href="<?php the_sub_field('links_lnks_wb');?>" class="model"><?php the_sub_field('links_webinar_wb');?><img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
								<?php endwhile;?>
							<?php endif;?>		
							</div>
						<?php endwhile;?>	
						<?php endif;?>
						</div>
						<div class="col-lg-6">
							<?php the_field('right_section_webinar');?>
						</div>
					</div>
				</div>


			</div>
		</div>
		