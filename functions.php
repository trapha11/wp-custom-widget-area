<?php
/**
 * trang-pham.com functions and definitions
 */

/*
 * Add Widget Area to Top and Bottom of Single Page
 */
function signup_widgets_init() {
    register_sidebar( array(
        'name' => __( 'CTA Widget Area', 'signup' ),
        'id' => 'cta-widget-area',
        'before_widget' => '<div style="text-align:center; padding-bottom: 20px;">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'signup_widgets_init' );
