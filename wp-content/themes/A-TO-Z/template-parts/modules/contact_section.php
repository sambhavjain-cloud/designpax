<?php
$image        = get_sub_field('contact_image');
$heading      = get_sub_field('contact_heading');
$form_code    = get_sub_field('contact_form_shortcode');
?>

<section class="contact-section">
  <div class="contact-wrapper">
    
    <!-- Left Side Image -->
    <?php if ($image): ?>
      <div class="contact-image">
        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? '') ?>" />
      </div>
    <?php endif; ?>

    <!-- Right Side Form -->
    <div class="contact-form-area">
      <?php if ($heading): ?>
        <h2 class="contact-heading"><?= esc_html($heading); ?></h2>
      <?php endif; ?>

      <div class="contact-form">
        <?= do_shortcode($form_code); ?>
      </div>

   
    </div>

  </div>
</section>
