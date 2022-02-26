<?php $hf= get_field ('heading_f_ttb');?>
<?php if ($hf) :?>
<div class="thrd-sec pb-0 pt-0">
			<div class="container">	
				<div class="our-challng-sec">
					<div class="ourchlng-bx" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/chlngbg.png');">
						<h2><?php the_field ('heading_f_ttb');?></h2>
						<div class="same-hgt">
							<?php the_field ('content_f_ttb');?>
						</div>
						<a href="<?php the_field ('button_link_f_ttb');?>" class="inr-cont lm-dg-pg"><?php the_field ('button_text_f_ttb');?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-arw.png" alt=""></a>
					</div>
					<div class="ourchlng-bx">
						<h2><?php the_field ('heading_t_ttb');?></h2>
						<div class="same-hgt">
							<?php the_field ('content_t_ttb');?>
						</div>
						<a href="<?php the_field ('button_link_t_ttb');?>" class="inr-cont lm-dg-pg"><?php the_field ('button_text_t_ttb');?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-arw.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>	