<?php
$section_heading = get_sub_field('section_heading');
$testimonials = get_sub_field('testimonials');
?>

<section class="testimonials-section">
    <div class="container">
        <?php if ($section_heading): ?>
            <h2 class="testimonial-heading"><?= esc_html($section_heading); ?></h2>
        <?php endif; ?>

        <?php if ($testimonials): ?>
            <div class="testimonial-grid">
                <?php foreach ($testimonials as $item): ?>
                    <?php
                    $quote = $item['quote'];
                    $author = $item['author_name'];
                    $company = $item['company_name'];
                    $image = $item['author_image'];
                    ?>
                    <div class="testimonial-box">
                        <?php if ($quote): ?>
                            <blockquote>“<?= esc_html($quote); ?>”</blockquote>
                        <?php endif; ?>

                        <div class="testimonial-author">
                            <?php if ($image): ?>
                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                            <div class="author-info">
                                <?php if ($author): ?>
                                    <strong><?= esc_html($author); ?></strong>
                                <?php endif; ?>
                                <?php if ($company): ?>
                                    <span class="author-company"><?= esc_html($company); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
