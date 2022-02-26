<?php 
$b_image 	= get_field('image');
$b_heading 	= get_field('heading');
$b_content 	= get_field('content');
?>
<div class="rean-sec">
	<div class="container">
		<div class="row justify-content-between align-items-center">
		    <?php if(!empty($b_image)):?>
			<div class="col-lg-5"><div class="text-center"><img src="<?php echo $b_image;?>" alt=""></div></div>
			<?php endif; ?>
			
			<div class="col-lg-6">
				<h3><?php echo $b_heading; ?></h3>
				<?php echo wpautop($b_content);?>
			</div>
		</div>

	</div>
</div>