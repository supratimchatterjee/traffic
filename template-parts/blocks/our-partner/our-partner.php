<div class="seventhsec">
           <div class="container">	
           	   <h2><?php the_field('heading_opl'); ?></h2>
           	   <div class="row">
                <?php if(have_rows('logo_opl')):?>
                 <?php while(have_rows('logo_opl')): the_row();?> 
                  <div class="col-lg-3 col-md-6">	
                  	 <div class="part-logo-bx">	
                  	 	<img src="<?php the_sub_field ('image_opl'); ?>" alt="" title="">
                  	 </div>
                  </div>
                <?php endwhile;?>
                <?php endif;?>  
           	   </div>	
           </div>
		</div>