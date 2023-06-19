<?php
/**
 * Template part for displaying page the (complete or partial) glossary table
 * @package wp-glossary
 */

?>

<?php

    if ( have_posts() ) :

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

        while ( have_posts() ) :
            the_post();

                // $author = get_the_author();
                $content = get_the_content('Details');
                $link = get_permalink();
                $slug = $post->post_name;
                $terms = get_the_terms($post->ID, 'glossary-category');
                $title = get_the_title();

                echo '<tr>' . 
                        '<td class="glossary-term-name"><a href="' . $link .  '" id="' . $slug . '">' .  $title  . '</a></td>' .
                        '<td class="glossary-term-category">';

                    	if (!empty($terms)) :
                            echo '<ul>';
							foreach ($terms as $term) {
								echo '<li><a href="' . get_term_link($term) .  '">' .  $term->name  . '</a></li>' ;
							}
                            echo '</ul>';
						endif;

                echo '</td>';
                echo '<td class="glossary-term-definition">'. $content  . '</td>';
                // echo '<td class="glossary-term-definition">'. apply_filters( 'the_content', $content )  . '</td>'; // uitgebreide content
                // echo '<td>'. $author . '</td>'; 


                if (is_user_logged_in( )) {
                    edit_post_link( __( 'edit', 'textdomain' ), '<td>', '</td>' );
                }

                echo '</tr>';
        endwhile;

        wp_reset_postdata();

        echo '</tbody></table>';
    endif; 
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