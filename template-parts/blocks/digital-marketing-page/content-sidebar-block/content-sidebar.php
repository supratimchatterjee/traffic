<?php
$id = 'rltslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'rltslider';
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


<div class="innerpg-first-sec">
			<div class="container">
				<div class="row">
					<div class="col-xl-8">
						<div class="content-sec pr-xl-5">	
							<div class="fsrt-p pb-5">
								<p><?php the_field('first_paragraph_dm_ls', false, false); ?></p>
							</div>

							<h3><?php the_field('heading_ltfs');?></h3>
							<?php the_field('content_ltfs');?>
							<h3><?php the_field('heading_lass');?></h3>
							<?php the_field('content_lass');?>
	                        <h3><?php the_field('heading_lats');?></h3>
	                        <?php the_field('content_lats');?>
						    <h3><?php the_field('heading_lafs');?></h3>
						    <div class="p-area-padding-low">
						    	<?php the_field('content_lafs');?>
						    </div>
						    <h3><?php the_field('heading_laffs');?></h3>
						    <?php the_field('content_laffs');?>
						    <div class="innersocial">
						    	<?php
						    	$linkedin = get_field('linkedin_ls');
						    	$facebook = get_field('facebook_ls');
						    	$twitter = get_field('twitter_ls');
						    	$whatsapp = get_field('whatsapp_ls');
						    	$link = get_field('link_ls');
						    	$mail = get_field('mail_ls');
						    	?>
								<?php echo do_shortcode('[social]');?>
					
						    </div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="right-sidebar">
							<h2><?php the_field('contact_us_heading_dm');?></h2>
							<p><?php the_field('contact_us_subheading_dm');?></p>
							<a href="<?php the_field('button_link_dm');?>" class="inr-cont"><?php the_field('button_text_dm');?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/white-arw.png" alt=""></a>
						</div>
						<?php 
						$links_dm = get_field('links_dm');
						$image_marketing_heading_dm = get_field('image_marketing_heading_dm');
						$digital_marketing_heading_dm = get_field('digital_marketing_heading_dm');
						if(!empty($links_dm) || !empty($image_marketing_heading_dm) || !empty($digital_marketing_heading_dm)):
						?>
						<div class="right-sidebar-two">
							<div class="inner-right-sidebar-top">
								<div class="servlink servlink2">
									<div class="servlink-imgbx">
										<img src="<?php the_field ('image_marketing_heading_dm');?>" alt="" title="">
									</div>
									<span><?php the_field('digital_marketing_heading_dm');?></span>
								</div>
								<?php if(have_rows('links_dm')):?>
									<?php while(have_rows('links_dm')): the_row();?>
								<a href="<?php the_sub_field('link_link_dm');?>" class="model"><?php the_sub_field('text_link_dm');?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/rgt-arrw.png" alt="" title=""></a>
							<?php endwhile;?>
						    <?php endif;?>
							</div>
							<?php if(have_rows('tags')):?>
							<div class="inner-right-sidebar-bottom">
								<div class="tagsec mb-0 tagsec-two">
								<?php while(have_rows('tags')): the_row();?>			
					    			<span class="tag reach" style="background:<?php the_sub_field('tag_color');?> ;"><?php the_sub_field('tag_text');?></span>
					    		<?php endwhile;?>	
					    		</div>
							</div>
							<?php endif;?>
						</div>
						<?php endif; ?>
						
					</div>
				</div>



				<?php if(have_rows('related_carousel')):?>
				<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> col-xl-12">	
						<h3><?php the_field('heading_rc');?></h3>
						    <div class="related-crsl owl-carousel owl-theme" >
							<?php while(have_rows('related_carousel')): the_row ();?>
						    	<div class="item">	
						    		<div class="rltdimg">
						    			<img src="<?php the_sub_field('image_rc');?>" alt="">
						    		</div>
						    	</div>
						    <?php endwhile;?>	
						    </div>
					</div>
				<?php endif;?>	
			</div>
		</div>