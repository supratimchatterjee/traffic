<div class="innerpg-first-sec case-list-sec">
			<div class="container">
				<div class="job_search_holder casefilter-holder">
					<div class="job_search">
						<div class="searh_label">Zoeken</div>
						<div class="search_fld"> 
						  <form name="" id="case_t_search" action="javascript:void(0);" method="post">
							<input type="text" name="" id="case_t_val" placeholder="Zoek in cases">
							<input type="submit" name="" value="">
						  </form>	
						</div>
					</div>
					<div class="job_filter" id="case-filter">
						<div class="searh_label">Filteren:</div>
						<?php 
						$terms = get_terms( 'case_branches' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							 echo '<div class="search_fld">';
							 echo '<select id="case_branches">';
							 echo '<option value="">Alle branches</option>';
							 foreach ( $terms as $term ) {
							   echo '<option value="'.$term->term_id.'">' . $term->name . '</option>';								
							 }
							 echo '</select>';
							 echo '</div>';
						}
						?>
						<?php 
						$terms = get_terms( 'case_cat' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							 echo '<div class="search_fld">';
							 echo '<select id="case_cat">';
							 echo '<option value="">Alle disciplines</option>';
							 foreach ( $terms as $term ) {
							   echo '<option value="'.$term->term_id.'">' . $term->name . '</option>';								
							 }
							 echo '</select>';
							 echo '</div>';
						}
						?>
						
					</div>
				</div>
				<div class="caselistarea" style="position: relative;">	
                    <div id="spinner" style="display:none;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/spinner.svg"></div>    
					<div id="caseres">	
					<div class="row">
					<?php
					// THIS LOOP WILL SHOW ALL POSTS BY DEFAULT
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args = array(					
					'post_type' => 'cases',
					'posts_per_page' => 9,
					'post_status' => 'publish',
					'paged' => $paged,
					'order' => 'ASC',
					'orderby'  => 'date'
					);
					$the_query = new WP_Query( $args ); ?>
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col-lg-4">
                            <div class="disbox">
			           			<div class="disimgbx"><a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail();?></a></div>
			           			<h2><a href="<?php the_permalink();?>"><?php the_title ();?></a></h2>
	                             <div class="line">	</div>
	                             <div class="text-center">
									<a href="<?php the_permalink();?>" class="more">Bekijk casestudy <img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
								 </div>
			           		</div>
                        </div>
					<?php endwhile;?>	
					<?php endif; ?>
					</div>	
					<div class="pagination pagination-two">
						<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>	
					</div>
					<?php wp_reset_postdata(); ?>

					</div>


				</div>	
			</div>
		</div>