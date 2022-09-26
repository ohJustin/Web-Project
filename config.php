// Template for connecting our database via the login data received. {9/21/22}

<?php
$server = "";
$username = "";
$password = "";
$database = "";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
die("<script>alert('Connection Failed!'</script>");
}

?>
