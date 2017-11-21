<?php

is_home();

is_front_page();

is_admin();

is_admin_bar_showing();

is_single();

is_single(17, 'Irish-Stew', 'Irish Stew');
// When the Post with post_id of 17 or post_slug of Irish-Stew or post_title of "Irish Stew" is being displayed.
is_single( array( 17, 19, 1, 11 ));
// When the Post with post_id of 17 or 19 or 1 or 11 is being display .

is_sticky('17');



is_page(array( 42, 'about-me', 'About Me And Joe' ));
is_page(array(42, 54, 6 ));


is_page_template('about.php');
is_page_template('page-templates/about.php');







