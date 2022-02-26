<div class="banner">
   <img src="<?php the_field ('image_ban_home');?>" alt="" class="bannrimg" title="">
   <div class="container positn-abs">
      <h1><span><?php the_field ('title');?></span></h1>
      <a href="<?php the_field ('button_link');?>" class="dirct"><?php the_field ('button_text');?></a>
      <div class="clearfix"></div>
      <div class="awrd-logo-all">
         <?php $fst_lg = get_field ('first_logo');?>
         <?php $snd_lg = get_field ('second_logo');?>
         <?php $thrd_lg = get_field ('third_logo');?>
          <?php if ($fst_lg):?>
         <div class="awrdlg">
            <img src="<?php the_field ('first_logo');?>" alt="" title="">
         </div>
         <?php endif;?>
          <?php if ($snd_lg):?>
         <div class="awrdlg">
            <img src="<?php the_field ('second_logo');?>" alt="" title="">
         </div>
         <?php endif;?>
         <?php if ($thrd_lg):?>
         <div class="awrdlg">
            <img src="<?php the_field ('third_logo');?>" alt="" title="">
         </div>
      <?php endif;?>
      </div>
      <div class="clearfix"></div>
   </div>
</div>

