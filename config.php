<?php

  define('DEBUG',true);
  
  if (!DEBUG) {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
  } else {
    error_reporting(E_ALL);
  }
  
  define('ADMIN_ADDRESS','blog_admin@mailinator.com');

  define('DB_HOSTNAME', 'localhost');
  define('DB_USER',     'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'blog');
  
  define('BLOG_NAME','The Jets Blog');
  define('BLOG_INDEX_NUM_POSTS',8);
  
  function format_mysql_datetime($datetime) {
    $time = strtotime($datetime);
    return date('F j, Y, g:i a', $time);
  }
  
  function redirect($script_name = 'index.php') {
    header("Location: $script_name");
    exit;
  }
?>