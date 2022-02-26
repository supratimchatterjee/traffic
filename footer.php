<footer>
           <div class="container">  
              <div class="innerfotcontent"> 
<?php
    if(is_active_sidebar('address-column'))
    {
        dynamic_sidebar('address-column');
    }
?>

                 <div class="inrfootbx">
                  <h2>Diensten</h2>
                  <div class="footbox footbx-menu">
				        <?php wp_nav_menu( array( 'theme_location' => 'services-menu','menu_class'=>'','menu_id'=>'','container'=>'','link_after'=>'<img src="'.get_template_directory_uri().'/assets/images/rgt-arrw.png" alt="" title="">') ); ?> 
                  </div>
                 </div>
                 <div class="inrfootbx">
                  <h2>Over Traffic Builders</h2>
                  <div class="footbox footbx-menu footbx-menu3">
				    <?php wp_nav_menu( array( 'theme_location' => 'about-traffic-builder-menu','menu_class'=>'','menu_id'=>'','container'=>'','link_after'=>'<img src="'.get_template_directory_uri().'/assets/images/rgt-arrw.png" alt="" title="">') ); ?>  
                  </div>
                 </div>
              </div>
              
				<div class="footermiddlecontent %2$s">
					<?php
						if(is_active_sidebar('form-column'))
						{
							dynamic_sidebar('form-column');
						}
					?>


                 <div class="right-miidle-foot">
                  <h2>Social Media</h2>

                    <?php 
                      $facebook = of_get_option('facebook'); 
                      $twitter = of_get_option('twitter'); 
                      $instagram = of_get_option('instagram'); 
                      $linkedin = of_get_option('linkedin'); 
                    ?>


                  <ul>  
                    <?php if($facebook):?>
                    <li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>                      
                    <?php endif;?>
                    <?php if($instagram):?>
                    <li><a href="<?php echo $instagram; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  <?php endif;?>
                  <?php if($linkedin):?>
                    <li><a href="<?php echo $linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                  <?php endif;?>  
                  <?php if($twitter):?>
                    <li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                  <?php endif;?>  
                  </ul>
                 </div>
              </div>
              <div class="footerlastcontent">
                 <div class="ftrlast-text">
                 <?php $footerText = of_get_option('footer-text'); ?>
                  <p><?php echo $footerText; ?></p>
                 </div>
                 <div class="ftrlast-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/foot-lgo.png" alt="" title="">  </div>
              </div>
           </div> 
    </footer>
    <div class="end-footer">  
      <div class="container"> 
        <div class="row align-items-center" > 

                <?php
					if(is_active_sidebar('footer-last-menu'))
					{
						dynamic_sidebar('footer-last-menu');
					}
				?>
         
          <?php $copyText = of_get_option('copy-text'); ?>
          <div class="col-lg-5 order-lg-1"><p><?php echo $copyText;?></p></div>
        </div>
      </div>
    </div>  
  </div>
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script> 
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
var themeFolder = '<?php echo esc_url(home_url()); ?>'; 
</script> 

<script>
function copyToClipboard(element) {
 alert("Gekopieerde link");	
 var $temp = $("<input>");
 $("body").append($temp);
 $temp.val($(element).html()).select();
 document.execCommand("copy");
 $temp.remove();
}
</script>		
<?php wp_footer(); ?>
</body>
</html>
