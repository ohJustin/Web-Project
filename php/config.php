// Template for connecting our database via the login data received. {9/21/22}

<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$server = "";
$username = "";
$password = "";
$database = "";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
die("<script>alert('Connection Failed!'</script>");
}

?>
