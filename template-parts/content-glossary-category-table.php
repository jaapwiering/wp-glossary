<?php
/**
 * Template part for displaying a glossary category
 * @package wp-glossary
 */

?>

<?php

		$post_slug = $post->post_name;		

		$args = array(
			'post_type' => 'glossary',
			'tax_query' => array(
				array(
					'taxonomy' => 'glossary-category',
					'field'    => 'slug',
					'terms'    => $post_slug,
				),
			),
		);

		$the_query = new WP_Query($args);
		
		if ( $the_query->have_posts() ) {

			echo '<table class="glossary" id="GlossaryTable">
						<thead><tr>
							<th class="glossary-head-name">Term</th>
							<th class="glossary-head-category">Category</th>
							<th class="glossary-head-definition">Definition</th>';

			if (is_user_logged_in( )) {
				echo '      <th class="glossary-head-edit-link"></th>';
			}

			echo '      </tr></thead>
					<tbody>';

			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				// echo '<li>' . get_the_title() . '</li>';

                $link = get_permalink();
                $title = get_the_title();
                $content = get_the_content();
                // $author = get_the_author();
                $terms = get_the_terms($post->ID, 'glossary-category');

                echo '<tr>' . 
                        '<td class="glossary-term-name"><a href="' . $link .  '">' .  $title  . '</a></td>' .
                        '<td class="glossary-term-category">';


                    	if (!empty($terms)) :
							foreach ($terms as $term) {
								echo '<a href="' . get_term_link($term) .  '">' .  $term->name  . '</a>' ;
							}
						endif;

                echo '</td>';
                echo '<td class="glossary-term-definition">'. $content  . '</td>';


				if (is_user_logged_in( )) {
					edit_post_link( __( 'edit', 'textdomain' ), '<td>', '</td>' );
				}

            echo '</tr>';

			endwhile;

        echo '</tbody></table>';

		} else {
			echo 'no posts found';
		}

		wp_reset_postdata();

	?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () 
        {
            $('#GlossaryTable').DataTable({
                paging: false,	
                info: false,
                order: [[0, 'asc']],
                "language": {
                    "search": "Filter",
                }
            })
        } );
</script>