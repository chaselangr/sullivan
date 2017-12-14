<?php get_header(); ?>

<main id="site-content">

	<div class="section-inner">

		<header class="page-header section-inner thin">

			<div>

				<h1><?php _e( 'Error 404', 'eames' ); ?></h1>

				<p class="sans-excerpt"><?php _e( "The page you're looking for could not be found. It may have been removed, renamed, or maybe it didn't exist in the first place.", "eames" ); ?></p>

				<a class="go-home" href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'To the front page', 'eames' ); ?></a>

			</div>

		</header><!-- .page-header -->

	</div><!-- .post -->

</main>

<?php get_footer(); ?>