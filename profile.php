<?php 
session_start();

$uni = $_SESSION['University'];
#Extract username from current session
function getUsername(){
    $username = $_SESSION["username"];
    return $username;
}

function getDSN(){
  //$dsn = "mysql:host=localhost;dbname=test";
  $dsn = "mysql:host=localhost;port=8889;dbname=project";
  return $dsn;
}

function getSQLUsername(){
  $username = "root";
  return $username;
}
//getPassword Function
function getPassword(){
  $password = "root";
  return $password;
}
function getPDO(){
  $dsn = getDSN();
  $user = getSQLUsername();
  $psw = getPassword();
  $pdo = new PDO($dsn,$user,$psw);
  return $pdo;
}

function getValue($key){
  if(isset($_POST[$key])){
      $key = $_POST[$key];
      $key = htmlspecialchars(trim($key));
      return $key;
  }
  else{
      $key = "key is not set [fix me later]";
      return $key;
  }
}


?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="w3.css">
<!-- <link rel ="stylesheet" href="rstyle.css"> -->
<link rel ="stylesheet" href="pstyle.css">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- NAVIGATION BAR -->
<div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "active w3-xlarge" href="index.php">Home</a>
            <a class = "w3-xlarge" href = "create.php">Create</a>
            <a class = "w3-xlarge " href = "search.php">Connect</a>
            <!-- <a class = "w3-xlarge " href = "about.php">Q&A</a> -->


    </div>
    <div class="dropdown">
    <a class="dropbtn w3-display-topmiddle w3-center">Options</a>
    <div class="dropdown-content w3-display-topmiddle">
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
</div>
</div>


  

</head>



<meta charset = "utf-8">
<title class = " w3-padding-84 ">Your Wall</title>
<body>  


  <div class="container">
      <div class = "profile-box">
       
        <img src="images/user.png" class = "profile-pic">
        <h3><?php echo ''. $_SESSION['username'] ?></h3>
        <p class = "w3-large">Blogger / Student <?php echo '@'. $uni ?></p>
      <div class = "social-media">
   
      </div>
      <a href="userwall.php" class=" w3-xlarge w3-btn w3-btn-light w3-black">Your Wall &rarr;</a>
      

      
      
      </div>
      
</div>

</body>


 <br></br><br></br>
 <footer class="w3-panel  w3-display-bottomleft w3-text-green w3-text-gray w3-large">
             &copy; <?php echo '2022'; ?> Justin Burns
        </footer>
</html>