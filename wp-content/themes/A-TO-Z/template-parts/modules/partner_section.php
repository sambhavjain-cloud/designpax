<?php
$star_images = get_sub_field('star_image');
$partner_heading = get_sub_field('partner_heading');
$partner_items = get_sub_field('partner_items');
?>

<section class="partner-section">
    <div class="container">
        <?php if ($star_images): ?>
            <div class="star-gallery">
                <?php foreach ($star_images as $image): ?>
                    <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($partner_heading): ?>
            <h2 class="partner-title"><?= esc_html($partner_heading); ?></h2>
        <?php endif; ?>

        <?php if ($partner_items): ?>
            <div class="partner-grid">
                <?php foreach ($partner_items as $item): ?>
                    <?php
                    $title = $item['title'];
                    $description = $item['description'];
                    $is_multi = $item['is_multi_icon'];
                    $single_icon = $item['single_icon'];
                    $multi_icons = $item['multi_icons'];
                    ?>
                    <div class="partner-box">
                        <?php if (!empty($title)): ?>
                            <h3><?= esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($description)): ?>
                            <p><?= esc_html($description); ?></p>
                        <?php endif; ?>

                        <?php if ($is_multi): ?>
                            <?php if (!empty($multi_icons)): ?>
                                <div class="multi-icons">
                                    <?php foreach ($multi_icons as $icon): ?>
                                        <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>" />
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (!empty($single_icon)): ?>
                                <img src="<?= esc_url($single_icon['url']); ?>" alt="<?= esc_attr($single_icon['alt']); ?>" class="single-icon" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
