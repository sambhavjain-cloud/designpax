<?php
/**
 * Template Name: Blog Page
 */
get_header();
?>

<section class="blog-section">
  <div class="container">
    <h2 class="section-title">Latest Blog Posts</h2>
    <div class="section-line"></div>

    <div class="grid">
      <?php
      $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);

      if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
          $title = get_the_title();
          $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
          $link  = get_permalink();
          $excerpt = get_the_excerpt();
      ?>
        <a href="<?= esc_url($link); ?>" class="blog-card">
          <?php if ($image): ?>
            <img src="<?= esc_url($image); ?>" alt="<?= esc_attr($title); ?>">
          <?php endif; ?>
          <h3><?= esc_html($title); ?></h3>
          <p><?= esc_html($excerpt); ?></p>
        </a>
      <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>No blog posts found.</p>';
      endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
