<?php
/**
 * Template: Project Grid Section
 * Source: global_module flexible layout
 * Layout: project_grid_section
 */

$heading = get_sub_field('section_heading');
$items   = get_sub_field('project_items');
?>

<section class="project-grid-section">
  <div class="container">
    <?php if ($heading): ?>
      <h2 class="section-title"><?= esc_html($heading); ?></h2>
      <div class="section-line"></div>
    <?php endif; ?>

    <?php if ($items): ?>
      <div class="grid">
        <?php foreach ($items as $row): ?>
          <?php
          $post        = $row['project_post'];
          setup_postdata($post);
          $image_url   = get_the_post_thumbnail_url($post->ID, 'large');
          $title       = get_the_title($post->ID);
          $hover_icon  = $row['hover_icon']['url'] ?? '';
          $hover_text  = $row['hover_text'] ?? '';
          $custom_url  = $row['hover_link'] ?? '';
          $final_url   = !empty($custom_url) ? $custom_url : get_permalink($post->ID);
          $is_external = !empty($custom_url);
          ?>
          <a href="<?= esc_url($final_url); ?>" class="project-card" <?= $is_external ? 'target="_blank" rel="noopener"' : '' ?>>
            <?php if ($image_url): ?>
              <img src="<?= esc_url($image_url); ?>" alt="<?= esc_attr($title); ?>">
            <?php endif; ?>

            <div class="overlay">
              <?php if ($hover_icon): ?>
                <img src="<?= esc_url($hover_icon); ?>" alt="Icon" class="hover-icon">
              <?php endif; ?>
              <?php if ($hover_text): ?>
                <p class="hover-text"><?= esc_html($hover_text); ?></p>
              <?php endif; ?>
            </div>
          </a>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
