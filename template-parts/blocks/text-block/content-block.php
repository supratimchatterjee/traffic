<?php 
$content = get_field('content');
?>
<div class="innerpg-first-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-8">
				<div class="content-sec pr-xl-5">
				<?php echo wpautop($content);?>
				</div>
			</div>
			
		</div>
	</div>	
</div>			