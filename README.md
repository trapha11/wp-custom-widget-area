# wp-custom-widget-area
WordPress Theme Custom Widget Area

Widget Area commonly knows as the boxes that either lives in sidebar or footer. The advantage of using widgets is simply update the widget content will change the content of the area in all pages without having going to pages by pages to change this information.

At times you would like to have these boxes in other areas other than sidebar or footer, that’s when creating customizable Widget Area comes in handy. To do so simply follow 3 steps:

Registering a custom widget area
Display Widget Area
Add classes and HTML tags to custom widget area.
Let’s get started !

1. Registering a custom widget area
To registering a widget area add following code in your theme’s functions.php file.

function trixieweb_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Single CTA', 'trixieweb' ),
        'id' => 'header-sidebar',
        'before_widget' => '
',
        'after_widget' => '
 

',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'trixie_widgets_init' );
2. Display Widget Area
To display Widget Area add the following code to a location of your choice in your theme file:

header.php
footer.php
single.php
page.php
This example is in the header content.

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('single-cta') ) : 
 
endif; ?>
All done, this is how we create new widget area!

To preview newly created Widget Area you can go to Appearance > Widgets. There Must be a Widget area of name “Single CTA”.

You can register multiple Widget areas using above code.

Just use a different id for each Widget Area.

3. Add classes and HTML tags to custom widget area.
If your want to style those widgets which appear in your new custom widget area, just add some HTML or classes as follows:

register_sidebar( array(
'name' => __( 'Single Post CTA', 'trixieweb' ),
'id' => 'single-cta',
'description' => __( 'Appears on Function and Exercise Classes', 'trixieweb' ),
'before_widget' => '<aside class="" style="text-align: center;">',
'after_widget' => '</aside>',
'before_title' => '<h5 class="widget-title">',
'after_title' => '</h5>',
) );
In the above code, we have added and HTML tag called ‘aside’ with a class ‘widget’.

We have also wrapped widget title with ‘h5’ with a class ‘widget-title’.

Now you can apply some custom CSS with the help of those classes and markups.

If your don’t want to add codes to your WordPress theme, there are some free plugins which will do these tasks for yours.

Savvii Custom Post Widget Free WordPress Plugin
Custom Sidebars Free WordPress Plugin

I hope this tutorial helps you for registering a new Widget area. If you have any question please feel free to ask in comments.
