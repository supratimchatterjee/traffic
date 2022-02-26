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
		<div class="inner-white inner-white2 tag_title">
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
							<?php while (have_posts()) : the_post(); ?>
								<div class="vacancy-bx">
								<a href="<?php the_permalink ();?>"><h3><?php the_title ();?></h3></a>
								<?php 
								$cat_list=array();
								$terms_werkervaring = get_the_terms($post->ID, 'werkervaring');
								foreach($terms_werkervaring as $term_werkervaring) {
									//echo $term_werkervaring->name;
									array_push($cat_list,$term_werkervaring->name);
								}
								
								$terms_vakgebieden = get_the_terms($post->ID, 'vakgebieden');
								foreach($terms_vakgebieden as $term_vakgebieden) {
									//echo $term_vakgebieden->name;
									array_push($cat_list,$term_vakgebieden->name);
								}
								
								$terms_dienstverband = get_the_terms($post->ID, 'dienstverband');
								foreach($terms_dienstverband as $term_dienstverband) {
									//echo $term_dienstverband->name;
									array_push($cat_list,$term_dienstverband->name);
								}
								
								$terms_opleidingsniveau = get_the_terms($post->ID, 'opleidingsniveau');
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
								<?php if(get_post_type( get_the_ID()) =="vacatures"):?>
								<a href="<?php the_permalink ();?>" class="more">Bekijk deze vacature <img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
								<?php else: ?>
								<a href="<?php the_permalink ();?>" class="more">Bekijk casestudy <img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
								<?php endif; ?>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>


<?php
get_footer();
