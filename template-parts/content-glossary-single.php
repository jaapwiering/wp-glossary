<?php

/**
 * Template part for displaying single glossary item
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="article-header">
		<?php

		if (has_term()) :

			$terms = get_the_terms($post->ID, 'glossary-category');	

			echo '<ul class="glossary-item-term">';
			foreach ($terms as $term){
				echo '<li class="glossary-term-button"><a href="' . get_term_link($term) .  '">' .  $term->name  . '</a></li>';
			}
			echo '</ul>';
		endif;

		if (is_singular()) :
			the_title('<h1 class="article-title">', '</h1>');
		else :
			the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;
        ?>
	</header><!-- .article-header -->

	<div class="article-content">
		<?php
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'fngl-s-core'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		?>
	</div><!-- .article-content -->

	<footer class="article-footer">
		<div class="update">
			<?php fngl_last_update(); ?>
		</div>
	</footer><!-- .article-footer -->

</article><!-- #post-<?php the_ID(); ?> -->