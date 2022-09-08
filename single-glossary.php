<?php
/**
 * The template for displaying single posts from CPT glossary
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="main primary" class="main-area">

	<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'glossary-single' );
		endwhile; 

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;


		$post_title = get_the_title();
	
		if( has_term( 'category', 'glossary-category' ) ) {
			echo 'ik ben category';
		}
		echo 'blabla' . $post_title;

		/*

		second query

		if post has gloss_cat 18 

		for post_title = 
		if post_title = glossary_cat

		show all items in glossary_cat





		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'glossary-table' );
		endwhile; 

		*/

	?>

</main>

<?php
get_sidebar();
get_footer();
