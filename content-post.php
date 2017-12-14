<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	
	<header class="post-header">

		<p class="header-meta subheading">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
			<?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky', 'eames' ) . '</span>'; ?>

			<?php if ( current_user_can( 'edit_post', get_the_id() ) ) : ?>
				<span class="edit-post"><?php edit_post_link( __( 'Edit post', 'eames' ) ); ?></span>
			<?php endif ;?>
		</p><!-- .post-top-meta -->
	
		<?php 
		if ( get_the_title() ) :
			if ( ! is_single() ) : ?>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php 
			else :
				the_title( '<h1 class="post-title">', '</h1>' );
			endif; 
		endif; 
		?>
	
	</header><!-- .post-header -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="featured-media">

			<?php the_post_thumbnail(); ?>

		</div><!-- .featured-media -->

	<?php endif; ?>

	<div class="post-inner between">

		<?php if ( has_excerpt() ) : ?>

			<p class="excerpt mobile-excerpt"><?php echo get_the_excerpt(); ?></p>

		<?php endif; ?>

		<div class="post-meta top">

			<p class="post-author">
				<span class="meta-title subheading"><?php _e( 'Posted by', 'eames' ); ?></span>
				<span class="meta-title mobile-meta-title subheading"><?php _e( 'By', 'eames' ); ?> </span>
				<span class="meta-content"><?php the_author_posts_link(); ?></span>
			</p>

			<p class="post-categories">
				<span class="meta-title subheading"><?php _e( 'Posted in', 'eames' ); ?></span>
				<span class="meta-content"><?php the_category( ', ' ); ?></span>
			</p>

			<?php if ( comments_open() ) : ?>

				<p class="post-comment-link">
					<span class="meta-title subheading"><?php _e( 'Discussion', 'eames' ); ?></span>
					<span class="meta-content"><?php comments_popup_link(); ?></span>
				</p>

			<?php endif; ?>

		</div><!-- .post-meta -->

		<div class="post-content-wrapper">

			<?php if ( has_excerpt() ) : ?>

				<p class="excerpt desktop-excerpt"><?php echo get_the_excerpt(); ?></p>

			<?php endif; ?>

			<div class="entry-content post-content">

				<?php the_content(); ?>
				<?php wp_link_pages(); ?>

			</div><!-- .entry-content -->

		</div><!-- .post-content-wrapper -->

	</div><!-- .post-inner -->

	<?php if ( is_single() ) :
			
		$tags = get_the_tags(); ?>

		<div class="post-inner compensate">

			<div class="post-meta bottom<?php if ( ! $tags ) echo ' no-tags'; ?>">

				<?php if ( $tags ) : ?>

					<p class="post-tags">
						<span class="meta-title subheading"><?php _e( 'Tags:', 'eames' ); ?></span>
						<span class="meta-content"><?php the_tags( '', ', ', '' ); ?></span>
					</p>

				<?php endif; ?>

				<p class="post-categories">
					<span class="meta-title subheading"><?php _e( 'Categories:', 'eames' ); ?></span>
					<span class="meta-content"><?php the_category( ', ' ); ?></span>
				</p>

			</div>

			<?php 
			$next_post = get_next_post();
			$prev_post = get_previous_post();

			if ( $next_post || $prev_post ) : ?>

				<div class="single-pagination<?php if ( ! $next_post || ! $prev_post ) echo ' only-one'; ?>">

					<?php if ( $next_post ) : ?>

						<a class="next-post" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php the_title_attribute( array( 'post' => $next_post->ID ) ); ?>">
							<span class="subheading"><?php _e( 'Next post', 'eames' ); ?></span>
							<span class="title"><?php echo get_the_title( $next_post->ID ); ?></span>
						</a>

					<?php endif; ?>

					<?php if ( $prev_post ) : ?>

						<a class="previous-post" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php the_title_attribute( array( 'post' => $prev_post->ID ) ); ?>">
							<span class="subheading"><?php _e( 'Previous post', 'eames' ); ?></span>
							<span class="title"><?php echo get_the_title( $prev_post->ID ); ?></span>
						</a>

					<?php endif; ?>

				</div><!-- .single-pagination -->

			<?php endif; ?>

		</div><!-- .post-inner -->

		<?php
		
		// If comments are open, or there are at least one comment
		if ( get_comments_number() || comments_open() ) : ?>
		
			<div class="section-inner hanging-titles">
				<?php comments_template(); ?>
			</div>
		
		<?php endif; 
		
		// Display related posts
		get_template_part( 'related-posts' ); 

	endif; ?>

</article>