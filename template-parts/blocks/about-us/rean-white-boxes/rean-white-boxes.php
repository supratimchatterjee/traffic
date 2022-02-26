<?php 
$title_wbr 			= get_field('title_wbr');
$subtitle_wbr 		= get_field('subtitle_wbr');
$white_boxes 	= get_field('white_boxes_wbr');
?>
<div class="box_holder" style="background-color:#F3F3F7;">
	<div class="container">	
		<div class="helpsec">
			<div class="heading-area mb-35">
				<div class="leftheading">
					<?php if(!empty($title_wbr)):?>
						<h4><?php echo $title_wbr;?></h4>
					<?php endif;?>
					<?php if(!empty($subtitle_wbr)):?>
						<h2><?php echo $subtitle_wbr;?></h2>
					<?php endif;?>
					
				</div>
			</div>
			<div class="marketingarea">
			
				<?php 
				if( $white_boxes ) { 
				foreach( $white_boxes as $white_boxes_row ) {
				?>

				<div class="right-sidebar-two right-sidebar-two-again mark-rean-box same-height-digital-bx">
					<div class="inner-right-sidebar-top">
						<div class="servlink servlink2">
							<div class="servlink-imgbx">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/icn1.png" alt="" title="">
							</div>
							<span><?php echo $white_boxes_row['title_wbr']; ?></span>
						</div>
						
						<?php 
						$linkdata = $white_boxes_row['links_wbr'];
						foreach( $linkdata as $linkdata_row ) { ?>
						   <a href="<?php echo $linkdata_row['link_wbrm'];?>" class="model"><?php echo $linkdata_row['link_text_wbr'];?> <img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
						<?php } ?>
					</div>
					
					<div class="inner-right-sidebar-bottom">
						<?php if($white_boxes_row['bottom_text_wbrm']):?><h5><?php echo $white_boxes_row['bottom_text_wbrm']; ?></h5><?php endif;?>
						<div class="tagsec mb-0 tagsec-two ">
						<?php 
						$tagdata = $white_boxes_row['tag_wbrm'];
						foreach( $tagdata as $tagdata_row ) { ?>
							<span class="tag" style="background-color:<?php echo $tagdata_row['tag_color_wbrm'];?>"><?php echo $tagdata_row['tag_text_wbrm'];?></span>
						<?php } ?>
						</div>
					</div>
					
				</div>
				<?php  } } ?>

			</div>
		</div>
	</div>
</div>