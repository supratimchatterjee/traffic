<?php
/**
 * The template for displaying all single posts
 */

get_header();?>
<style>
.dd img{display:inline-block !important;}
</style>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="clearfix"></div>
<div class="banner innerbanner blg-details-banner">
  <?php $hm= get_field('ban_image_single_page'); 
  $img_atts = wp_get_attachment_image_src($hm, 'full');
  ?>
  <?php if ($hm!=""):?> <img src="<?php echo $img_atts[0]; ?>" alt="" class="inner-bannrimg" title="">
  <?php else:?>
    <img src="<?php echo get_template_directory_uri();?>/assets/images/blogdetailsinner.jpg" alt="" class="inner-bannrimg" title="">
  <?php endif;?> 
  
   <div class="container-fluid postion-abs-inner">
      <div class="inner-white inner-white2">
         <h1><?php the_title();?></h1>
      </div>
   </div>
</div>
 <div class="innerpg-first-sec">
      <div class="container">
        <div class="row">
		  <div class="col-xl-3">
		    <?php if ( has_post_thumbnail() ) : ?>
            <div class="right-sidebar blog-details-right text-center dd">
			 <?php the_post_thumbnail('full'); ?>
            </div>
			<?php endif; ?>            
          </div>
          <div class="col-xl-9">
            <div class="content-sec pr-xl-5">
			  
			  <div class="single_post_details">
			  <?php the_title('<h2 style="margin-bottom: 0;">','</h2>');?>
			  
              <?php the_content ();?>
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


