<?php
/**
 * Single Project Item Template
 * Renders individual project with taxonomy tags, hero section, and global modules from proxy page
 */

ob_start(); // ✅ Prevent early output breaking layout

get_header();
?>

<!-- Global Section Heading -->
<section class="section-heading">
  <div class="container">
    <h1 class="section-title">Our Work</h1>
    <div class="section-line"></div>
  </div>
</section>

<!-- Project Content -->
<div class="container">
  <h1 class="project-title"><?= esc_html(get_the_title()); ?></h1>

  <?php
  $industry_terms   = get_the_terms(get_the_ID(), 'industry');
  $technology_terms = get_the_terms(get_the_ID(), 'technology');
  ?>

  <div class="project-tags">
    <?php
    if ($industry_terms) {
      foreach ($industry_terms as $term) {
        echo '<span class="tag industry">' . esc_html($term->name) . '</span>';
      }
    }

    if ($technology_terms) {
      foreach ($technology_terms as $term) {
        echo '<span class="tag technology">' . esc_html($term->name) . '</span>';
      }
    }
    ?>
  </div>

  <div class="project-editor-content">
    <main class="project-single">

      <!-- Hero Gradient Section -->
      <section class="project-hero-gradient">
        <div class="hero-container">
          <div class="hero-image">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= esc_attr(get_the_title()); ?>">
            <?php endif; ?>
          </div>

          <div class="hero-bottom-bar">
            <div class="share-icons">
              <a href="https://x.com/i/flow/login">
                <img src="<?= get_template_directory_uri(); ?>/img/twitter.png" alt="Twitter">
              </a>
              <a href="https://www.facebook.com/">
                <img src="<?= get_template_directory_uri(); ?>/img/facebook.png" alt="Facebook">
              </a>
              <a href="https://mail.google.com/">
                <img src="<?= get_template_directory_uri(); ?>/img/email.jpg" alt="Email">
              </a>
            </div>

            <a href="https://example.com" class="btn visit-btn" target="_blank">Visit Live Site</a>
          </div>
        </div>
      </section>

      <?php the_content(); ?>
    </main>
  </div>

  <!-- More Featured Work Section -->
  <?php
  $args = [
    'post_type'      => 'project_item',
    'posts_per_page' => 2,
    'post__not_in'   => [get_the_ID()],
    'orderby'        => 'rand',
  ];

  $featured_query = new WP_Query($args);

  if ($featured_query->have_posts()): ?>
    <section class="more-featured-work">
      <div class="container">
        <h2 class="section-title">More Featured Work</h2>
        <div class="featured-work-grid">
          <?php while ($featured_query->have_posts()): $featured_query->the_post(); ?>
            <?php
            $industry_terms   = get_the_terms(get_the_ID(), 'industry');
            $technology_terms = get_the_terms(get_the_ID(), 'technology');
            $excerpt          = get_the_excerpt();
            ?>
            <div class="featured-work-card">
              <?php if (has_post_thumbnail()): ?>
                <div class="featured-image">
                  <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= esc_attr(get_the_title()); ?>">
                </div>
              <?php endif; ?>

              <h3 class="project-name"><?= esc_html(get_the_title()); ?></h3>

              <div class="project-tags">
                <?php
                if ($industry_terms) {
                  foreach ($industry_terms as $term) {
                    echo '<span class="tag industry">' . esc_html($term->name) . '</span>';
                  }
                }
                if ($technology_terms) {
                  foreach ($technology_terms as $term) {
                    echo '<span class="tag technology">' . esc_html($term->name) . '</span>';
                  }
                }
                ?>
              </div>

              <p class="project-description"><?= esc_html($excerpt); ?></p>
              <a href="<?= esc_url(get_permalink()); ?>" class="btn learn-more">Learn More</a>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
</div>

<!-- Additional Global Modules from Proxy Page -->
<?php
$acf_page = get_page_by_path('our-work-intro');
$allowed_layouts = ['logo_bar_section', 'cta_section'];

if ($acf_page && have_rows('global_module', $acf_page->ID)) :
  while (have_rows('global_module', $acf_page->ID)) : the_row();
    $layout = get_row_layout();
    if (in_array($layout, $allowed_layouts)) {
      echo "<!-- Loaded layout: $layout -->"; // ✅ Debug marker
      get_template_part('template-parts/modules/' . $layout);
    }
  endwhile;
endif;
?>

<?php get_footer(); ?>
<?php ob_end_flush(); ?>
