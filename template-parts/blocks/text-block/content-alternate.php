<?php 
$rows = get_field('block');
if( $rows ) {
?>
<style>
.demo-right{padding: 48px 72px; position:relative;min-height: 400px;}
.uk-card-overlay {position: absolute;left: 0;right: 0;top: 0;bottom: 0;opacity: .75;}
.uk-card-holder {z-index: 1;position: relative;width: 100%;}
.uk-card-progress {margin: 16px 0;}
</style>
<div class="innerpg-first-sec">
	<div class="container-fluid">
	
	    <?php foreach( $rows as $row ) { 
		$heading 	= $row['heading'];
		$content 	= $row['content'];
		$image 		= $row['image'];
		$color 		= $row['color'];
		?>
		<div class="demo-boxarea">
			<div class="demo-left">
				<h2><?php echo $heading;?></h2>
				<?php echo wpautop($content);?>
			</div>
			<div class="demo-right" style="background: url(<?php echo $image;?>)0 0 no-repeat;background-size: cover;">
			<div class="uk-card-overlay" style="background-color: <?php echo $color;?>;"></div>
			
			</div>
		</div>
		<?php } ?>

	</div>
</div>			
<?php } ?>