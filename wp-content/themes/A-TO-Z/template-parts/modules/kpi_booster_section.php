<?php
$heading = get_sub_field('kpi_heading');
$button  = get_sub_field('kpi_button');
?>

<section class="kpi-section">
  <div class="container">

    <?php if ($heading): ?>
      <h2 class="kpi-heading"><?= esc_html($heading); ?></h2>
    <?php endif; ?>

    <?php if (have_rows('kpi_blocks')): ?>
      <div class="kpi-grid">
        <?php while (have_rows('kpi_blocks')): the_row(); ?>
          <?php
          $image       = get_sub_field('kpi_image');
          $title       = get_sub_field('kpi_title');
          $description = get_sub_field('kpi_description');
          ?>
          <div class="kpi-block">
            <?php if ($image): ?>
              <div class="kpi-image">
                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? $title); ?>" />
              </div>
            <?php endif; ?>

            <?php if ($title): ?>
              <h3 class="kpi-title"><?= esc_html($title); ?></h3>
            <?php endif; ?>

            <?php if ($description): ?>
              <p class="kpi-description"><?= esc_html($description); ?></p>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php if ($button): ?>
      <?php
        $is_modal  = strpos($button['url'], '#contactModal') !== false;
        $btn_class = $is_modal ? 'open-contact-modal' : '';
        $target    = !empty($button['target']) ? 'target="' . esc_attr($button['target']) . '"' : '';
      ?>
      <div class="kpi-cta">
        <a href="<?= esc_url($button['url']); ?>"
           class="btn btn-primary <?= esc_attr($btn_class); ?>"
           <?= $target; ?>>
          <?= esc_html($button['title']); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>
