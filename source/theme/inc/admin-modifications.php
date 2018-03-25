<?php

/**
 * Nuke the admin bar
 */
function carpel_anther_remove_admin_toolbar()
{
    add_filter('show_admin_bar', '__return_false');
}
add_action('get_header', 'carpel_anther_remove_admin_toolbar');

?>
