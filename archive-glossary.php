<?php
get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

    <div class="entry-content">

        <header class="page-header">
			<!-- pre>archive-glossary.php</pre -->
			<h1>Glossary</h1>
        </header>


		<?php

			// display a list with all categories = custom taxonomy 'glossary-category'

			$terms = get_terms([
				'taxonomy' => 'glossary-category',
				'hide_empty' => false,
			]);

			echo '<ul class="glossary-terms-menu">';
			foreach ($terms as $term){
				echo '<li><a href="' . get_term_link($term) .  '">' .  $term->name  . '</a></li>';
			}
			echo '</ul>';

			// table with all lemmas

			get_template_part( 'template-parts/content', 'glossary-table' );

		?>

	</div><!-- .entry-content -->

</main>
<div class="main-area-full"></div>

<?php
get_footer();
