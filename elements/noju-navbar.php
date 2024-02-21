<?php ?>

<nav class="noju-navbar">
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
        <button type="button" class="btn btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/></svg></button>
        <?php
        if ( has_custom_logo() ) {
            echo '<a  class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '"><img class="" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        } else {
            echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
        }
        ?>
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