<?php

  $host="localhost";
  $user="root"; 
  $pass="";		
  $dbname="vue_example";
  global $connection;
  $connection = @mysqli_connect($host,$user,$pass,$dbname) 
          or die(mysqi_connect_error()."Error : Can't Connect to Database");

  mysqli_set_charset($connection, "utf8");