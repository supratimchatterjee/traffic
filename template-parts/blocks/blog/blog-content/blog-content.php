<div class="blog-inner-sec">
			<div class="container">
				<div class="job_search_holder blog-search-holder">
					<div class="job_search">
						<div class="searh_label">Zoeken</div>
						<div class="search_fld">
						   <form name="" id="t_blog_search" action="javascript:void(0);" method="post">
							<input type="text" name="btitle" id="btitle" placeholder="Zoek artikelen">
							<input type="submit" name="" value="">
						   </form>
						</div>
					</div>
					<div class="job_filter">
						<div class="searh_label">Filteren:</div>
						<div class="search_fld">
							<?php
								if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) ) : 
						 
									echo '<select name="categoryfilter" id="categoryfilter"><option value="">Selecteer categorie...</option>';
									foreach ( $terms as $term ) :
										echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>
					</div>
				</div>
				<div class="blog-page-area" style="position:relative;">
				    <div id="spinner" style="display:none;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/spinner.svg"></div> 
				    <div id="blog_res_area">
					<div class="row">
					<?php
					// THIS LOOP WILL SHOW ALL POSTS BY DEFAULT
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 9,
						'paged' => $paged
					);
					$the_query = new WP_Query( $args ); ?>
    				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
					$category = get_the_category();
					$firstCategory = $category[0]->cat_name;
					?>
					
						<div class="col-lg-4 col-md-6">
							<div class="blogbox">
								<?php $thumb = get_the_post_thumbnail();?>
								<div class="disimgbx" style="position:relative;">
								<span class="uk-label-cat"><?php echo $firstCategory; ?></span>
			           			<?php if ($thumb):?>
			           				<a href="<?php echo get_the_permalink ();?>"><?php echo $thumb;?></a>
			           				<?php else:?>
			           				<img src="<?php echo get_template_directory_uri();?>/assets/images/placeholder.jpg">	
			           			<?php endif;?>
								</div>
			           			<h5>Door <span><?php echo get_the_author ();?></span>  • <?php echo get_the_date ( 'F j, Y');?></h5>
			           			<h2><a href="<?php echo get_the_permalink ();?>"><?php the_title ();?></a></h2>
	                        </div>
						</div>
					<?php endwhile;?>	
					<?php endif; ?>
					</div>
					<div class="pagination">
						<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>	
					</div>
					<?php wp_reset_postdata(); ?>
					
					</div>
					
					
					
					
				</div>
			</div>
		</div>