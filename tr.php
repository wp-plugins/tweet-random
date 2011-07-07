<?php
/*
Plugin Name: Tweet Random
Version: 1.2
Description: Creates an RSS feed for TweetRandom.com. 
Plugin URI: http://tweetrandom.com/
Author: Suhas Sharma
Author URI: http://www.suhastech.com/
*/

function tr_add_options_page(  ) {
  if ( function_exists('add_options_page') ) {
    add_options_page( 'Manage Tweetrandom', 'TweetRandom', 'manage_options', __FILE__, 'tr_options_page' );
  }
  }
  
function tr_options_page(  ) {
  include_once('tr-options.php');
}

function tr_add_feed(  ) {
  global $wp_rewrite;
  add_feed('tweetrandom', 'makeiprss');
  add_action('generate_rewrite_rules', 'tr_rewrite_rules');
  $wp_rewrite->flush_rules();
}

function tr_rewrite_rules( $wp_rewrite ) {
  $new_rules = array(
    'feed/(.+)' => 'index.php?feed='.$wp_rewrite->preg_index(1)
  );
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

function makeiprss(  ) {
  include_once('tr-template.php');
}


add_action('admin_menu', 'tr_add_options_page');
add_action('init', 'tr_add_feed');
?>
