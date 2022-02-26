<?php
$id = 'contactslider' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contactslider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}
?>



		<div id="<?php echo esc_attr($id); ?>" class="innerpg-first-sec contact-inner-whole <?php echo esc_attr($className); ?>">
			<div class="container">
				<div class="row">
					<div class="col-xl-8">
						<div class="content-sec">	
							<div class="contact-inner-holder">
						<?php if(have_rows('white_boxes_cp')):?>
						 	<?php while (have_rows('white_boxes_cp')): the_row();?>	
								<div class="webinars_box bvbx">
									<h3><?php the_sub_field ('title_sub_cp');?></h3>
									<?php the_sub_field('subtitle_sub_cp');?>
									<?php $link = get_sub_field ('link_con');?>
									<?php $email = get_sub_field ('email_sub_cp');?>
									<?php if ($link):?>
								<?php if(have_rows('link_sub_cp')):?>
						 			<?php while (have_rows('link_sub_cp')): the_row();?>	
										<a href="<?php the_sub_field ('link_cp');?>" class="model"><?php the_sub_field ('link_text_sub_cp');?><img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
									<?php endwhile;?>
									<?php endif;?>	
									<?php endif;?>
									<?php if ($email):?>
									<h5>Email:</h5>
								<?php if(have_rows('email_sub')):?>
						 			<?php while (have_rows('email_sub')): the_row();?>										
										<a href="mailto:<?php the_sub_field('email_cp');?>" class="mailcls"><?php the_sub_field('email_cp');?></a>
									<?php endwhile;?>
								<?php endif;?>	
									<?php endif;?>	
								</div>
							<?php endwhile;?>
							<?php endif;?>	

							</div>
							<div class="row">
								<div class="col-lg-11">
									<?php the_field('content_sub_cp');?>
								</div>
							</div>
							<div class="img-cont">
								<img src="<?php the_field('image_mc_cp');?>" alt="">
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="right-sidebar gap">
							<?php the_field ('form_cp');?>
						</div>
						
						
					</div>
					<div class="col-xl-12">	
					    <div class="heading-area contact-heading">
							<div class="leftheading">
								
								<h2><?php the_field('slider_section_heading_cp');?></h2>
							</div>
							<div class="view-btn">
								<a href="<?php the_field('link_sub');?>" class="view"><?php the_field('slider_section_link_text');?><img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
							</div>
						</div>
						<?php if(have_rows('slider_cp')):?>
						    <div class="cont-part-crsl owl-carousel owl-theme" >
						 	<?php while (have_rows('slider_cp')): the_row();?>			
						    	<div class="item">	
						    		<div class="rltdimg">
						    			<img src="<?php the_sub_field('image_cp');?>" alt="">
						    		</div>
						    	</div>
						    <?php endwhile;?>	
						    </div>
						<?php endif;?>    
					</div>
				</div>
			</div>
		</div>
		