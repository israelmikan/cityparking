<?php
$username="cityparking";
$password="dangersisrael";
$database="cityparking";

// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}
?>