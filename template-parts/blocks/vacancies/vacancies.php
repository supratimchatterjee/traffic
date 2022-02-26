		<div class="innerpg-first-sec">
			<div class="container">
				<div class="job_search_holder">
					<div class="job_search">
						<div class="searh_label">Zoeken</div>
						<div class="search_fld">
						<form name="" id="t_job_search" action="javascript:void(0);" method="post">
							<input type="text" name="j_title" id="j_title" placeholder="Vacature zoeken">
							<input type="submit" name="" value="">
						</form>	
						</div>
					</div>
					<div class="job_filter" id="job_filter">
						<div class="searh_label">Filteren:</div>
						
						<?php 
						$terms = get_terms( 'werkervaring' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							 echo '<div class="search_fld">';
							 echo '<select id="werkervaring">';
							 echo '<option value="">Ervaring</option>';
							 foreach ( $terms as $term ) {
							   echo '<option value="'.$term->term_id.'">' . $term->name . '</option>';								
							 }
							 echo '</select>';
							 echo '</div>';
						}
						?>
						
						<?php 
						$terms_employment = get_terms( 'dienstverband' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							 echo '<div class="search_fld">';
							 echo '<select id="dienstverband">';
							 echo '<option value="">Dienstverband</option>';
							 foreach ( $terms_employment as $term_employment ) {
							   echo '<option value="'.$term_employment->term_id.'">' . $term_employment->name . '</option>';								
							 }
							 echo '</select>';
							 echo '</div>';
						}
						?>
						
						<?php 
						$terms_educational = get_terms( 'opleidingsniveau' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
							 echo '<div class="search_fld">';
							 echo '<select id="opleidingsniveau">';
							 echo '<option value="">Opleidingsniveau</option>';
							 foreach ( $terms_educational as $term_educational ) {
							   echo '<option value="'.$term_educational->term_id.'">' . $term_educational->name . '</option>';								
							 }
							 echo '</select>';
							 echo '</div>';
						}
						?>

					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="vacancy_sidebar">
							<h3>Vacature categorieën</h3>
							<div class="vacancy_cat_list">
								<ul>
								  <?php 
								  $wcatTerms = get_terms('vakgebieden', array('hide_empty' => true, 'parent' =>0)); 
								  foreach($wcatTerms as $wcatTerm) :
								  ?>
									<li><a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a>	
										<?php $wcatTerms1 = get_terms('vakgebieden', array('hide_empty' => true, 'parent' =>$wcatTerm->term_id)); 
										if(!empty($wcatTerms1)):
										?>	
										<ul>
											<?php 
											$wcatTerms1 = get_terms('vakgebieden', array('hide_empty' => true, 'parent' =>$wcatTerm->term_id)); 
											foreach($wcatTerms1 as $wcatTerm1) :
											?>
											<li><a href="<?php echo get_term_link( $wcatTerm1->slug, $wcatTerm1->taxonomy ); ?>"><?php echo $wcatTerm1->name; ?></a></li>
											<?php endforeach ;  ?>
										</ul>
										<?php endif; ?>			
									</li>
								   <?php endforeach ;  ?>
								</ul>	
							</div>
						</div>
					</div>
					<div class="col-lg-8">
					    <div id="spinner" style="display:none;"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/spinner.svg"></div> 
						<div class="vacancy_holder" id="vacancy_holder">
						
						
						
						    <?php query_posts('post_type=vacatures&showposts=10&order=desc7orderby=date'); ?>
							<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							
							<div class="vacancy-bx">
								<?php the_title('<h3>','</h3>');?>
								
								<!-- <p><span>Unfortunately, this vacancy has already been filled. Still interested? Open applications are of course welcome!</span></p> -->
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
								
								<a href="<?php the_permalink();?>" class="more">Bekijk deze vacature<img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
							</div>
							
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
							

						</div>
					</div>
				</div>
			</div>
		</div>