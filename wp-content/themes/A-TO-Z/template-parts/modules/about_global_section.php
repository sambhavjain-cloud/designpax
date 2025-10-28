<?php
$left_graphic      = get_sub_field('left_graphic');
$left_title        = get_sub_field('left_title');
$left_description  = get_sub_field('left_description');

$right_scroller_1  = get_sub_field('right_scroller_one');
$right_scroller_2  = get_sub_field('right_scroller_two');
$right_title       = get_sub_field('right_title');
$right_description = get_sub_field('right_description');
?>

<section class="about__global">
  <div class="container">
    <div class="global__grid">

      <!-- Left Side -->
      <div class="global__left">
        <?php if ($left_graphic): ?>
          <div class="global__graphic">
            <img src="<?php echo esc_url($left_graphic['url']); ?>" alt="<?php echo esc_attr($left_graphic['alt']); ?>">
          </div>
        <?php endif; ?>

        <?php if ($left_title): ?>
          <h2 class="global__title"><?php echo esc_html($left_title); ?></h2>
        <?php endif; ?>

        <?php if ($left_description): ?>
          <div class="global__description">
            <?php echo wp_kses_post($left_description); ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Right Side -->
      <div class="global__right">

        <?php if ($right_scroller_1 || $right_scroller_2): ?>
          <div class="global__scroller-wrap">
            <?php if ($right_scroller_1): ?>
              <div class="global__scroller forward">
                <?php foreach ($right_scroller_1 as $image): ?>
                  <div class="global__slide">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if ($right_scroller_2): ?>
              <div class="global__scroller reverse">
                <?php foreach ($right_scroller_2 as $image): ?>
                  <div class="global__slide">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($right_title): ?>
          <h2 class="global__title"><?php echo esc_html($right_title); ?></h2>
        <?php endif; ?>

        <?php if ($right_description): ?>
          <div class="global__description">
            <?php echo wp_kses_post($right_description); ?>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
