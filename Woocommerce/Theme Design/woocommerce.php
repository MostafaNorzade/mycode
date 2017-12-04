<?php

//----- Copy of page.php and Replace this code with Wordpress Loop ----------

if ( have_posts() ) : ?>

    <?php @woocommerce_content(); ?>

<?php endif; ?>