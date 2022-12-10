<?php 
session_start();
$clientid = $_SESSION["userid"];
$searched_usr = $_SESSION["searched_usrname"];
$searchedusr_id = $_SESSION["searchedusr_id"];

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
// function followButton(){
//     $followPDO = getPDO();
//     $followquery = "SELECT * FROM follow_table WHERE user_id = '$clientid'";
//     $button = "<button name = 'sub-btn' class = 'w3-xlarge w3-monospace w3-button w3-blue w3-bar' type='submit'>Subscribe</button>";
//     // 
//     $status = 0;
//     // $button = "<button name = 'sub-btn' class = 'w3-xlarge w3-monospace w3-button w3-blue w3-bar' type='submit'>Subscribe?</button>";
//     $followquery = $followPDO->query($followquery);
//     while($row = $followquery->fetch_assoc()){
//         if($row["follower_id"] == $searchedusr_id){
//             $status = 1;
//             exit;
//         }
//     }
//     if($status == 0){
//         $button = "<button name = 'sub-btn' class = 'w3-xlarge w3-monospace w3-button w3-blue w3-bar' type='submit'>Subscribe</button>";
//     }
    
//     return $button;
// }


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $pdo = getPDO();
    
    $checkexist = "SELECT * FROM follow_table WHERE user_id = '$clientid' AND follower_id = '$searchedusr_id'";

    if(isset($_POST['unsub-btn'])){
                $deletequery = "DELETE FROM follow_table WHERE user_id = '$clientid' AND follower_id = '$searchedusr_id'";
                $deletequery = $pdo->query($deletequery);
                header("Location: searchedprofile.php?unsuberror=You've unsubscribed!");
            }
    
    if(isset($_POST['sub-btn'])){
        
       $searched_usr = $_POST['search'];
       $client_id = $_POST['userid'];
        #User input data.
        $querystring = "INSERT INTO follow_table(user_id,follower_id) VALUES($clientid,$searchedusr_id)";
        $checkexist = $pdo->query($checkexist);
        //IF NOT ALREADY SUBSCRIBED DONT INSERT SUBSCRIBE ENTRY
        if($checkexist->rowCount() > 0){
            //PUT YOUR WARNING
            header("Location: searchedprofile.php?unsub-error=Sorry! You've already subscribed.?");
        }
        //IF ALREADY SUBBED
        else{
        //INSERT SUBSCRIBE ENTRY
        $querystring = $pdo->query($querystring);
        // if($matchedpasswordHashedResult != false && $matchedpasswordHashedResult->rowCount() == 1){
        if($querystring->rowCount() == 1){
          
          
          header("Location: index.php?subbed=You've subscribed! Check your follower wall to see changes.");      
        }
        }
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
            <a class = "active w3-xlarge " href = "profile.php">Profile</a>
            <a class = "w3-xlarge " href = "search.php">Connect</a>
            <a class = "w3-xlarge " href = "about.php">Q&A</a>
    </div>
<!--  -->
</head>
<meta charset = "utf-8">

<title class = " w3-padding-84 ">Your Wall</title>
<body>  

<form method = "POST">
  <div class="container">
      <div class = "profile-box">
        <img src="images/menu.png" class = "menu-icon">
        <img src="images/setting.png" class = "setting-icon">
        <img src="images/user.png" class = "profile-pic">
        <h3><?php echo ''. $_SESSION['searched_usrname'] ?></h3>
        <p>Blogger & University Student, Illinois</p>
      <div class = "social-media">
      <a href=''><img src="images/instagram.png"/></a>
      <a class = "" href=''><img src="images/twitter.png"/></a>
      

      <button name = 'sub-btn' class = 'w3-xlarge w3-monospace w3-button w3-blue w3-bar w3-bottom-bar' type='submit'>Subscribe</button>
      <?php if (isset($_GET['unsub-error'])) { ?>
        <p class="error"><?php echo $_GET['unsub-error']; ?></p>
            <button name = 'unsub-btn' class = 'w3-xlarge w3-monospace w3-button w3-blue w3-bar  w3-border-black' type='submit'>Want to unsubscribe?</button>
        <?php } ?>
      
      <br>

      </div>
      
      
      </div>
      
</div>
</form>
</body>


 <br></br><br></br>
 <footer class="w3-panel  w3-display-bottomleft w3-text-green w3-text-gray w3-large">
             &copy; <?php echo '2022'; ?> Justin Burns
        </footer>
</html>