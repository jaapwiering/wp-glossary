<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="main primary" class="main-area">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile;
	?>

	<h2 class="text-width">Top glossary items</h2>
	<p>&nbsp;</p>
	<?php 
		// second loop
		get_template_part( 'template-parts/content', 'glossary-top-term-table' );
	?>

	<p class="text-width"><strong>Research all terms in the <a href="https://fngl.nl/glossary/glossary">glossary</a></strong></p> 

</main>

<?php
get_sidebar();
get_footer();
