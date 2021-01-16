<?php
  require('./db.php');

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  header('Content-Type: application/json');

  $id = (!empty($_GET['id'])) ? $_GET['id'] : 0 ;

  $sql = "SELECT * from users WHERE id = '$id'";

  $result = mysqli_query($connection, $sql);

  $errorMessage = (!$result) ? mysqli_error($connection) : '';
  mysqli_close($connection);
  $response = $result->fetch_assoc();
  
  echo json_encode($response);