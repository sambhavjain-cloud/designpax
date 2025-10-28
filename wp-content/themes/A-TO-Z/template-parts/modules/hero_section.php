<?php
$title             = get_sub_field('hero_title');
$description       = get_sub_field('hero_description');
$video_url         = get_sub_field('hero_video_url');
$book_call_link    = get_sub_field('book_a_call_link');
$view_project_link = get_sub_field('view_project_link');

// Convert YouTube watch link into embed link
if ($video_url && strpos($video_url, 'youtube.com/watch') !== false) {
    parse_str(parse_url($video_url, PHP_URL_QUERY), $params);
    if (!empty($params['v'])) {
        $video_url = 'https://www.youtube.com/embed/' . $params['v'];
    }
}
?>

<section class="hero-section">
  <div class="container">
    <div class="hero-text">
      <?php if ($title): ?>
        <h1 class="hero-title"><?= esc_html($title); ?></h1>
      <?php endif; ?>

      <?php if ($description): ?>
        <p class="hero-description"><?= esc_html($description); ?></p>
      <?php endif; ?>

      <div class="hero-links">
        <?php if ($book_call_link): ?>
          <?php
            $is_modal = strpos($book_call_link['url'], '#contactModal') !== false;
            $btn_class = $is_modal ? 'open-contact-modal' : '';
            $target = !empty($book_call_link['target']) ? 'target="' . esc_attr($book_call_link['target']) . '"' : '';
          ?>
          <a href="<?= esc_url($book_call_link['url']); ?>"
             class="btn btn-primary <?= esc_attr($btn_class); ?>"
             <?= $target; ?>>
            <?= esc_html($book_call_link['title']); ?>
          </a>
        <?php endif; ?>

        <?php if ($view_project_link): ?>
          <a href="<?= esc_url($view_project_link['url']); ?>"
             target="<?= esc_attr($view_project_link['target'] ?: '_self'); ?>"
             class="btn btn-secondary">
            <?= esc_html($view_project_link['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($video_url): ?>
      <div class="hero-video">
        <iframe
          src="<?= esc_url(mytheme_get_embed_url($video_url)); ?>"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>
    <?php endif; ?>
  </div>
</section>
