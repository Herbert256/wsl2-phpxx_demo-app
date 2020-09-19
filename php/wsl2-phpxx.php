<?php

  $start = microtime (true);

  function set_memory_cache ($key, $value) {

    global $memcached;

    $memcached = new Memcached();

    $memcached->addServer('127.0.0.1', 11211);
    $memcached->set($key, $value);

  }

  function get_memory_cache ($key) {

    global $memcached;

    return $memcached->get($key);

  }

  function write_log () {

    global $start;

    $version = phpversion();

    $php     = (int) ( 1000000 * ( $start          - $_SERVER['REQUEST_TIME_FLOAT'] ) );
    $page    = (int) ( 1000000 * ( microtime(true) - $start                         ) );
 
    $line = "Version: $version, PHP: $php, Page: $page";

    file_put_contents ('/app/log/wsl2-phpxx.txt', $line . PHP_EOL, LOCK_EX | FILE_APPEND);

  }

?>