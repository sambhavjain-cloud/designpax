<?php
$title       = get_sub_field('support_title');
$subtitle    = get_sub_field('support_subtitle');
$phone       = get_sub_field('support_phone');
$icon        = get_sub_field('support_icon');
$hours_title = get_sub_field('support_hours_heading');
$hours_text  = get_sub_field('support_hours_text');
?>

<section class="support-block">
  <div class="support-content">
    <?php if ($title): ?><h2><?= esc_html($title); ?></h2><?php endif; ?>
    <?php if ($subtitle): ?><p><?= esc_html($subtitle); ?></p><?php endif; ?>
    <?php if ($phone): ?><p class="support-phone"><?= esc_html($phone); ?></p><?php endif; ?>
  </div>

  <div class="support-sidebar">
    <?php if ($icon): ?>
      <div class="support-icon">
        <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt'] ?? '') ?>" />
      </div>
    <?php endif; ?>
    <?php if ($hours_title): ?><h4><?= esc_html($hours_title); ?></h4><?php endif; ?>
    <?php if ($hours_text): ?><p class="support-hours"><?= nl2br(esc_html($hours_text)); ?></p><?php endif; ?>
  </div>
</section>
