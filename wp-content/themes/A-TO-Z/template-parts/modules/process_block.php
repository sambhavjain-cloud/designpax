<?php if (get_row_layout() === 'process_block'): ?>
  <section class="process-section">
    <div class="container">

      <?php if ($heading = get_sub_field('process_heading')): ?>
        <h2 class="process-heading"><?= esc_html($heading); ?></h2>
      <?php endif; ?>

      <?php if (have_rows('process_steps')): ?>
        <?php while (have_rows('process_steps')): the_row(); ?>
          <?php
            $number = get_sub_field('process_number');
            $title  = get_sub_field('process_title');
            $desc   = get_sub_field('process_description');
            $image  = get_sub_field('process_image');
          ?>
          <div class="process-block">
            <div class="process-image">
              <?php if ($image): ?>
                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt'] ?? $title); ?>" />
              <?php endif; ?>
            </div>

            <div class="process-content">
              <div class="process-meta">
                <?php if ($number): ?>
                  <span class="process-number"><?= esc_html($number); ?></span>
                <?php endif; ?>
                <?php if ($title): ?>
                  <h3 class="process-title"><?= esc_html($title); ?></h3>
                <?php endif; ?>
              </div>

              <?php if ($desc): ?>
                <p class="process-description"><?= esc_html($desc); ?></p>
              <?php endif; ?>

              <?php if (have_rows('process_tags')): ?>
                <div class="process-tags">
                  <?php while (have_rows('process_tags')): the_row(); ?>
                    <?php if ($tag = get_sub_field('tag_text')): ?>
                      <span class="tag"><?= esc_html($tag); ?></span>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </section>
<?php endif; ?>
