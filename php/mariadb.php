<?php


  $sql_host     = '127.0.0.1';
  $sql_database = 'wsl';
  $sql_user     = 'wsl';
  $sql_password = 'wsl';

  include 'db.php';


  function get_database_cache ($key) {

    return db ( 'field val from wsl where id = "{0}"', [$key] );

  }


  function set_database_cache ($key, $value) {

    db ( 'insert into wsl values ( "{0}", "{1}" )', [ $key, $value ] );

  }


  function database_cache () {

    $value = get_database_cache ('wsl');

    if ( $value ) 
      return $value;

    set_database_cache ( 'wsl', 'From database, stored by ' . phpversion() );

    return get_database_cache ('wsl');

  }


?>