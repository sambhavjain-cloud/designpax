<?php
/**
 * Footer Template
 */

// ACF fields from Options
$footer_logo     = get_field('footer_logo', 'option');
$footer_desc     = get_field('footer_description', 'option');
$review_logos    = get_field('review_logos', 'option');
$contact_phone   = get_field('contact_phone', 'option');
$contact_email   = get_field('contact_email', 'option');
$contact_address = get_field('contact_address', 'option');
$social_links    = get_field('social_links', 'option');
$copyright_text  = get_field('copyright_text', 'option');
$trustpilot      = get_field('trustpilot', 'option');
$footer_settings = get_field('footer_settings', 'option'); // Legal links
?>

<footer class="site-footer">
  <div class="footer-top">
    <div class="container footer-grid">

      <!-- Brand Column -->
      <div class="footer-col footer-brand">
        <?php if ($footer_logo): ?>
          <div class="footer-logo">
            <img src="<?= esc_url($footer_logo['url']); ?>" alt="<?= esc_attr($footer_logo['alt']); ?>">
          </div>
        <?php endif; ?>

        <?php if ($footer_desc): ?>
          <p class="footer-description"><?= esc_html($footer_desc); ?></p>
        <?php endif; ?>

        <!-- Trustpilot -->
        <?php if ($trustpilot): ?>
          <div class="footer-trustpilot">
            <?php if (!empty($trustpilot['image'])): ?>
              <div class="trustpilot-image">
                <img src="<?= esc_url($trustpilot['image']['url']); ?>" alt="<?= esc_attr($trustpilot['image']['alt']); ?>">
              </div>
            <?php endif; ?>
            <?php if (!empty($trustpilot['contant'])): ?>
              <div class="trustpilot-content">
                <?= wp_kses_post($trustpilot['contant']); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <!-- Review Logos -->
        <?php if ($review_logos): ?>
          <div class="footer-reviews">
            <?php foreach ($review_logos as $item):
              $logo = $item['image'];
              $link = $item['link'];
              if ($logo): ?>
                <?php if ($link): ?>
                  <a href="<?= esc_url($link); ?>" target="_blank" rel="noopener">
                    <img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>">
                  </a>
                <?php else: ?>
                  <img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>">
                <?php endif; ?>
            <?php endif; endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Services Menu -->
      <div class="footer-col footer-column">
        <h4>Services</h4>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer_services',
            'menu_class'     => 'footer-menu',
            'container'      => false
          ]);
        ?>
      </div>

      <!-- Company Menu -->
      <div class="footer-col footer-column">
        <h4>Company</h4>
        <?php
          wp_nav_menu([
            'theme_location' => 'footer_company',
            'menu_class'     => 'footer-menu',
            'container'      => false
          ]);
        ?>
      </div>

      <!-- Contact Info -->
      <div class="footer-col">
        <h4>Contact</h4>
        <ul class="footer-contact">
          <?php if ($contact_phone): ?>
            <li><i class="fas fa-phone"></i> <?= esc_html($contact_phone); ?></li>
          <?php endif; ?>
          <?php if ($contact_email): ?>
            <li><i class="fas fa-envelope"></i> <a href="mailto:<?= antispambot($contact_email); ?>"><?= esc_html($contact_email); ?></a></li>
          <?php endif; ?>
          <?php if ($contact_address): ?>
            <li><i class="fas fa-map-marker-alt"></i> <?= esc_html($contact_address); ?></li>
          <?php endif; ?>
        </ul>
      </div>

    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container footer-bottom-inner">

      <!-- Copyright -->
      <div class="footer-copy">
        <p>
          <?= $copyright_text
            ? esc_html($copyright_text)
            : '&copy; ' . date('Y') . ' ' . get_bloginfo('name'); ?>
        </p>
      </div>

      <!-- Social Icons -->
      <?php if ($social_links): ?>
        <div class="footer-icons">
          <?php foreach ($social_links as $item):
            $icon = $item['icon_image'];
            $url  = $item['url'];
            if ($icon): ?>
              <?php if ($url): ?>
                <a href="<?= esc_url($url); ?>" target="_blank" rel="noopener">
                  <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
                </a>
              <?php else: ?>
                <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>">
              <?php endif; ?>
          <?php endif; endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Legal Links -->
      <div class="terms-links">
        <?php
        if ($footer_settings) {
          $privacy = $footer_settings['privacy_policy_page'] ?? null;
          $terms   = $footer_settings['terms_of_service_page'] ?? null;

          if ($privacy):
            $privacy_url   = is_numeric($privacy) ? get_permalink($privacy) : $privacy;
            $privacy_title = is_numeric($privacy) ? get_the_title($privacy) : 'Privacy Policy';
        ?>
            <a href="<?= esc_url($privacy_url); ?>"><?= esc_html($privacy_title); ?></a>
        <?php endif; ?>

        <?php if ($terms):
          $terms_url   = is_numeric($terms) ? get_permalink($terms) : $terms;
          $terms_title = is_numeric($terms) ? get_the_title($terms) : 'Terms of Service';
        ?>
            <a href="<?= esc_url($terms_url); ?>"><?= esc_html($terms_title); ?></a>
        <?php endif;
        } ?>
      </div>

    </div>
  </div>
</footer>

<!-- Contact Modal -->
<div id="contactModal" class="contact-modal">
  <div class="contact-modal-content">
    <span class="close-contact-modal">&times;</span>
    <div class="contact-form-area">
      <?= do_shortcode('[contact-form-7 id="1991659f" title="Discuss a Project"]'); ?>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
