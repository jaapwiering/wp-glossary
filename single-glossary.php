<?php
/**
 * The template for displaying single posts from CPT glossary
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="main primary" class="main-area">

	<?php
		// first loop for single information
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'glossary-single' );
		endwhile; 


		// conditional if glossary category triggers second loop
	
		if( has_term( 'glossary-category', 'glossary-category' ) ) {
			get_template_part( 'template-parts/content', 'glossary-category-table' );
		}

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

</main>

<?php
get_sidebar();
get_footer();