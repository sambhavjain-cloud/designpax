<?php
$cta_heading     = get_sub_field('cta_heading');
$cta_description = get_sub_field('cta_description');
$cta_button      = get_sub_field('cta_button');
?>

<section class="call-to-action">
  <div class="container">
    <div class="call-box">
      <?php if ($cta_heading): ?>
        <h2 class="call-title"><?= esc_html($cta_heading); ?></h2>
      <?php endif; ?>

      <?php if ($cta_description): ?>
        <p class="call-text"><?= esc_html($cta_description); ?></p>
      <?php endif; ?>

      <?php if ($cta_button): ?>
        <?php
          $is_modal = strpos($cta_button['url'], '#contactModal') !== false;
          $btn_class = $is_modal ? 'open-contact-modal' : '';
          $target = !empty($cta_button['target']) ? 'target="' . esc_attr($cta_button['target']) . '"' : '';
        ?>
        <a href="<?= esc_url($cta_button['url']); ?>"
           class="call-btn <?= esc_attr($btn_class); ?>"
           <?= $target; ?>>
          <?= esc_html($cta_button['title']); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>
