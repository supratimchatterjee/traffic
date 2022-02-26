<div class="first-section">
  <?php if (have_rows('box_wh')):?>
      <div class="servicearea">
        <div class="container">
          <div class="row">
             <?php while( have_rows('box_wh') ) : the_row();?> 
              <div class="col-md-4">
              <div class="servbx">
                <?php if (have_rows('first_section_wh')):?>
             <?php while( have_rows('first_section_wh') ) : the_row();?> 
                  <a href="<?php the_sub_field('link_wh');?>" class="servlink">
                    <div class="servlink-imgbx">
                      <img src="<?php the_sub_field('image_wh');?>" alt="" title="">
                    </div>
                    <span><?php the_sub_field('text_wh');?></span>
                  </a>
                 <?php endwhile;?>
               <?php endif;?>
                <div class="line"></div>
                <div class="text-center">
                  <a href="<?php the_sub_field('button_link_wh');?>" class="more"><?php the_sub_field('button_label_wh');?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rgt-arrw.png" alt="" title=""></a>
                </div>
              </div>
              </div>
          <?php endwhile;?>
          </div>
        </div>
      </div>
        <?php endif;?>
      <div class="orglogo">
        <div class="container">
          <div class="heading-area">
            <div class="leftheading">
              <h2><?php the_field ('title_org'); ?></h2>
            </div>
            <div class="view-btn">
              <a href="<?php the_field ('right_link_org'); ?>" class="view"><?php the_field('right_text_org'); ?><img src="<?php echo get_template_directory_uri(); ?>/assets/images/rgt-arrw.png" alt="" title=""></a>
            </div>
          </div>
          <div class="row align-items-center">
          <?php if( have_rows('organiztion_logo') ): ?>    
          <?php while( have_rows('organiztion_logo') ): the_row(); ?>
            <?php $org_link = get_sub_field ('link_org_logo');?>
            <div class="col-lg-2 col-md-4">
              <div class="orgbox">
              <?php if ($org_link):?>
                <a href="<?php the_sub_field('link_org_logo'); ?>" target="_blank">
                  <img src="<?php the_sub_field('image_org'); ?>" alt="" title=""> 
                  <div class="case">Case</div>
                </a> 
                <?php else:?>
                  <img src="<?php the_sub_field('image_org'); ?>" alt="" title=""> 
              <?php endif;?>
              </div>
            </div>
          <?php endwhile;?>
          <?php endif;?>          
          </div>
        </div>
      </div>
    </div>  