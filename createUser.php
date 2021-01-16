<?php
  require('./db.php');

  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
  header('Content-Type: application/json');


  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '404';
    exit;
  }

  $data = json_decode(file_get_contents('php://input'), true);

  if (empty($data)) {
    echo json_encode(array(
      'success' => false,
      'error' => 'require data'
    ));
    exit;
  }

  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $age = $data['age'];
  $tel = $data['tel'];

  $sql = "INSERT INTO users (firstname, lastname, age, tel)
          VALUES ('$firstname', '$lastname', '$age', '$tel')";

  $result = mysqli_query($connection, $sql);
  $errorMessage = (!$result) ? mysqli_error($connection) : '';
  $lastID = mysqli_insert_id($connection);

  mysqli_close($connection);

  $response = array(
    'success' => true,
    'id' => $lastID
  );
  if (!$result) {
    $response = array(
      'success' => false,
      'error' => $errorMessage
    );
  }
  
  echo json_encode($response);