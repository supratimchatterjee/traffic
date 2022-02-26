<?php
get_header(); 
// category (can be a parent category)
$current_cat_ID = get_query_var('cat');
?>
<div class="clearfix"></div>
<?php if ( have_posts() ) : ?>
<div class="banner innerbanner">
<img src="<?php echo get_template_directory_uri ();?>/assets/images/blogdetailsinner.jpg" alt="" class="inner-bannrimg" title="">
	<div class="container-fluid postion-abs-inner">
		<div class="inner-white inner-white2">
			<h1><?php single_term_title(); ?></h1>
			<?php the_archive_description(); ?>
		</div>
	</div>	
</div>
<?php endif; ?>
		
<div class="innerpg-first-sec">
			<div class="container">

				<div class="row">
					<div class="col-lg-4">
						<div class="vacancy_sidebar">
							<h3>Blog categorieën</h3>
							<div class="vacancy_cat_list">
								<ul>
									<?php 
									$categories = get_categories();
									foreach($categories as $category) {
										if($current_cat_ID==$category->term_id){
											$cls="active";
										}else{
											$cls="";
										}
									   echo '<li class="'.$cls.'"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="vacancy_holder">
						
						    <?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
							<div class="vacancy-bx">
								<?php the_title('<h3>','</h3>');?>
								<?php the_excerpt();?>
			
								<a href="<?php the_permalink();?>" class="more">Lees verder <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rgt-arrw.png" alt="" title=""></a>
							</div>
							
							<?php endwhile; ?>
						</div>
						<div class="clearfix" style="clear:both;"></div>
							<div class="post_navigation" style="padding-top:35px;">
							<div class="clearfix"></div>
							<?php wp_pagenavi(); ?>
							</div>

							<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
					</div>
				</div>
			</div>
		</div>


<?php
get_footer();
