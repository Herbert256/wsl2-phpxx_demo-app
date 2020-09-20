<?php


  $memcached = new Memcached();
  $memcached->addServer('127.0.0.1', 11211);


  function get_memory_cache ($key) {

    global $memcached;

    return $memcached->get($key);

  }


  function set_memory_cache ($key, $value) {

    global $memcached;
    
    $memcached->set($key, $value);

  }


  function memory_cache () {

    $value = get_memory_cache ('wsl2_phpxx');

    if ( $value !== FALSE) 
      return $value;

    set_memory_cache ( 'wsl2_phpxx', 'From memory, stored by ' . phpversion() );

    return get_memory_cache ('wsl2_phpxx');

  }


?>