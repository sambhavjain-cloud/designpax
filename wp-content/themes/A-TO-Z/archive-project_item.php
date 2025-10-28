<?php
/**
 * Archive Template for Project Items
 * Renders ACF layouts from Archive Settings option page before and after the grid
 */

get_header();

// Layout control arrays
$before_layouts = ['project_grid_section'];
$after_layouts  = ['logo_bar_section', 'cta_section', 'homepage_slider'];

// Render layouts BEFORE archive grid
if (have_rows('archive_modules', 'option')) :
  while (have_rows('archive_modules', 'option')) : the_row();
    $layout = get_row_layout();
    
    if (in_array($layout, $before_layouts)) {
      echo "<!-- Loaded layout before: $layout -->";
      get_template_part('template-parts/modules/' . $layout);
    }
  endwhile;
endif;

// Taxonomy filters
$industries   = get_terms(['taxonomy' => 'industry', 'hide_empty' => false]);
$technologies = get_terms(['taxonomy' => 'technology', 'hide_empty' => false]);

$tax_query = [];

if (!empty($_GET['industry'])) {
  $tax_query[] = [
    'taxonomy' => 'industry',
    'field'    => 'slug',
    'terms'    => sanitize_text_field($_GET['industry']),
  ];
}

if (!empty($_GET['technology'])) {
  $tax_query[] = [
    'taxonomy' => 'technology',
    'field'    => 'slug',
    'terms'    => sanitize_text_field($_GET['technology']),
  ];
}

$args = [
  'post_type'      => 'project_item',
  'posts_per_page' => -1,
  'tax_query'      => $tax_query,
];

$query = new WP_Query($args);
?>

<section class="our-work-archive">
  <div class="container">

    <!-- Optional ACF Heading -->
    <?php $archive_heading = get_field('project_archive_heading', 'option'); ?>
    <?php if ($archive_heading): ?>
      <h1 class="archive-title"><?= esc_html($archive_heading); ?></h1>
    <?php endif; ?>

    <!-- Filter Bar -->
    <form method="get" class="project-filters" aria-label="Project Filters">
      <span class="filter-label">Filter:</span>

      <div class="filter-group">
        <select name="industry" id="industry" onchange="this.form.submit()">
          <option value="">Industry</option>
          <?php foreach ($industries as $term): ?>
            <option value="<?= esc_attr($term->slug); ?>" <?= selected($_GET['industry'] ?? '', $term->slug); ?>>
              <?= esc_html($term->name); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="filter-group">
        <select name="technology" id="technology" onchange="this.form.submit()">
          <option value="">Technology</option>
          <?php foreach ($technologies as $term): ?>
            <option value="<?= esc_attr($term->slug); ?>" <?= selected($_GET['technology'] ?? '', $term->slug); ?>>
              <?= esc_html($term->name); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </form>

    <!-- Project Grid -->
    <div class="project-grid">
      <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <article class="project-block">
          <?php if (has_post_thumbnail()): ?>
            <div class="project-image"><?php the_post_thumbnail('large'); ?></div>
          <?php endif; ?>

          <h3 class="project-title"><?= esc_html(get_the_title()); ?></h3>

          <div class="project-categories">
            <?php
              $industry_terms   = get_the_terms(get_the_ID(), 'industry');
              $technology_terms = get_the_terms(get_the_ID(), 'technology');

              if ($industry_terms) {
                foreach ($industry_terms as $term) {
                  echo '<span class="category-tag">' . esc_html($term->name) . '</span>';
                }
              }

              if ($technology_terms) {
                foreach ($technology_terms as $term) {
                  echo '<span class="category-tag">' . esc_html($term->name) . '</span>';
                }
              }
            ?>
          </div>

          <?php if ($desc = get_field('summary_text')): ?>
            <div class="project-description"><?= wp_kses_post($desc); ?></div>
          <?php endif; ?>

          <?php if ($hover_excerpt = get_field('hover_excerpt')): ?>
            <div class="project-short"><?= esc_html($hover_excerpt); ?></div>
          <?php endif; ?>

          <a href="<?php the_permalink(); ?>" class="learn-more-btn" aria-label="Learn more about <?= esc_attr(get_the_title()); ?>">Learn More</a>
        </article>
      <?php endwhile; ?>
    </div>

    <?php wp_reset_postdata(); else: ?>
      <p>No projects found for selected filters.</p>
    <?php endif; ?>
  </div>
</section>

<!-- Render layouts AFTER archive grid -->
<?php
if (have_rows('archive_modules', 'option')) :
  while (have_rows('archive_modules', 'option')) : the_row();
    $layout = get_row_layout();
    if (in_array($layout, $after_layouts)) {
      echo "<!-- Loaded layout after: $layout -->";
      get_template_part('template-parts/modules/' . $layout);
    }
  endwhile;
endif;

get_footer();
