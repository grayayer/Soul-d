<?php
/**
 *
 * Archive page
 *
 **/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php if (is_active_sidebar('content_top')) : ?>
			<?php do_action('events_before_content_top'); ?>
			<div id="content-top" role="complementary">
				<?php dynamic_sidebar('content_top'); ?>
			</div>
			<?php do_action('events_after_content_top'); ?>
			<?php endif; ?>
			
			<?php do_action('events_before_content'); ?>
			<?php if ( have_posts() ) : ?>
				<header class="archive-header">
					<h1 class="archive-title">
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: %s', 'events' ), '<span>' . get_the_date() . '</span>' ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: %s', 'events' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: %s', 'events' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
					<?php else : ?>
						<?php _e( 'Blog Archives', 'events' ); ?>
					<?php endif; ?>
					</h1>
				</header>
	
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
	
				<?php events_paging_nav(); ?>
	
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
			<?php do_action('events_after_content'); ?>
			
			<?php if (is_active_sidebar('content_bottom')) : ?>
			<?php do_action('events_before_content_bottom'); ?>
			<div id="content-bottom" role="complementary">
				<?php dynamic_sidebar('content_bottom'); ?>
			</div>
			<?php do_action('events_after_content_bottom'); ?>
			<?php endif; ?>
		</div><!-- #content -->
		
		<?php if (is_active_sidebar('sidebar')) : ?>
		<?php do_action('events_before_sidebar'); ?>
		<aside id="sidebar" role="complementary">
			<?php dynamic_sidebar('sidebar'); ?>
		</aside>
		<?php do_action('events_after_sidebar'); ?>
		<?php endif; ?>
	</div><!-- #primary -->

<?php get_footer(); ?>