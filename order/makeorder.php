<?php
require_once 'inc/functions.php';
require_once 'inc/headers.php';

$input = json_decode(file_get_contents('php://input'));
$value = filter_var($input->description,FILTER_SANITIZE_STRING);

try {
  $db = openDb();
  
  $sql = "insert into customer (firstname,lastname) values 
  ('" . filter_var($value,FILTER_SANITIZE_STRING)  .  "')";

  $id = executeInsert($db,$sql);
  
  header('HTTP/1.1 200 OK');
  $data = array('id' => $id);
  echo json_encode($data);
}
catch (PDOException $pdoex) {
  returnError($pdoex);
}