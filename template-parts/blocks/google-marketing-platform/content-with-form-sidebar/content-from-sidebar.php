<?php
$id = 'rlltslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'rlltslider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}
?>

<div class="innerpg-first-sec">
			<div class="container">
				<div class="row">
					<div class="col-xl-8">
						<div class="content-sec pr-xl-5">	
							<div class="fsrt-p">
								<?php the_field('first_paragraph_casf');?>
							</div>
							<?php the_field('second_paragraph_casf');?>
							<?php  $pic_mdl = get_field('image_casf');
							if(!empty($pic_mdl)):
							?>
							<div class="text-center">
								<img src="<?php the_field('image_casf');?>" alt="" titel="" class="ggl-plat">
							</div>
							<?php endif; ?>
                            <?php  $third_pragraph_casf = get_field('third_pragraph_casf');
							if(!empty($third_pragraph_casf)):
							?>
                            <div class="google-ul">	
                            	<?php the_field('third_pragraph_casf');?>
                            </div>
							<?php endif; ?>
							<?php  
							$fourth_paragraph_casf = get_field('fourth_paragraph_casf');
							$fifth_paragraph_casf = get_field('fifth_paragraph_casf');
							if(!empty($third_pragraph_casf) || !empty($fifth_paragraph_casf)): 
							?>
                            <div class="google-ul">	
                                <?php the_field('fourth_paragraph_casf');?>
                                <?php the_field('fifth_paragraph_casf');?>
   							</div>
							<?php endif; ?>
							
   							    <?php $lindin = get_field('linkedin_casf');?>
   							    <?php $fab = get_field('facebbok_casf');?>
   							    <?php $twtr = get_field('twitter_casf');?>
   							    <?php $wapp = get_field('whatsapp_casf');?>
   							    <?php $lin = get_field('link_casf');?>
   							    <?php $emai = get_field('email_casf');?>
								<?php if(!empty($lindin) || !empty($fab) || !empty($twtr) || !empty($wapp) || !empty($lin) || !empty($emai) ):?>
   							    <div class="innersocial innersocial-mb">
							    	<?php 
									echo do_shortcode('[social]');
									/*?>
									<ul>
							    	    <?php if($lindin):?><li><a href="<?php echo $lindin;?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li><?php endif;?>	
		              	 		        <?php if($fab):?><li><a href="<?php echo $fab ;?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li><?php endif;?>
		              	 		        <?php if($twtr):?><li><a href="<?php echo $twtr ;?>" target="_blank"><i class="fab fa-twitter"></i></a></li><?php endif;?>
		              	 		        <?php if($wapp):?><li><a href="<?php echo $wapp;?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li><?php endif;?>
		              	 		        <?php if($lin):?><li><a href="<?php echo $lin;?>" target="_blank"><i class="fas fa-link"></i></a></li><?php endif;?>
		              	 		        <?php if($emai):?><li><a href="<?php echo $emai;?>" target="_blank"><i class="far fa-envelope"></i></a></li><?php endif;?>
		              	 		    </ul>
									<?php */ ?>
							    </div>
								<?php endif; ?>
								
   							</div>
					</div>
					<div class="col-xl-4">
						<div class="right-sidebar">
							<?php the_field('form_casf');?>
						</div>
					</div>
					<?php if (have_rows('slider_casf')):?>
					<div id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($className); ?> col-xl-12">	
						<h3><?php the_field('heading_ss');?></h3>
						    <div class="related-crsl owl-carousel owl-theme" >
						    	
						    		<?php while(have_rows('slider_casf')): the_row();?>
						    		<div class="item">	
						    		<div class="rltdimg">
						    			<img src="<?php the_sub_field('image_sli_casf');?>" alt="">
						    		</div>
						    	</div>
						    <?php endwhile;?>
						    </div>
					</div>
					<?php endif;?>
					
				</div>
			</div>
		</div>