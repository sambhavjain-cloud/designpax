<?php
// Get ACF fields inside Flexible Content layout
$heading = get_sub_field('about_heading');
$description = get_sub_field('about_description');
?>

<section class="about__intro" >
  <div class="container">
    <?php if ($heading): ?>
      <h2 class="about__heading"><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>

    <?php if ($description): ?>
      <div class="about__description">
        <?php echo wp_kses_post($description); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
