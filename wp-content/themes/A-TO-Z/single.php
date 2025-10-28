<?php get_header(); ?>

<main class="single-post">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h1><?php the_title(); ?></h1>
        <div class="post-meta">
          <span><?php the_date(); ?></span> | <span><?php the_author(); ?></span>
        </div>
        <?php if (has_post_thumbnail()): ?>
          <div class="post-image">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
        <div class="post-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
