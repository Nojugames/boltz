<?php ?>

<nav class="muffes-navbar">
    <div class="container navbar-container d-flex justify-content-between">
        <div class="d-md-none d-flex align-items-center ms-3">
            <a class="" data-bs-toggle="offcanvas" href="#mobileMenu" role="button"
               aria-controls="offcanvas"><span class="visually-hidden">Toggle menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/>
                </svg>
            </a>
        </div>
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );

        if ( has_custom_logo() ) {
            echo '<a  class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '"><img class="" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        } else {
            echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
        }
        ?>

        <div class="main-menu-navigation d-none d-md-block" id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'show_button'     => false
                //'depth' => 2,
                //'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">Menu</h5>
        <button type="button" class="btn btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/></svg></button>
    </div>
    <div class="offcanvas-body offcanvas-body-menu">
        <ul class="xoxo">
            <?php wp_nav_menu( array(
                'theme_location'  => 'main-menu',
                'container_id'    => 'main-menu',
                'container_class' => '',
                'link_before'     => '',
                'link_after'      => '',
                'show_button'     => true
            ) ); ?>
        </ul>
        <div class="d-flex align-items-center justify-content-start some-links p-3">
            <a target="_blank" class="ms-xl-3 d-flex align-items-center" href="https://www.instagram.com/fribbediscgolf/">
                <span class="d-block">@fribbediscgolf</span>
                <span class="visually-hidden"><?php esc_html_e( 'Instagram', 'fribbe' ); ?></span>
                <svg class="mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
            </a>
            <a target="_blank" href="https://www.facebook.com/fribbediscgolf"><span class="visually-hidden"><?php esc_html_e( 'Facebook', 'fribbe' ); ?></span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg></a>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.toggle-sub-menu').forEach( button => {
        button.onclick = function () {
            if (this.nextElementSibling.classList.contains("sub-menu")) {
                this.nextElementSibling.classList.toggle('sub-menu-open')
            }
            this.classList.toggle('toggle-sub-menu-open');
        }
    });
</script>