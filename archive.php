<?php 
get_header(); ?>

		<div class="clearfix"></div>
	    <div class="banner innerbanner blg-details-banner">
	    	<img src="<?php echo get_template_directory_uri ();?>/assets/images/blogdetailsinner.jpg" alt="" class="inner-bannrimg" title="">
	    	<div class="container-fluid postion-abs-inner">
	    		<div class="inner-white inner-white2">
		    		<h1><?php echo single_cat_title();?></h1>
	    		</div>
	    	</div>
		</div>
		<div class="innerpg-first-sec">
			<div class="container">
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
		<div class="sixthsec">
            <div class="container">
                <div class="contuctinnrcont">
                  <div class="row justify-content-between">
                    <div class="col-lg-6">
                            <div class="heading-area heading-area2 heading-area3">
								<h4>Neem direct contact op</h4>
								<h2>Wil je graag weten wat Traffic Builders voor je kan betekenen?</h2>
							  </div>
							  <p>Neem contact met ons op en laat ons samenwerken om de kwaliteit van uw bedrijfsstrategieplan op te bouwen en te verbeteren.</p>
                    </div>  
                    <div class="col-lg-5">
                            <?php echo do_shortcode('[gravityform id="18" title="true" description="true" ajax="true"]');?>
                    </div>  
                  </div>  
                </div>
            </div>  
    </div>
<?php get_footer(); ?>
