<?php
/**
 * The template for displaying all single category
 */

get_header();
 $tax = get_queried_object();
 $banner =  get_field('banner_image', $tax);
 $podcast = get_field('podcast_from', $tax); 
  if($tax->parent == 10){  ?>
    <div class="innerbanner">
      <img src="<?php echo $banner; ?>" alt="">
      <div class="container">
          <h2><?php echo $tax->name; ?></h2>
          <h4>A PODCAST FROM </h4>
          <h3><?php echo $podcast; ?></h3>
      </div>
    </div>


    <div class="innerepisode">
      <div class="container">
        <h3>EPISODES</h3>

        <?php $args = array('post_type' => 'post','tax_query' => array(array('taxonomy' => 'category','field' => 'term_id','terms' => $tax->term_id)),'posts_per_page' => -1,'order' => 'ASC');
            $loop = new WP_Query( $args ); $c =1;
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="standbx">
          <div class="stand-fst dvbx">
            <?php the_post_thumbnail('full'); ?>
          </div>
          <div class="stand-scnd dvbx">
            <h3><?php echo $c; ?>. <?php the_title(); ?></h3>
            <?php the_content(); ?>
            <h5><?php the_field('episode_date'); ?>   <?php the_field('episode_time'); ?></h5>
          </div>
          <div class="stand-thrd dvbx">
            <a href="javascript:void(0);" class="js-click-modal<?php echo $post->ID;?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/playbtn.png" alt=""></a>
          </div>
        </div>
<?php $c++; endwhile; wp_reset_query(); ?>

      </div>
    </div>
  <?php }elseif($tax->parent == 11){ ?>
    <div class="innerbanner">
      <img src="<?php echo $banner; ?>" alt="">
      <div class="container">
          <h2><?php echo $tax->name; ?></h2>
          <h4>FEAT</h4>
          <h3><?php echo $podcast; ?></h3>
      </div>
    </div>

    <div class="innerepisode">
      <div class="container">
        <h3>EPISODES</h3>

        <?php $args = array('post_type' => 'post','tax_query' => array(array('taxonomy' => 'category','field' => 'term_id','terms' => $tax->term_id)),'posts_per_page' => -1,'order' => 'ASC');
            $loop = new WP_Query( $args ); $c =1;
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="standbx newstandbx text-center text-lg-left">
          <div class="row">
             <div class="col-lg-8 mb-5 mb-lg-0">
               <div class="swimg">
                 <?php the_post_thumbnail('full'); ?>
                  <a href="javascript:void(0);<?php //the_field('video_url'); ?>" class="play_two js-click-modal<?php echo $post->ID;?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/play2.png" alt=""></a>
				   <?php //echo do_shortcode(' [jwp-video]'); ?>
				   
				   <?php //echo $file = get_field('video_url'); ?>
				
               </div>
             </div>
             <div class="col-lg-4">
               <h3><?php echo $c; ?>. <?php the_title(); ?></h3>
             </div>
           </div> 
        </div>
		
		
					
        <?php $c++; endwhile; wp_reset_query(); ?>

   
        
        
      </div>
    </div>
  <?php } ?>
 <?php get_footer();?>


