<?php
$heading = get_sub_field('section_heading');
$button  = get_sub_field('services_button');
?>

<section class="service-grid-section">
  <div class="container">

    <?php if ($heading): ?>
      <h2 class="section-heading"><?= esc_html($heading); ?></h2>
    <?php endif; ?>

    <?php if (have_rows('services')): ?>
      <div class="service-grid">
        <?php while (have_rows('services')): the_row(); 
          $image = get_sub_field('service_image');
          $title = get_sub_field('service_title');
          $desc  = get_sub_field('service_description');
        ?>
          <div class="service-item">
            <button class="service-toggle">
              <?php if ($image): ?>
                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? $title); ?>" />
              <?php endif; ?>

              <?php if ($title): ?>
                <div class="service-header">
                  <h3 class="service-title"><?= esc_html($title); ?></h3>
                  <span class="arrow-icon"></span>
                </div>
              <?php endif; ?>
            </button>

            <?php if ($desc): ?>
              <div class="service-description">
                <p><?= esc_html($desc); ?></p>
              </div>
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
      <div class="service-cta">
        <a href="<?= esc_url($button['url']); ?>"
           class="btn btn-primary <?= esc_attr($btn_class); ?>"
           <?= $target; ?>>
          <?= esc_html($button['title']); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>
