<?php
$id = 'blogslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blogslider';
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
<div id="<?php echo esc_attr($id); ?>" class="frth-sec <?php echo esc_attr($className); ?>">
			<div class="container">	
				<div class="heading-area">
					<div class="leftheading">
						<h4><?php the_field('sub_heading_bss'); ?></h4>
						<h2><?php the_field('heading_bss'); ?></h2>
					</div>
					<div class="view-btn">
						<a href="<?php the_field('button_link_bss'); ?>" class="view"><?php the_field('button_text_bss'); ?><img src="<?php echo get_template_directory_uri() ;?>/assets/images/rgt-arrw.png" alt="" title=""></a>
					</div>
				</div>
				<div class="blog-sec owl-carousel owl-theme" >
			<?php $post_objs = get_field('blog_slider_bss');?>
            	<?php if ($post_objs):?>
            	<?php foreach ($post_objs as $post_object):?>
					<?php $author_id = get_post_field( 'post_author', $post_object->ID );
					$author_name = get_the_author_meta('user_nicename', $author_id);?>
		            <div class="item">
		           		<div class="blogbox">
		           			<div class="disimgbx"><a href="<?php echo get_the_permalink($post_object);?>"><?php echo get_the_post_thumbnail ($post_object); ?></a></div>
		           			<h5>Door <span class="auth"><?php echo $author_name; ?></span> • <?php echo get_the_date( 'M d, Y', $post_object ); ?></h5>
		           			<h2><a href="<?php echo get_the_permalink($post_object);?>"><?php echo get_the_title ($post_object); ?></a></h2>
                        </div>	
		            </div>
		         <?php endforeach;?>
		         <?php endif;?> 
		         <?php wp_reset_query();?>  
		        </div>
			</div>	
		</div>
