<?php 
$reg_heading		= get_field('reg_heading');
$reg_description	= get_field('reg_description');
$reg_url			= get_field('reg_url');
?>
<div class="schrijf_section">
	<div class="container text-center">
		<h2><?php echo $reg_heading; ?></h2>
		<p><?php echo $reg_description; ?></p>
		<?php if(!empty($reg_url)):?>
			<a href="<?php echo $reg_url;?>" class="inr-cont">Registreer hier <img src="<?php echo get_template_directory_uri();?>/assets/images/white-arw.png" alt=""></a>
		<?php endif; ?>
	</div>
</div>