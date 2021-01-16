<?php
  require('./db.php');

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  header('Content-Type: application/json');

  $sql = "SELECT * from users";

  $result = mysqli_query($connection, $sql);

  $errorMessage = (!$result) ? mysqli_error($connection) : '';
  mysqli_close($connection);
  $response = [];

  while ($data = mysqli_fetch_array($result)) {
    $response[] = array(
      'id' => $data['id'],
      'firstname' => $data['firstname'],
      'lastname' => $data['lastname'],
      'age' => $data['age'],
      'tel' => $data['tel'],
      'created_at' => $data['created_at']
    );
  }
  
  echo json_encode($response);