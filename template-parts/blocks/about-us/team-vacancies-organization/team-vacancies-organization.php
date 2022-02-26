<?php
$id = 'teampicslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'teampicslider';
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
<div class="meetsec" style="background: #F3F3F7;">
	<div class="container">
	    <?php 
		$heading_prefix 	= get_field('heading_prefix');
		$heading 			= get_field('heading');
		$view_all_link 		= get_field('view_all_link');
				
		if( have_rows('galler_image') ): ?>
		<div class="heading-area mb-35">
		    <?php if(!empty($heading)):?>
			<div class="leftheading">
				<h4><?php echo $heading_prefix;?></h4>
				<h2><?php echo $heading;?></h2>
			</div>
			<?php endif; ?>
			
			<?php if(!empty($view_all_link)):?>
			<div class="view-btn">
				<a href="<?php echo $view_all_link; ?>" class="view">Bekijk het hele team <img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
			</div>
			<?php endif; ?>
		</div>
		<div id="<?php echo esc_attr($id);?>"  class="<?php echo esc_attr($className); ?>" >
			<div class="team-inner-sec owl-carousel owl-theme" >
			    <?php while( have_rows('galler_image') ): the_row(); 
				$teamimages = get_sub_field('images');
				?>
				<div class="item">
					<div class="teamimg"><img src="<?php echo $teamimages;?>" alt=""></div>
				</div>
				<?php endwhile; ?>
				
			</div>
		</div>
		<?php endif; ?>
		<?php $subheading_vwb = get_field ('subheading_vwb');
		if(!empty($subheading_vwb)){
		?>
		<div class="heading-area mb-35">
			<div class="leftheading">
				<h4><?php the_field ('subheading_vwb');?></h4>
				<h2><?php the_field ('heading_vwb');?></h2>
			</div>
			<div class="view-btn">
				<a href="<?php the_field ('link_vwb');?>" class="view"><?php the_field ('right_side_text_vwb');?><img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
			</div>
		</div>
		<?php } ?>
		
	<?php $post_objects = get_field('select_post_vwb');?>
	<?php if ($post_objects):?>
		<div class="vacancy-box-area">
          <?php foreach ($post_objects as $post_object):?>	
			<div class="vacancy-bx">
				<h3><?php echo get_the_title ($post_object->ID); ?></h3>
				<?php 
								$cat_list=array();
								$terms_werkervaring = get_the_terms($post_object->ID, 'werkervaring');
								foreach($terms_werkervaring as $term_werkervaring) {
									//echo $term_werkervaring->name;
									array_push($cat_list,$term_werkervaring->name);
								}
								
								$terms_vakgebieden = get_the_terms($post_object->ID, 'vakgebieden');
								foreach($terms_vakgebieden as $term_vakgebieden) {
									//echo $term_vakgebieden->name;
									array_push($cat_list,$term_vakgebieden->name);
								}
								
								$terms_dienstverband = get_the_terms($post_object->ID, 'dienstverband');
								foreach($terms_dienstverband as $term_dienstverband) {
									//echo $term_dienstverband->name;
									array_push($cat_list,$term_dienstverband->name);
								}
								
								$terms_opleidingsniveau = get_the_terms($post_object->ID, 'opleidingsniveau');
								foreach($terms_opleidingsniveau as $term_opleidingsniveau) {
									//echo $term_opleidingsniveau->name;
									array_push($cat_list,$term_opleidingsniveau->name);
								}
								if (!empty($cat_list)) {
								?>
								
								<div class="tagarea">
								   <?php foreach($cat_list as $cat_list_row){?>
								   <span><?php echo $cat_list_row; ?></span>
								   <?php } ?>	
								</div>
								<?php } ?>
				<a href="<?php echo get_the_permalink ($post_object->ID);?>" class="more">Bekijk deze vacature<img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
			</div>
		  <?php endforeach;?> 		
		</div>
	<?php endif;?>
	<?php wp_reset_query(); ?>
	</div>
	
	<?php if( have_rows('organiztion_logo') ): ?> 
	<div class="orglogo">
		<div class="container">
			<div class="heading-area">
				<div class="leftheading">
					<h2><?php the_field ('title_org'); ?></h2>
				</div>
				<div class="view-btn">
					<a href="<?php the_field ('right_link_org'); ?>" class="view">Bekijk alle klanten <img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
				</div>
			</div>
			<div class="row align-items-center">
				<?php while( have_rows('organiztion_logo') ): the_row(); ?>
					<?php $org_link = get_sub_field ('link_org_logo');?>
					<div class="col-lg-2 col-md-4">
					  <div class="orgbox">
					  <?php if ($org_link):?>
						<a href="<?php the_sub_field('link_org_logo'); ?>">
						  <img src="<?php the_sub_field('image_org'); ?>" alt="" title=""> 
						  <div class="case">Case</div>
						</a> 
						<?php else:?>
						  <img src="<?php the_sub_field('image_org'); ?>" alt="" title=""> 
					  <?php endif;?>
					  </div>
					</div>
				  <?php endwhile;?>
		  
			</div>
		</div>
	</div>
	<?php endif;?>
	
</div>