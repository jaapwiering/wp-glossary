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

			echo '<ul>';
			foreach ($terms as $term){
				echo '<li><a href="' . get_term_link($term) .  '">' .  $term->name  . '</a></li>';
			}
			echo '</ul>';
		?>


		<?php

			// table with all lemmas

			if ( have_posts() ) :

				echo '<table class="glossary" id="GlossaryTable">
				<thead><tr><th>Term</th><th>Category</th><th>Definition</th></tr></thead>
				<tbody>';

				while ( have_posts() ) :
					the_post();
						$link = get_permalink();
						$term = get_the_title();
						$content = get_the_content();
						$author = get_the_author();
						$terms = get_the_terms($post->ID, 'glossary-category');

						echo '<tr>' . 
								'<td><a href="' . $link .  '">' .  $title  . '</a></td>' .
								'<td>';

						// if (!empty($terms)) :
							foreach ($terms as $term) {
								echo '<a href="' . get_term_link($term) .  '">' .  $term->name  . '</a>' ;
							}
						// endif;

						// var_dump($terms);
							
						echo '</td><td>';
							get_the_content();
						echo '</td></tr>';
				endwhile;

				// wp_reset_postdata();

				echo '</tbody></table>';
			endif; ?>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
				$('#GlossaryTable').DataTable({
			        paging: false,	
			        info: false,
        			order: [[0, 'asc']],
					"language": {
					    "search": "Filter",
					}
				})
			});
	</script>

    </div><!-- .entry-content -->

</main>
<div class="main-area-full"></div>

<?php
get_footer();
