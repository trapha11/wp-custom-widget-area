<?php
/**
 * The template for displaying all single posts.
 *
 * @package Odd Dog SMB
 */

get_header();

$internal_position = get_theme_mod( 'internal_position' );

?>

	<div id="primary" class="content-area">
		<?php if($internal_position == 'left'): ?>
			<header class="entry-header">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-sm-8 col-xs-12">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12 bread text-right">
							<p><?php yoast_breadcrumb(); ?></p>
						</div>
					</div>
				</div>
			</header>
		<?php else: ?>
			<header class="entry-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<p class="bread"><?php yoast_breadcrumb(); ?></p>
						</div>
					</div>
				</div>
			</header>
		<?php endif; ?>
		<section class="row container">
			<main id="main" class="site-main col-md-9 col-sm-9 col-xs-12" role="main">
				<div>
				<?php // CTA Sign Up Area
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('cta-widget-area') ) :
				endif; ?>
				</div><!-- .cta-widget -->
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
				<div>
				<?php // CTA Sign Up Area
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('cta-widget-area') ) :
				endif; ?>
				</div><!-- .cta-widget -->
			</main><!-- #main -->
			<aside class="col-md-3 col-sm-3 col-xs-12 sidebar">
				<?php get_sidebar(); ?>
			</aside>
		</section>
	</div><!-- #primary -->

<?php get_footer(); ?>
