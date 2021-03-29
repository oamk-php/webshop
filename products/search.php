<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

// Read parameters from url. Example: http://localhost/webshop/products/getproducts.php/1
$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
// Parameters are separated with slash (/)
$parameters = explode('/',$uri);

// Category id is first parameter so it follows after address separated with slash (/)
$phrase = $parameters[1]; 

try {
  $db = openDb();
  $sql = "select * from product where name like '%$phrase%'";
  selectAsJson($db,$sql);

}
catch (PDOException $pdoex) {
  returnError($pdoex);
}