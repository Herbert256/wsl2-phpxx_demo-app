<?php

  $start = microtime (true);

  include 'memcached.php';
  include 'mariadb.php';
  include 'filesystem.php';

  function version ($check) {

    $version = phpversion();

    if (substr($version, 0, 3) == $check) 
      echo ' <b>***</b>';

  }

?>