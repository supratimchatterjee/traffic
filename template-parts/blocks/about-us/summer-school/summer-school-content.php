<?php 
$sm_heading		= get_field('sm_heading');
$sm_content		= get_field('sm_content');
$school_courses	= get_field('school_courses');

$info_box		= get_field('info_box');
$link_box		= get_field('link_box');

?>
<div class="innerpg-first-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-8">
				<div class="content-sec pr-xl-5">
					<?php if(!empty($sm_heading)):?>
					<div class="fsrt-p">
						<h2><?php echo $sm_heading;?></h2>
					</div>
					<?php endif; ?>
					<?php echo $sm_content; ?>
					

					<div class="sec_rpt_sec">
					
						<?php 
						if( $school_courses ) { 
						foreach( $school_courses as $school_courses_row ) {
						?>
						<hr>

						<h2><?php echo $school_courses_row['sc_heading'];?></h2>
						<?php echo $school_courses_row['sc_description'];?>
						<?php if(!empty($school_courses_row['sc_link'])):?>
						<div class="a-grp">
							<a href="<?php echo $school_courses_row['sc_link'];?>" class="model red"><?php echo $school_courses_row['text_sc'];?><img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
						</div>
						<?php endif; ?>
						
						<?php 
						} 
						} 
						?>
						
					</div>
				</div>
			</div>
			<div class="col-xl-4">
			    <?php 
				if( $info_box ) { 
				foreach( $info_box as $info_box_row ) {
				?>
				<div class="right-sidebar">
					<h2><?php echo $info_box_row['info_heading'];?></h2>
					<p><?php echo $info_box_row['info_description'];?></p>
					<?php if(!empty($info_box_row['info_link_text'])):?>
					<a href="<?php echo $info_box_row['info_link'];?>" class="inr-cont"><?php echo $info_box_row['info_link_text'];?> <img src="<?php echo get_template_directory_uri();?>/assets/images/white-arw.png" alt=""></a>
					<?php endif; ?>
				</div>
				<?php 
				} 
				} 
				?>
				
				<?php 
				if($link_box) { 
				foreach( $link_box as $link_box_row ) {
				?>
				<div class="right-sidebar-two right-sidebar-two-again">
					<div class="inner-right-sidebar-top">
						<h2><?php echo $link_box_row['link_heading'];?></h2>
						<p><?php echo $link_box_row['link_description'];?></p>
						
						<?php 
						$links = $link_box_row['l_links'];
						foreach( $links as $links_row ) { ?>
						<a href="<?php echo $links_row['l_link'];?>" class="model"><?php echo $links_row['link_text'];?> <img src="<?php echo get_template_directory_uri();?>/assets/images/rgt-arrw.png" alt="" title=""></a>
						<?php } ?>
						
					</div>
				</div>
				<?php 
				} 
				} 
				?>
				
			</div>
		</div>
	</div>
</div>