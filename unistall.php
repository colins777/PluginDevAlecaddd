<?php

/**
 *
 * Trigger this file on Plugin unistall
 * @package AlecadddPlugin
 */

if (! defined('WP_UNISTALL_PLUGIN')) {
    die;
}

//Clear database stored data

//$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));
//
//foreach ($books as $book) {
//    wp_delete_post ($book->ID, true);
//}

//2 method to delete data after plugin deleting

//directly access to DB
global $wpdb;

$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");
