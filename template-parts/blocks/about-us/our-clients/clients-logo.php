
		<div class="our_client_section">
			<div class="orglogo">
				<div class="container">
					<div class="row align-items-center">
						<?php if (have_rows('clients_logo_cl')):?>
							<?php while(have_rows('clients_logo_cl')): the_row();?>
									<?php $link_case = get_sub_field('link_cll');?>
								<div class="col-lg-2 col-md-4 col-6">
									<div class="orgbox">
										<?php if ($link_case):?>
										<a href="<?php echo $link_case;?>">
											<img src="<?php the_sub_field('logo_cll');?>" alt="" title="">
											<?php if ($link_case):?><div class="case">Case</div><?php endif;?>
										</a>
										<?php else:?>
											<img src="<?php the_sub_field('logo_cll');?>" alt="" title="">
									<?php endif;?>
									</div>
								</div>
							<?php endwhile;?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>