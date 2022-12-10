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


if($_SERVER['REQUEST_METHOD'] === 'POST'){

      $pdo = getPDO();
      
      if(isset($_POST['search-btn'])){
         $searched_usr = $_POST['search'];
         $client_id = $_POST['userid'];
          #User input data.
          $querystring = "SELECT id FROM user_table WHERE username = '$searched_usr'";
          
          $querystring = $pdo->query($querystring);
          // if($matchedpasswordHashedResult != false && $matchedpasswordHashedResult->rowCount() == 1){
          if($querystring->rowCount() == 1){
            // $user_id = $user_idresult->fetch(PDO::FETCH_OBJ)->id;
            $_SESSION["searchedusr_id"] = $querystring->fetch(PDO::FETCH_OBJ)->id;
            $_SESSION["searched_usrname"] = $searched_usr;
            $searchedid = $querystring->fetch(PDO::FETCH_OBJ)->id;
              //CHECK IF THE USER IS FOLLOWING THE SEARCHED USER BEFORE REDIRECTING ! 
              // $activeid = $_SESSION["userid"];
              


            echo "<script>alert('Good Usrname!');</script>";
            header("Location: searchedprofile.php");      
          }
          }

          else{
            echo "<script>alert('Bad Search Information Try Again!');</script>";
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
<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "w3-xlarge" href="index.php">Home</a>
            <a class = "w3-xlarge" href = "create.php">Create</a>
            <a class = "w3-xlarge " href = "profile.php">Profile</a>
            <a class = "active w3-xlarge " href = "search.php">Connect</a>
            <a class = "w3-xlarge " href = "about.php">Q&A</a>
    </div>

  

</head>



<meta charset = "utf-8">

<title class = " w3-padding-84 ">Your Wall</title>
<body>  

<p class = "w3-green w3-xlarge w3-display-top"> Search a user: testing </p>

<form method = "POST">
  <div class = "container">
  <input class = "search-bar w3-green w3-xlarge w3-display-middle" name="search"placeholder="Search a username...">
  <div>
  <div class = "input-group">
  <button name = "search-btn" class = "submit-btn2 w3-xlarge w3-monospace w3-button w3-blue w3-bar w3-mobile" type="submit">Find!</button>
  </div>
</form>



</body>


 <br></br><br></br>
 <footer class="w3-panel  w3-display-bottomleft w3-text-green w3-text-gray w3-large">
             &copy; <?php echo '2022'; ?> Justin Burns
        </footer>
</html>