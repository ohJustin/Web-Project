<?php 
session_start();

#Extract username from current session
function getUsername(){
    $username = $_SESSION["username"];
    return $username;
}

function getDSN(){
  //$dsn = "mysql:host=localhost;dbname=test";
  $dsn = "mysql:host=localhost;port=8889;dbname=blogsite";
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


// #"SELECT id FROM user_table WHERE username = '$usr'";
// function sqlSelectUserEntries(){
//   $sessid = $_SESSION["userid"];
//   $statement = "SELECT * FROM user_table WHERE id = '$sessid'";
//   #$statement = 
//   return $statement;
// }



// $mypdo = getPDO();
// $entries = sqlSelectUserEntries();
// $entries = $mypdo->query($entries);
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="w3.css">
<!-- <link rel ="stylesheet" href="rstyle.css"> -->
<link rel ="stylesheet" href="pstyle.css">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "w3-xlarge" href="index.php">Home</a>
            <a class = "w3-xlarge" href = "create.php">Create</a>
            <a class = "active w3-xlarge " href = "profile.php">Profile</a>
            <a class = "w3-xlarge " href = "search.php">Connect</a>
            <a class = "w3-xlarge " href = "about.php">Q&A</a>
    </div>

  

</head>



<meta charset = "utf-8">
<!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p> -->
<!-- Profile card displayed with session's variables. -->

<!-- <div class="">
  
<div class="profcard w3-card  w3-green w3-bottombar w3-topbar w3-border-black">
  <img src="user.png" alt="User" style="width:100%">
  <h1>Username: <?php echo ''. $_SESSION['username'] ?></h1>
  <p class="title w3-card-text w3-center">Fellow University Student</p>
  <p class = "w3-center w3-card-text">University</p>
 
</div>
</div> -->
<!-- <header style="text-shadow:10px 1px 0 #444" class = "w3-panel w3-jumbo w3-monospace w3-bottombar w3-topbar w3-border-black ">Your Wall</header> -->
<title class = " w3-padding-84 ">Your Wall</title>
<body>  


  <div class="container">
      <div class = "profile-box">
        <img src="images/menu.png" class = "menu-icon">
        <img src="images/setting.png" class = "setting-icon">
        <img src="images/user.png" class = "profile-pic">
        <h3><?php echo ''. $_SESSION['username'] ?></h3>
        <p>Blogger & University Student, Illinois</p>
      <div class = "social-media">
      <a href=''><img src="images/instagram.png"/></a>
      <a class = "" href=''><img src="images/twitter.png"/></a>
      </div>
      <button class = "w3-xlarge w3-monospace w3-button w3-blue w3-bar" type="button">Follow</button>
      
      
      </div>
      
</div>

</body>


 <br></br><br></br>
 <footer class="w3-panel  w3-display-bottomleft w3-text-green w3-text-gray w3-large">
             &copy; <?php echo '2022'; ?> Justin Burns
        </footer>
</html>