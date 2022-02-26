<div class="clearfix"></div>
       <div class="banner innerbanner">
         <img src="<?php the_field('background_image_ib'); ?>" alt="" class="inner-bannrimg" title="">
         <div class="psinrbnr">
           <div class="container">
               <div class="awrd-logo-all">
                 <?php $fst_lg = get_field ('first_logo_ib_a');?>
                 <?php $snd_lg = get_field ('second_logo_ib_a');?>
                 <?php $thrd_lg = get_field ('third_logo_ib_a');?>
                  <?php if ($fst_lg):?>
                 <div class="awrdlg">
                    <img src="<?php the_field ('first_logo_ib_a');?>" alt="" title="">
                 </div>
                 <?php endif;?>
                  <?php if ($snd_lg):?>
                 <div class="awrdlg">
                    <img src="<?php the_field ('second_logo_ib_a');?>" alt="" title="">
                 </div>
                 <?php endif;?>
                 <?php if ($thrd_lg):?>
                 <div class="awrdlg">
                    <img src="<?php the_field ('third_logo_ib_a');?>" alt="" title="">
                 </div>
              <?php endif;?>
              </div>
              <div class="clearfix"></div>
           </div>
         </div>
         
         
         <div class="container-fluid postion-abs-inner">
            <?php $r_padding = get_field ('remove_padding');?>
			<?php $m_width = get_field('set_a_max_width');?>
            <?php if ($r_padding):?>
               <div class="inner-white inner-white2 <?php if(is_page(1649)) echo 'inner-white4';?> <?php if(is_page(1700)) echo 'inner-white5';?>">
			   <?php elseif ($m_width):?>
			   <div class="inner-white inner-white3">
               <?php else:?>
            <div class="inner-white">
             <?php endif;?>  
                <?php $firstTagText = get_field ('first_tag_text_ib');?>
                <?php $secondTagText = get_field ('second_tag_text_ib');?>
                <?php $thirdTagText = get_field ('third_tag_text_ib');?>
                <?php $fourthTagText = get_field ('fourth_tag_text_ib');?>
			    <?php if(!empty($firstTagText) || !empty($secondTagText) || !empty($thirdTagText) || !empty($fourthTagText) ):?>
					<div class="tagsec">
					<?php if($firstTagText):?>
					   <span class="tag reach"><?php the_field('first_tag_text_ib'); ?></span>
					<?php endif;?>
					<?php if ($secondTagText):?>
					   <span class="tag engage"><?php the_field('second_tag_text_ib'); ?></span>
					<?php endif;?>  
					<?php if($thirdTagText):?> 
					   <span class="tag activate"><?php the_field('third_tag_text_ib'); ?></span>
					<?php endif;?>   
					<?php if($fourthTagText):?>
					   <span class="tag nurture"><?php the_field('fourth_tag_text_ib'); ?></span>
					<?php endif;?>   
					</div> 
				<?php endif; ?>

			
               <h1><?php the_field('heading_ib'); ?></h1>
			   <?php 
			   $pp = get_field ('sub_heading_ib');
			   if(!empty($pp)):
			   ?>
               <p><?php the_field('sub_heading_ib'); ?></p>
			   <?php endif; ?>
            </div>
         </div>
      </div>