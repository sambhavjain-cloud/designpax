<?php
$heading     = get_sub_field('tools_heading');
$description = get_sub_field('tools_description');
$button      = get_sub_field('tools_button');
$image       = get_sub_field('tools_image');
?>

<section class="tools-section">
  <div class="container">
    <div class="tools-grid-wrapper">

      <div class="tools-content">
        <?php if ($heading): ?>
          <h2 class="tools-heading"><?= esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if ($description): ?>
          <p class="tools-description"><?= esc_html($description); ?></p>
        <?php endif; ?>

        <?php if ($button): ?>
          <?php
            $is_modal  = strpos($button['url'], '#contactModal') !== false;
            $btn_class = $is_modal ? 'open-contact-modal' : '';
            $target    = !empty($button['target']) ? 'target="' . esc_attr($button['target']) . '"' : '';
          ?>
          <a href="<?= esc_url($button['url']); ?>"
             class="btn btn-dark <?= esc_attr($btn_class); ?>"
             <?= $target; ?>>
            <?= esc_html($button['title']); ?>
          </a>
        <?php endif; ?>
      </div>

      <?php if ($image): ?>
        <div class="tools-image">
          <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? 'Third-party tools'); ?>" />
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
