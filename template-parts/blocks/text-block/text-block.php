<?php 
$left_content = get_field('left_content');
$right_content = get_field('right_content');
?>
<div class="innerpg-first-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="content-sec pr-xl-5">
				<?php echo wpautop($left_content);?>
				</div>
			</div>
			
			<div class="col-xl-6">
				<div class="content-sec">
				<?php echo wpautop($right_content);?>
				</div>
			</div>
			
		</div>
	</div>	
</div>			