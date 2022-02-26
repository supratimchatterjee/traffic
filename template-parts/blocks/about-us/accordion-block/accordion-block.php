<?php
$id = 'accr-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accr';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}
?>
<div style="background-color:#F3F3F7;">
<div class="container">
   <div class="why_accrodian_section <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id);?>">
      <div class="why_accro">
         <?php if(have_rows('accordion')):?>
         <ul>
            <?php while(have_rows('accordion')): the_row(); ?>
            <?php $selected = get_sub_field('select_to_open');?>
            <?php if ($selected):?>   
            <li class="selected">
            <?php else:?>
               <li>
            <?php endif;?>   
               <a href="#"><?php the_sub_field('headin_acrd');?></a>
               <ul>
                  <li>
                     <?php the_sub_field('content_acb');?>
                  </li>
               </ul>
            </li>
         <?php endwhile?>
         </ul>
        <?php endif;?> 
      </div>
   </div>
</div>
</div>

