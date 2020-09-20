<?php


  if ( ! file_exists("/app/log") )
    mkdir("/app/log");


  function write_log () {

    global $start;

    $version = phpversion();

    $php     = (int) ( 1000000 * ( $start          - $_SERVER['REQUEST_TIME_FLOAT'] ) );
    $page    = (int) ( 1000000 * ( microtime(true) - $start                         ) );
 
    $line = "Version: $version, PHP: $php, Page: $page";

    file_put_contents ('/app/log/log.txt', $line . PHP_EOL, LOCK_EX | FILE_APPEND);

  }


?>