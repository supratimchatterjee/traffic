<?php
   /**
    * The template for displaying all single posts related to case post type
    */
get_header();?>
<style>
.right-sidebar-two{margin-bottom:25px;}
.innerpg-first-sec ul li a{color: #e5232f;}
.part_logo{padding-right:112px;}
.part_logo_holder{width: 262px;height: 262px; background-color:#fff;border-radius: 50%;display: flex;justify-content: center;align-items: center; padding:40px;}
</style>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="clearfix"></div>
<?php $case_banner = get_field('banner_psa');
$banner_featured_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
$sub_heading= get_field('banner_sub_heading');

$show_contact_section= get_field('show_contact_section');
$contact_heading= get_field('contact_heading');
$contact_description= get_field('contact_description');
$contact_link= get_field('contact_link');
$select_additional_link= get_field('select_additional_link');
?>
<div class="banner innerbanner">
  <?php if ($case_banner):?>
   <img src="<?php echo $case_banner;?>" alt="" class="inner-bannrimg" title="">
   <?php else:?>
    <img src="<?php echo $banner_featured_img;?>" alt="" class="inner-bannrimg" title="">
   <?php endif;?> 
   
   <div class="container-fluid postion-abs-inner">
      <div class="inner-white inner-white2">
         <h1><?php the_title ();?></h1>
		 <?php echo wpautop($sub_heading);?>
      </div>
	  <?php if( have_rows('our_partners_csa') ): ?>
	  <div class="part_logo">
	    <div class="part_logo_holder">
	    <?php while( have_rows('our_partners_csa') ): the_row(); 
        $image = get_sub_field('logo_csa');
        ?>
			<img src="<?php echo $image;?>" alt="" class="" title="">
		<?php endwhile; ?>
	    </div>
	  </div>
	  <?php endif; ?>
   </div>
</div>
<?php
if($post->ID=="61443"){
	$cls = "col-xl-12";
	$con_clas = "container-fluid";
}else{
	$cls = "col-xl-8";
	$con_clas = "container";
}
?>
<div class="innerpg-first-sec">
   <div class="<?php echo $con_clas;?>">
      <div class="row">
         <div class="<?php echo $cls;?>">
            <div class="content-sec pr-xl-5">
               <?php the_content();?>
            </div>
         </div>

         <div class="col-xl-4">
		    <?php if( $show_contact_section && in_array('Yes', $show_contact_section) ) { ?>
		    <div class="right-sidebar-two case-right-slide">
               <div class="inner-right-sidebar-top">
                  <h2><?php echo $contact_heading;?></h2>
                  <?php echo wpautop($contact_description);?> 
                  <a href="<?php echo $contact_link;?>" class="model">Neem contact op<img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                
               </div>
            </div>
			<?php } ?>
			
			<?php  $terms = get_the_terms( $post->ID, 'case_cat' );
			if(!empty($terms)){
			?>
            <div class="right-sidebar-two case-right-slide">
               <div class="inner-right-sidebar-top">
                  <h2><?php the_title();?></h2>
                  
                  <?php foreach ( $terms as $term ):?>
                  <?php $term_link = get_term_link( $term );?>  
                  <a href="<?php echo $term_link;?>" class="model"><?php echo  $term->name;?><img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                <?php endforeach;?>
               </div>
            </div>
			<?php } ?>
			
			<?php if(!empty($select_additional_link)){?>
			<div class="right-sidebar-two case-right-slide">
               <div class="inner-right-sidebar-top">
                  <?php foreach($select_additional_link as $aa_link):?>
                  <a href="<?php echo get_the_permalink($aa_link->ID);?>" class="model"><?php echo $aa_link->post_title;?><img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                <?php endforeach;?>
               </div>
            </div>
			<?php } ?>
			
         </div>
      </div>
   </div>
</div>

<div class="more-case-sec">
   <div class="container">
      <div class="heading-area heading-area-mb-low">
         <div class="leftheading">
            <h4>We realiseren digitale ambities</h4>
            <h2>Meer gevallen</h2>
         </div>
         <div class="view-btn">
            <a href="/cases/" class="view">Meer cases <img style="display:inline-block;" src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
         </div>
      </div>
      <div class="discover-sec owl-carousel owl-theme" >
         <?php
          $args = array (
        'post_type'              => 'cases',
        'posts_per_page'         => '9',
        'post__not_in'           => array(get_the_ID())
                                  );
         $query = new WP_Query( $args );
         if ( $query->have_posts() ) : 
         while ( $query->have_posts() ) : $query->the_post();?>
          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
           <div class="item">
              <div class="disbox sngl-cs">
                 <div class="disimgbx"><a href="<?php echo get_the_permalink();?>"><img src="<?php echo $url;?>" alt="" title=""></a></div>
                 <h2><a href="<?php echo get_the_permalink();?>"><?php the_title ();?></a></h2>
                 <div class="line"> </div>
                 <div class="text-center">
                    <a href="<?php echo get_the_permalink();?>" class="more">Bekijk casestudy <img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                 </div>
              </div>
           </div>
          <?php endwhile;?>
          <?php endif;?> 
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
<?php if(have_rows ('our_partners_csa')):?>    
<div class="seventhsec">
   <div class="container">
      <h2>Our Partners</h2>
      <div class="row">
        <?php while(have_rows('our_partners_csa')): the_row ();?>
         <div class="col-lg-3 col-md-6">
            <div class="part-logo-bx"> 
               <img src="<?php the_sub_field ('logo_csa');?>" alt="" title="">
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