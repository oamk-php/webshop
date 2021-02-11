<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

// Read parameters from url. Example: http://localhost/webshop/products/getproducts.php/1
$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
// Parameters are separated with slash (/)
$parameters = explode('/',$uri);
// Category id is first parameter so it follows after address separated with slash (/)
$category_id = $uri[1]; 

try {
  $db = openDb();
  selectAsJson($db,"select * from product where category_id = $category_id");
}
catch (PDOException $pdoex) {
  returnError($pdoex);
}