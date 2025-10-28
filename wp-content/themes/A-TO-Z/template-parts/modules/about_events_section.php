<?php
$heading     = get_sub_field('brand_heading');
$description = get_sub_field('brand_description');
$video_url   = mytheme_get_embed_url(get_sub_field('brand_video_url'));
$cta         = get_sub_field('brand_cta_link');
?>

<section class="about__events">
  <div class="container">
    <?php if ($heading): ?>
      <h2 class="about__events-heading"><?php echo esc_html($heading); ?></h2>
    <?php endif; ?>

    <?php if ($description): ?>
      <div class="about__events-description">
        <?php echo wp_kses_post($description); ?>
      </div>
    <?php endif; ?>

    <?php if ($video_url): ?>
      <div class="about__events-video">
        <iframe src="<?php echo esc_url($video_url); ?>" frameborder="0" allowfullscreen></iframe>
      </div>
    <?php else: ?>
      <p style="color: red;"> Video URL missing or invalid.</p>
    <?php endif; ?>

    <?php if ($cta): ?>
      <?php
        $is_modal = strpos($cta['url'], '#contactModal') !== false;
        $btn_class = $is_modal ? 'open-contact-modal' : '';
        $target = !empty($cta['target']) ? 'target="' . esc_attr($cta['target']) . '"' : '';
      ?>
      <a href="<?php echo esc_url($cta['url']); ?>"
         class="about__events-cta <?php echo esc_attr($btn_class); ?>"
         <?php echo $target; ?>>
        <?php echo esc_html($cta['title']); ?>
      </a>
    <?php endif; ?>
  </div>
</section>
