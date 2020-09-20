<?php


  function db ( $sql, $vars = [] ) {
    
    if ( ! isset ( $sql_connect ) ) 
      $sql_connect = db_connect ( $sql_host , $sql_user , $sql_password , $sql_database );
    
    return db_part2 ($sql_connect, $sql, $vars, 'app');
    
  }
  
  
  function db_part2 ( $sql_connect, $sql, $vars, $db_type) {

    global $sql_connect, $sql_host , $sql_user , $sql_password , $sql_database, $db_rows_found;

    foreach ( $vars as $i => $replace ) {

      $p1 = strpos($sql, '{'.$i.'}' );

      if ( $p1 !== FALSE )
        if (substr($i, 0, 1) <> 'x')
          $sql = str_replace('{'.$i.'}', mysqli_real_escape_string($sql_connect, $replace), $sql);
        else
          $sql = str_replace('{'.$i.'}', $replace, $sql);

      $p1 = strpos($sql, '{'.$i.':' );

      if ($p1 !== FALSE) {

        $p2 = strpos($sql, ":", $p1+1);
        $p3 = strpos($sql, "}", $p1+2);

        $search = substr($sql, $p1,  ($p3-$p1)+1);
        $length = substr($sql, $p2+1,($p3-$p2)-1);

        if ( strlen($replace) > $length )
          $replace = substr($replace, 0, $length);

        $sql = str_replace($search, mysqli_real_escape_string($sql_connect, $replace), $sql);

      }

    }

    $split   = explode(' ', trim($sql), 2);
    $command = trim(strtolower($split[0]));

    if     ( $command == 'check'  )  $sql = 'select 1 from ' . $split[1] . ' limit 0,1';
    elseif ( $command == 'record' )  $sql = 'select '        . $split[1] . ' limit 0,1';
    elseif ( $command == 'field'  )  $sql = 'select '        . $split[1] . ' limit 0,1';
    elseif ( $command == 'array'  )  $sql = 'select '        . $split[1];

    $query = mysqli_query ( $sql_connect , $sql );

    if ( ! $query )
      throw new Exception ( 'MySQL-' . mysqli_errno ( $sql_connect ) . ': ' . mysqli_error ( $sql_connect ) . ' / ' . $sql );

    $db_rows_found = $rows = mysqli_affected_rows($sql_connect);

    if ( $rows > 0 and ($command == 'field' or $command == 'record') ) {
      $fields = mysqli_fetch_assoc ( $query );
      $GLOBALS['db_last_fields'] = $fields;
    }

    if ( $command == 'insert'  ) {
      $return = mysqli_insert_id ( $sql_connect );
      if ( !$return )
        $return = $rows;
    }
    elseif ( $command == 'set')       $return = $rows;
    elseif ( $command == 'truncate')  $return = $rows;
    elseif ( $command == 'load'    )  $return = $rows;
    elseif ( $command == 'replace' )  $return = $rows;
    elseif ( $command == 'update'  )  $return = $rows;
    elseif ( $command == 'delete'  )  $return = $rows;
    elseif ( $command == 'check'   )  $return = $rows;
    elseif ( $command == 'field'   )
      if ( $rows < 1 )
        $return = '';
      else
        foreach ($fields as $key => $return)
          break;
    elseif ( $command == 'record'  )
      if ( $rows < 1 )
        $return = array();
      else
        $return = $fields;
    elseif ( $command == 'array'  ) {
      $return = array();
      if ( $rows > 0 )
        for ( $i = 1; $record = mysqli_fetch_assoc ($query); $i ++ )
          if ( isset($record['id']) and !isset($return [$record['id']]) )
            $return [$record['id']] = $record;
          else
            $return [] = $record;
    }
    else
      $return = '';

    return $return;

  }



  function db_connect ( $host, $user, $password, $database ) {

    $connect = mysqli_connect ( "p:$host" , $user , $password , $database );
    
    if ( ! $connect )
      throw new Exception ( 'MySQL-' . mysqli_connect_errno ( ) . ' - ' . mysqli_connect_error ( ) );
      
    mysqli_query ($connect, "SET SESSION sql_mode = 'TRADITIONAL'");
    
    return $connect;
    
  }


?>