<?php 
$rows = get_field('tab_row');
$rows_count = count($rows);
?>
<div class="innerpg-first-sec">
			<div class="container">	
				<div class="reach-tab-sec">	
					<!--tab section start-->
                    <div class="tab-menu">
					      <ul>
						    <?php for ($x = 1; $x <= $rows_count; $x++) { ?>
							   <?php if($x==1):?>
							   <li><a href="#" class="active" data-rel="tab-1"><div class="tab-menu-box left-skew"></div></a></li>
							   <?php else: ?>
							   <li><a href="#" data-rel="tab-<?php echo $x;?>" class=""><div class="tab-menu-box left-skew<?php echo $x;?>"></div> <div class="clearfix"></div></a></li>
							   <?php endif; ?>
							   
							<?php } ?>
					      </ul>
					</div>

					<div class="tab-main-box">
					
						<?php if( $rows ) { 
						    $c=1;
						    foreach( $rows as $row ) {
						?>
					    <div class="tab-box" id="tab-<?php echo $c;?>" <?php if($c==1) echo 'style="display:block;"';?>>
					        <h2><?php echo $row['tab_heading']; ?></h2>
					        <?php echo wpautop( $row['tab_content'] ); ?>
					    </div>
						
						<?php $c++; } } ?>

					</div>
				</div>				
			</div>
		</div>