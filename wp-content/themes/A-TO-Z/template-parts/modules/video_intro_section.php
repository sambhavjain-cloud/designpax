<?php
$main_heading = get_sub_field('main_heading');
$sub_heading = get_sub_field('sub_heading');
$videos = get_sub_field('videos');
$right_column = get_sub_field('right_column');
?>

<section class="video-intro">
    <div class="container">
        <div class="intro-top">
            <?php if ($main_heading): ?>
                <h2 class="intro-heading"><?= esc_html($main_heading); ?></h2>
            <?php endif; ?>

            <?php if ($sub_heading): ?>
                <p class="intro-subheading"><?= esc_html($sub_heading); ?></p>
            <?php endif; ?>
        </div>

        <div class="intro-content">
            <?php if ($videos): ?>
                <div class="intro-videos">
                    <?php foreach ($videos as $video): ?>
                        <?php
                        $embed_url = mytheme_get_embed_url($video['video_url']);
                        if ($embed_url):
                            $autoplay_url = add_query_arg(['autoplay' => '1', 'mute' => '1',], $embed_url); ?>
                            <div class="video-box">
                                <iframe src="<?= esc_url($autoplay_url); ?>" frameborder="0" allow="autoplay; fullscreen" loading="lazy" class="autoplay-on-scroll"></iframe>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($right_column): ?>
                <div class="intro-right">
                    <?php foreach ($right_column as $item): ?>
                        <div class="right-block">
                            <?php if (!empty($item['right_heading'])): ?>
                                <h3><?= esc_html($item['right_heading']); ?></h3>
                            <?php endif; ?>

                            <?php if (!empty($item['right_contant'])): ?>
                                <p class="intro-text"><?= esc_html($item['right_contant']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($item['right_images'])): ?>
                                <div class="intro-gallery">
                                    <?php foreach ($item['right_images'] as $image): ?>
                                        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>