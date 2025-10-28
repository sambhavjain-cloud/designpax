<?php
$heading     = get_sub_field('awards_heading');
$description = get_sub_field('awards_description');
$trustpilot  = get_sub_field('trustpilot_link');
$logo        = get_sub_field('trustpilot_logo');
?>

<section class="about__awards">
  <div class="container">
    <div class="awards__stars">
      <?php
      $stars = get_sub_field('star_icon');
      if ($stars): ?>
        <div class="awards__stars">
          <?php foreach ($stars as $star): ?>
            <img src="<?php echo esc_url($star['url']); ?>" alt="<?php echo esc_attr($star['alt']); ?>" class="awards__star">
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
    <?php if ($heading): ?>
      <h2 class="awards__heading"><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>
    <?php if ($description): ?>
      <div class="awards__description">
        <?php echo wp_kses_post($description); ?>
      </div>
    <?php endif; ?>
    <?php if ($trustpilot || $logo): ?>
      <div class="awards__trustpilot">
        <?php if ($trustpilot): ?>
          <a href="<?php echo esc_url($trustpilot['url']); ?>" class="awards__link" <?php echo $trustpilot['target'] ? 'target="' . esc_attr($trustpilot['target']) . '"' : ''; ?>>
            <?php echo esc_html($trustpilot['title']); ?>
          </a>
        <?php endif; ?>
        <?php if ($logo): ?>
          <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="awards__logo">
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if (have_rows('award_badges')): ?>
      <div class="awards__scroller">
        <?php while (have_rows('award_badges')): the_row();
          $badge = get_sub_field('badge_image');
          if ($badge): ?>
            <div class="awards__badge">
              <img src="<?php echo esc_url($badge['url']); ?>" alt="<?php echo esc_attr($badge['alt']); ?>">
            </div>
        <?php endif;
        endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>