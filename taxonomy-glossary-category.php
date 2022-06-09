<?php
get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

    <div class="entry-content">

        <header class="page-header">
			<!-- pre>taxonomy-glossary-category.php</pre -->
			<h1>Glossary</h1>
        </header>

		<?php
			$link = get_site_url();
			echo '<a href="' . $link . '/glossary">To all glossary items</a>';
		?>

		<?php

			if ( have_posts() ) :

				echo '<table class="glossary" id="GlossaryTable"><thead><tr><th>Title</th><th>Category</th><th>Definition</th><th>Author</th></tr></thead><tbody>';

				while ( have_posts() ) :
					the_post();

						$link = get_permalink();
						$title = get_the_title();
						$content = get_the_content();
						$author = get_the_author();
						$terms = get_the_terms($post->ID, 'glossary-category');

						echo '<tr>' . 
								'<td><a href="' . $link .  '">' .  $title  . '</a></td>' .
								'<td>';

						foreach ($terms as $term) {
							echo '<a href="' . get_term_link($term) .  '">' .  $term->name  . '</a>' ;
						}

						echo '</td>' . 
								'<td>'. $content  . '</td>' . 
								// '<td>'. $author . '</td>' . 
							'</tr>';
				endwhile;

				// wp_reset_postdata();

				echo '</tbody></table>';
			endif; ?>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () 
			{
				$('#GlossaryTable').DataTable({
			        paging: false,	
			        info: false,
			        "language": {
					    "search": "Filter",
					}
				})
			} );
	</script>





    </div><!-- .entry-content -->

</main>
<div class="main-area-full"></div>

<?php
get_footer();
