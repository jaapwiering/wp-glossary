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

			// link back to all terms
			$link = get_site_url();
			echo '<a href="' . $link . '/glossary">To all glossary terms</a>';

			// table with all lemmas
			get_template_part( 'template-parts/content', 'glossary-table' );

		?>

    </div><!-- .entry-content -->

</main>
<div class="main-area-full"></div>

<?php
get_footer();
