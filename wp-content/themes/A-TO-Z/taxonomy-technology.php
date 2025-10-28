<?php get_header(); ?>
<section class="taxonomy-technology">
  <div class="container">
    <h1><?= single_term_title(); ?></h1>
    <div class="project-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="project-card">
          <?php the_post_thumbnail('medium'); ?>
          <h3><?php the_title(); ?></h3>
        </a>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
