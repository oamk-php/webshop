<?php
function openDb(): object {
  $ini= parse_ini_file("../config.ini", true);

  $host = $ini['host'];
  $database = $ini['database'];
  $user = $ini['user'];
  $password = $ini['password'];
  $db = new PDO("mysql:host=$host;port=8889;dbname=$database;charset=utf8",$user,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  return $db;
}

function selectAsJson(object $db,string $sql) {
  $query = $db->query($sql);
  $results = $query->fetchAll(PDO::FETCH_ASSOC);
  header('HTTP/1.1 200 OK');
  echo json_encode($results);
}

function executeInsert(object $db,string $sql) {
  $query = $db->query($sql);  
  $query->execute();
  $id = $db->lastInsertId();
}

function returnError(PDOException $pdoex) {
  header('HTTP/1.1 500 Internal Server Error');
  $error = array('error' => $pdoex->getMessage());
  echo json_encode($error);
  exit;
}