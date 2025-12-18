<?php
/**
 * @var string $section_title
 * @var array $slider_items
 */
?>

<div class="realisations-slider-widget">
    <?php if (!empty($section_title)) : ?>
        <div class="slider-intro text-center">
            <h2 class="heading"><?php echo esc_html($section_title); ?></h2>
            <div class="divider">
                <img class="icon-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/divider.webp" alt="divider">
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($slider_items)) : ?>
        <div class="slider-container ">
            <div class="js-slick-init slick-slider">
                <?php foreach ($slider_items as $item) : ?>
                    <div class="slide-item slick-slide">
                        <div class="slide-image">
                            <?php echo wp_get_attachment_image($item['image']['id'], 'large'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
