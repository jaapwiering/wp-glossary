<?php
get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

    <div class="entry-content">

        <header class="page-header">
			<h1>Glossary</h1>
        </header>

		<?php
			if ( have_posts() ) :

				echo '<table class="glossary" id="GlossaryTable"><thead><tr><th>Title</th><th>Category</th><th>Definition</th><th>Author</th></tr></thead><tbody>';

				// // sort titles alphabetically
				// $found_posts = array();

				// foreach ( $wp_query->posts as $k=>$p ) {
				// 	$found_posts[ apply_filters('the_title', $p->post_title) ] = $p;
				// }

				// ksort($found_posts, SORT_NATURAL | SORT_FLAG_CASE);
				// $i=0;

				// foreach ($found_posts as $k=>$p) {
				// 	$wp_query->posts[$i++] = $p;
				// }

				while ( have_posts() ) :
					the_post();
						$title = get_the_title();
						$category = get_the_category_list( esc_html__( ', ', 'fngl_s-core' ) );
						$content = get_the_content();
						$author = get_the_author();
						echo '<tr><td>' . $title . '</td><td>' . $category . '</td><td>'. $content  . '</td><td>'. $author . '</td></tr>';
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
