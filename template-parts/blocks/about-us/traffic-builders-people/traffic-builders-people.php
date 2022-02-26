<?php 
$heading_prefix = get_field ('heading_prefix');
$heading 		= get_field ('heading');
$content 		= get_field ('content');
?>
<div class="reqruitment-sec">	
	<div class="container">	
		<div class="row justify-content-between">	
			<div class="col-lg-5">
				<div class="heading-area heading-area2">
					<h4><?php echo $heading_prefix; ?></h4>
					<h2><?php echo $heading; ?></h2>
				</div>
				<?php echo wpautop($content);?>
			</div>
			<?php if( have_rows('builders') ): ?>
			<div class="col-lg-6">
				<div class="tbp-icon-all">
				    <?php 
					while( have_rows('builders') ): the_row(); 
					$req_icon 		= get_sub_field('req_icon');
					$req_heading 	= get_sub_field('req_heading');
					$req_link 		= get_sub_field('req_link');
					if(!empty($req_link)):
					?>
					<div class="tbp-icn tbp-icn-green">
						<a href="<?php echo $req_link;?>">
							<img src="<?php echo $req_icon;?>" alt="">
							<h5><?php echo $req_heading; ?></h5>
						</a>
					</div>
					<?php else:?>
					<div class="tbp-icn">
						<img src="<?php echo $req_icon;?>" alt="">
						<h5><?php echo $req_heading; ?></h5>
					</div>
					<?php endif ; ?>
					
					<?php endwhile; ?>
					
				</div>	
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>