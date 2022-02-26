<?php 
$content = get_field('content_block');
?>
<div class="innerpg-first-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="content-sec">
				<?php echo wpautop($content);?>
				</div>
			</div>
			
		</div>
	</div>	
</div>			