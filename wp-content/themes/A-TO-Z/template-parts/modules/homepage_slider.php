<?php
$slides = get_sub_field('homepage_slider');
?>

<?php if ($slides): ?>
<section class="hero-slider">
    <div class="hero-track" style="width: calc(100% * <?= count($slides); ?>);">
        <?php foreach ($slides as $slide): ?>
            <?php if (!empty($slide['image'])): ?>
                <div class="hero-slide">
                    <img src="<?= esc_url($slide['image']['url']); ?>" alt="<?= esc_attr($slide['image']['alt']); ?>" />
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>