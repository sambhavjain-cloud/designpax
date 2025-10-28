<?php
/**
 * Page Template — Title & Content First, Global Modules After
 */


get_header();

// ✅ Load page title and content from WordPress editor
if (have_posts()) : while (have_posts()) : the_post(); ?>
  <main class="page-content">
    <div class="page-text"><?php the_content(); ?></div>
  </main>
<?php endwhile; endif;

// ✅ Load centralized ACF layouts from "global_module" field
if (have_rows('global_module')) :
  while (have_rows('global_module')) : the_row();
    get_template_part('template-parts/modules/' . get_row_layout());
  endwhile;
endif;

get_footer();

