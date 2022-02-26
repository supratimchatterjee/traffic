<div class="innerpg-first-sec">
      <div class="container">
        <h2><span><?php the_field('sub_heading_otc');?></span><?php the_field('heading_otc');?></h2>
        <?php the_field('content_otc');?>
        <div class="team_img_holder">

<?php
  $args = array(
    'post_type' => 'consultant',
    'post_status' => 'publish',
    'posts_per_page' => '-1',
    'order'=> 'ASC'
  );
  $post_loop = new WP_Query( $args );
  if ( $post_loop->have_posts() ) :
    $i=1;
    while ( $post_loop->have_posts() ) : $post_loop->the_post();
      ?>
          <div class="team_bx img_border">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal<?php echo $i;?>"><?php echo the_post_thumbnail (array(70,70));?></a>
          </div>
<?php $i++;?>
<?php endwhile;?>
<?php endif;?>
<?php  wp_reset_query();?>    
      </div>
    </div>

<!-- Modal -->
<?php
  $args_2 = array(
    'post_type' => 'consultant',
    'post_status' => 'publish',
    'posts_per_page' => '-1',
    'order'=> 'ASC'
  );
  $pos_loop_2 = new WP_Query( $args_2 );
  if ( $pos_loop_2->have_posts() ) :
    $s=1;
  while ( $pos_loop_2->have_posts() ) : $pos_loop_2->the_post(); ?>
<div class="modal fade team_modal" id="myModal<?php echo $s;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body">
            <div class="team_modal_top">
                <div class="team_img">
                  <?php echo get_the_post_thumbnail ();?>
                </div>
                <div class="team_content">
                  <h2><?php the_title()?></h2>
                  <?php $tid = get_the_ID(); ?>
                  <h3><?php echo get_field ('designation_team',$tid) ;?></h3>
                  <?php the_content();?>
                </div>
            </div>
        <div class="team_modal_bottom">
              <h2>Blog posts by <?php the_title();?></h2>
              <div class="team_blog_holder">
            <?php $post_objects = get_field('related_post',$tid);?>
              <?php if ($post_objects):?>
              <?php foreach ($post_objects as $post_object):?>
                <div class="team_blog_box">
                  <div class="team_blog_box_inner">
                    <h2><a href="<?php echo get_the_permalink ($post_object->ID); ?>"><?php echo get_the_title ($post_object->ID); ?></a></h2>
                    <h3>by <span class="author_name"><?php the_title(); //echo get_the_author($post_object->ID); ?></span> | <span class="blog_date"><?php echo get_the_date( 'F j, Y', $post_object->ID ); ?></span></h3>
                  </div>
                </div>
              <?php endforeach;?>
            <?php endif; ?> 
            <?php wp_reset_query();?> 
                <div class="team_blog_box">
                  <div class="team_blog_box_inner blog_all_btn_holder">
                    <a href="/blog/" class="btn_all_blog">Alle blogs bekijken <img src="<?php echo get_template_directory_uri ();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      
    </div>
  </div>
  <button type="button" class="btn btn-prev"><img src="<?php echo get_template_directory_uri ();?>/assets/images/team_prev.png" alt=""></button>
      <button type="button" class="btn btn-next"><img src="<?php echo get_template_directory_uri ();?>/assets/images/team_next.png" alt=""></button>
</div>
<?php $s++;?>
<?php endwhile;
endif;?>
<?php wp_reset_query();?>
</div>
