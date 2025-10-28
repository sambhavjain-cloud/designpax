<?php
$bar_text = get_sub_field('bar_text');
$logos = get_sub_field('logos');
?>

<section class="logo-bar">
    <div class="container">
        <div class="logo-bar-inner">
            <?php if ($bar_text): ?>
                <div class="bar-text">
                    <?= esc_html($bar_text); ?>
                </div>
            <?php endif; ?>

            <?php if ($logos): ?>
                <div class="logo-slider">
                    <div class="logo-track">
                        <?php foreach ($logos as $logo): ?>
                            <?php if (!empty($logo['logo_image'])): ?>
                                <div class="logo-item">
                                    <img src="<?= esc_url($logo['logo_image']['url']); ?>" alt="<?= esc_attr($logo['logo_image']['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
