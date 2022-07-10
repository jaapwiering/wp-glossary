<?php
get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

    <div class="entry-content">

        <header class="page-header">
			<!-- pre>taxonomy-glossary-category.php</pre -->
		
			<h1>Glossary category: 
				<?php 
					$terms = get_the_terms($post->ID, 'glossary-category');	

					foreach ($terms as $term){
						echo '<span>' . $term->name . '</span>';
					}
				?>
			</h1>

		</header>

		<?php

			// display a list with all categories = custom taxonomy 'glossary-category'

			$link = get_site_url();

			$terms = get_terms([
				'taxonomy' => 'glossary-category',
				'hide_empty' => false,
			]);

			echo '<ul class="glossary-terms-menu">';
			echo '<li class="home-link"><a href="' . $link . '/glossary">all categories</a></li>';
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
