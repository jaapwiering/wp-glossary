<?php

/* initialise child theme */

add_action(
  'wp_enqueue_scripts',
  function () {
     wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
  },
  10
);
