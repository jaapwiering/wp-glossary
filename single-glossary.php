<?php
/**
 * The template for displaying single posts from CPT glossary
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Fanagalo_underscores_core
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="main primary" class="main-area">
	<!-- pre>single-glossary.php</pre -->


	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );
		the_post_navigation();
	endwhile; 
	?>

<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
?>

</main>

<?php
get_sidebar();
get_footer();
