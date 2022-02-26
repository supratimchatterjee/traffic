<?php
$id = 'caseslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'caseslider';
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
		<?php if ( is_front_page() ) :?>
		   <div id="<?php echo esc_attr($id); ?>" class="thrd-sec <?php echo esc_attr($className); ?>" >
		<?php else :?>
			<div id="<?php echo esc_attr($id); ?>" class="thrd-sec pb-0 <?php echo esc_attr($className); ?>" >
		<?php endif;?>
			<div class="container">	
				<div class="heading-area heading-area-mb-low">
					<div class="leftheading">
						<h4><?php the_field('sub_heading_css'); ?></h4>
						<h2><?php the_field('heading_css'); ?></h2>
					</div>
					<div class="view-btn">
						<a href="<?php the_field('button_link_css'); ?>" class="view"><?php the_field('button_label_css'); ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/rgt-arrw.png" alt="" title=""></a>
					</div>
				</div>
				<div class="discover-sec owl-carousel owl-theme" >

				<?php $post_objects = get_field('add_cases');?>
                    	<?php if ($post_objects):?>
                    	<?php foreach ($post_objects as $post_object):?>

		           	<div class="item">
		           		<div class="disbox">
						
		           			<div class="disimgbx diestin"><a href="<?php echo get_the_permalink($post_object->ID); ?>"><img src="<?php echo get_the_post_thumbnail_url($post_object->ID,'post-thumbnail'); ?>" alt=""></a></div>
		           			<h2><a href="<?php echo get_the_permalink($post_object->ID); ?>"><?php echo get_the_title ($post_object->ID); ?></a></h2>
                             <div class="line">	</div>
                             <div class="text-center">
								<a href="<?php echo the_permalink ($post_object->ID); ?>" class="more">Bekijk casestudy<img src="<?php echo get_template_directory_uri(); ?>/assets/images/rgt-arrw.png" alt="" title=""></a>
							 </div>
		           		</div>	
		            </div>
		        <?php endforeach;?>
		        <?php endif; ?> 
		        <?php wp_reset_query();?>   
		        </div>
			</div>	
		</div>