<?php
/**
 * The template for displaying all single posts
 */

get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="clearfix"></div>
<div class="banner innerbanner blg-details-banner">
  <?php 
  $category = get_the_category();
  $firstCategory = $category[0]->cat_name;
  $category_link = get_category_link($category[0]->term_id);
  

  $hm= get_field('ban_image_single_page'); 
  $img_atts = wp_get_attachment_image_src($hm, 'full');
  ?>
  <?php if ($hm!=""):?> <img src="<?php echo $img_atts[0]; ?>" alt="" class="inner-bannrimg" title="">
  <?php else:?>
    <img src="<?php echo get_template_directory_uri();?>/assets/images/blogdetailsinner.jpg" alt="" class="inner-bannrimg" title="">
  <?php endif;?> 
  
   <div class="container-fluid postion-abs-inner">
      <div class="inner-white inner-white2">
         <h1><?php the_title();?></h1>
		 <p class="cat_name">
		<?php foreach($category as $cat){
			$cat_link = get_category_link($cat->term_id);
			$cat_name = $cat->cat_name;
			?>
			<a href="<?php echo $cat_link;?>"><?php echo $cat_name; ?></a> / 
			<?php 
			//echo "dd ".$cat->cat_name;
		}	 
		?>
		</p>
		 
		 
      </div>
   </div>
</div>
 <div class="innerpg-first-sec">
      <div class="container">
        <div class="row">
          <div class="col-xl-8">
            <div class="content-sec pr-xl-5">
			<div class="author_holder">
			  <?php echo get_avatar( get_the_author_meta( 'ID' ) , 80 ); ?>	
			  <h6><?php the_author() ?>
			  <span><?php the_time( 'd F Y' ); ?> / <a href="<?php echo $category_link;?>"><?php echo $firstCategory;?></a></span>
			  </h6>
			</div>  
			  <div class="single_post_details">
              <?php the_content ();?>
			  </div>
            <div class="blogdtls-down">
                <h3>Samen in gesprek? <a target="_blank" href="https://www.linkedin.com/company/traffic-builders-online-marketing-intelligence/">Voeg mij toe op LinkedIn!</a></h3>
				<h5>Deel dit bericht</h5>
				<div class="innersocial innersocial-mb">
				  <?php echo do_shortcode('[social]');?>
				</div>    
            </div>
                          
              <?php // echo do_shortcode('[contact-form-7 id="60769" title="Blog Single Form"]');
			  
			  // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			  
			  
			  ?>
			  
			  
				</div>
              </div>
          </div>
          <div class="col-xl-4">
            <div class="right-sidebar blog-details-right">
              <?php echo do_shortcode('[gravityform id="2" title="true" description="true" ajax="true"]');?>
            </div>
            <?php
			/*	
			  $category = get_the_category();
              $category_link = $category[0];
              $firstCategory = $category[0]->cat_name;
			?>
            <div class="right-sidebar-two blog-right-again">
              <div class="inner-right-sidebar-top">
                <h2>Meer interesante blogs over</h2>
                <a href="<?php echo get_category_link( $category_link);?>" class="model"><?php echo $firstCategory;?><img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
              </div>
            </div>
			<?php */?>
			
			<div class="right-sidebar-two blog-right-again">
              <div class="inner-right-sidebar-top tag_holder">
                <h2>Meer interesante blogs over</h2>
				<?php 
				$post_tags = get_the_tags();
				if ( ! empty( $post_tags ) ) {
					
					foreach( $post_tags as $post_tag ) {
						echo '<a class="model" href="'. get_tag_link( $post_tag ) . '">'. $post_tag->name . '<img src="'.get_template_directory_uri ().'/assets/images/rgt-arrw.png" alt="" title=""></a>';
					}
					
				}   
				?>
              </div>
            </div>
			
            <div class="right-sidebar-two right-sidebar-two-again">
              <div class="inner-right-sidebar-top">
                <h2>Misschien wil je ook het andere bericht lezen</h2>
                <?php
                   $args = array (
                  'post_type'              => 'post',
                  'posts_per_page'         => '5',
                  'post__not_in'           => array(get_the_ID())
                                  );
                      $query = new WP_Query( $args );
                      if ( $query->have_posts() ) : 
                      while ( $query->have_posts() ) : $query->the_post();?>
                <a href="<?php echo get_the_permalink ();?>" class="new-postbx">
                  <h3><?php the_title();?></h3>
                  <h4>Door <span><?php echo get_the_author ();?></span> • <?php echo get_the_date( 'M d, Y'); ?></h4>
                </a>
                <?php endwhile;
                      endif; 
                  wp_reset_postdata();?>
                <a href="<?php echo esc_url( get_page_link( 20 ) ); ?>" class="model">View more blogs<img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                
              </div>
              
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
    <?php if (have_rows('logo_bpsa')):?>  
      <div class="seventhsec">
             <div class="container">  
                 <h2>Our Partners</h2>
                 <div class="row">
                  <?php while (have_rows ('logo_bpsa')): the_row();?>
                    <div class="col-lg-3 col-md-6"> 
                       <div class="part-logo-bx"> 
                        <img src="<?php the_sub_field ('image_bpsa');?>" alt="" title="">
                       </div>
                    </div>
                   <?php endwhile;?> 
                 </div> 
             </div>
      </div>
    <?php endif;?>  


<?php endwhile;?>
<?php endif;?>    
 <?php get_footer();?>


