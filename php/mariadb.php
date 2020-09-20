<?php


  $pad_sql_host     = '127.0.0.1';
  $pad_sql_database = 'wsl2-phpxx';
  $pad_sql_user     = 'wsl2-phpxx';
  $pad_sql_password = 'wsl2-phpxx';

  include 'db';


  function get_database_cache ($key) {

    db ( 'field `value` from `wsl2-phpxx` where `key` = "{0}"', [$key] );

  }


  function set_database_cache ($key, $value) {

    db ( 'insert into `wsl2-phpxx` values ( {0}, {1} )', [ $key, $value ] );

  }


  function database_cache () {

    $value = get_database_cache ('wsl2_phpxx');

    if ( $value !== FALSE) 
      return $value;

    set_database_cache ( 'wsl2_phpxx', 'From database, stored by ' . phpversion() );

    return get_database_cache ('wsl2_phpxx');

  }


?>