<?php
get_header(); 
// category (can be a parent category)
$current_cat_ID = get_query_var('cat');
?>
<div class="clearfix"></div>

<div class="banner innerbanner">
<img src="<?php echo get_template_directory_uri();?>/assets/images/blogdetailsinner.jpg" alt="" class="inner-bannrimg" title="">
	<div class="container-fluid postion-abs-inner">
		<div class="inner-white inner-white2">
			<h1><?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Zoekresultaten voor "%s"', 'traffic_builders' ),
				'<span class="page-description search-term" style="color:#E30513;">' . esc_html( get_search_query() ) . '</span>'
			);
			?></h1>
		</div>
	</div>	
</div>

		
<div class="innerpg-first-sec">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				
					<h3 style="margin-bottom:0;"><?php
					printf(
						esc_html(
							/* translators: %d: The number of search results. */
							_n(
								'We hebben %d resultaat gevonden voor uw zoekopdracht.',
								'We hebben %d resultaten gevonden voor uw zoekopdracht.',
								(int) $wp_query->found_posts,
								'traffic_builders'
							)
						),
						(int) $wp_query->found_posts
					);
					?></h3>
				
			</div>

			<div class="col-lg-12" style="margin-top: 50px">
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
		
<div class="sixthsec">
	<div class="container">
		<div class="contuctinnrcont">
		  <div class="row justify-content-between">
			<div class="col-lg-6">
				<div class="heading-area heading-area2 heading-area3">
					<h4>Neem direct contact op</h4>
					<h2>Weten wat Traffic Builders voor jou kan betekenen?</h2>
				</div>
				<p>Ontdek onze awardwinning manier van werken en vul het contactformulier in.</p>
			</div>  
			<div class="col-lg-5">
				<div class="formarea">
					<?php echo do_shortcode('[gravityform id="18" title="true" description="true" ajax="true"]');?>
				</div>
			</div>  
		  </div>  
		</div>
	</div>  
</div>

<?php
get_footer();
