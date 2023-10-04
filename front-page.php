<?php /* Template Name: Home */
/**
 * Front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macanagency
 */

get_header();
if (have_posts()) {
    the_post(); ?>

    <section>
        <div class="h-100 d-flex flex-column justify-content-center align-items-center ">
            <div class="text-center py-5 min-vh-75 d-flex align-items-center">
                <div class="position-relative">
                    <?php
                    $hero_image = get_field('hero_image');
                    $hero_image_bg = get_field('hero_image_bg');
                    if (!empty($hero_image)): ?>
                        <img class="w-75 position-relative z-1" src="<?php echo esc_url($hero_image['url']); ?>"
                             alt="<?php echo esc_attr($hero_image['alt']); ?>"/>
                    <?php endif; ?>
                    <img class="w-100 position-absolute top-0 bottom-0 end-0 start-0 m-auto"
                         src="<?php echo esc_url($hero_image_bg['url']); ?>" alt="<?php echo $hero_image_bg['alt']; ?>">
                </div>

            </div>
        </div>

    </section>
    <section class="container pt-5 pb-2 d-flex justify-content-center flex-column gap-4 align-items-center">
        <h1 class="text-white text-center titleHeading d-inline-block px-lg-3 lh-lg position-relative fw-bolder fs-1">
            جنیوس ۱۵ میلیون جایزه داره اونم بدون قرعه‌کشی!
        </h1>
        <div class="row justify-content-center align-items-start gap-4 w-100">


            <?php
            if (have_rows('prize_fields_2')):
                while (have_rows('prize_fields_2')) : the_row();
                    $text = get_sub_field('text');
                    $png = get_sub_field('png'); ?>
                    <div class="col-lg-7 justify-content-center align-items-center d-flex flex-row text-white flex-wrap flex-lg-nowrap">
                        <div class="bg-danger rounded-5 p-2 d-flex flex-column align-items-center justify-content-center gap-4 prizeBox">
                            <?php
                            if (!empty($png)): ?>
                                <img width="120px"
                                     height="120px"
                                     class="object-fit-contain customSize"
                                     src="<?php echo esc_url($png['url']); ?>"
                                     alt="<?php echo esc_attr($png['alt']); ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8 bg-danger rounded-5 p-4 ps-lg-5 pt-5 pt-lg-4">
                            <?= $text; ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </section>
    <section class="container py-5 d-flex justify-content-center flex-column gap-4 align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center mb-1 mt-4 px-3 px-lg-0">
            <h2 class="text-white titleHeading text-center d-inline-block px-3 position-relative fw-bolder fs-1 lh-lg">
                تو این رقابت هر چی امتیازت بالاتر باشه، شانس برنده شدنت بیشتر می‌شه!
            </h2>
        </div>
        <div class="row justify-content-center align-items-start gap-4 w-100">
            <?php
            if (have_rows('prize_fields')):
                while (have_rows('prize_fields')) : the_row();
                    $text = get_sub_field('text');
                    $png = get_sub_field('png'); ?>
                    <div class="col-lg-7 justify-content-center align-items-center d-flex flex-row text-white flex-wrap flex-lg-nowrap">
                        <div class="bg-danger rounded-5 p-2 d-flex flex-column align-items-center justify-content-center gap-4 prizeBox">
                            <?php
                            if (!empty($png)): ?>
                                <img width="120px"
                                     height="120px"
                                     class="object-fit-contain"
                                     src="<?php echo esc_url($png['url']); ?>"
                                     alt="<?php echo esc_attr($png['alt']); ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8 bg-danger rounded-5 p-4 ps-lg-5 pt-5 pt-lg-4">
                            <?= $text; ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div class="d-flex justify-content-center">
<!--            share buttons-->
            <div class="d-inline-flex flex-row-reverse justify-content-center align-items-center bg-transparent gap-3 my-5">
                <?php
                if (have_rows('reference')):
                    while (have_rows('reference')) : the_row();
                        $title = get_sub_field('title');
                        $svg = get_sub_field('svg');
                        $link = get_sub_field('link');
                        $id = get_sub_field('id');
                        ?>
                        <a href="<?= $link;?>" id="<?= $id; ?>">
                            <div class="bg-secondary rounded-circle lh-base d-flex align-items-center justify-content-center followSocial position-relative lazy">
                                <?= $svg; ?>
                            </div>
                            <h6 class="mt-3 text-secondary text-center">
                                <?= $title; ?>
                            </h6>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
        <h4 class="text-white text-center titleHeading1 d-inline-block px-3 position-relative fw-bolder">
            مدت زمان باقی مانده
        </h4>
        <?php echo get_template_part('template-parts/countdown') ?>
        <div class="mt-5 mb-lg-0 text-center">
            <?php
            $instagram_share_button = get_field('instagram_share_button');
            if ($instagram_share_button): ?>
                <button id="copyButton"
                        data-instagram-link="<?php echo esc_html($instagram_share_button['id']); ?>"
                        class="ps-3 py-2 bg-secondary rounded-3 border-0 fs-5 fw-bold text-primary buttonInsta lazy w-100 d-lg-inline-flex align-items-center justify-content-start gap-2 d-none position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#007c2e" class="bi bi-instagram"
                         viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                    <a class="text-primary stretched-link" target="_blank" href="https://instagram.com/genius.drink?igshid=MzRlODBiNWFlZA==">کلیک کن و برو به genius.drink@ </a>
                </button>
            <?php endif; ?>

        </div>
    </section>
<?php }
get_footer();