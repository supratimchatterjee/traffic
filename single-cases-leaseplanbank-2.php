<?php
   /**
    * The template for displaying all single posts related to case post type
    */
get_header();?>
<style>
.right-sidebar-two{margin-bottom:25px;}
.innerpg-first-sec ul li a{color: #e5232f;}
.part_logo{padding-right:112px;}
.part_logo_holder{width: 262px;height: 262px; background-color:#fff;border-radius: 50%;display: flex;justify-content: center;align-items: center;}
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
<?php the_content(); ?>

<?php endwhile;?>
<?php endif;?>    
<?php get_footer();?>