<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function getPostback(){
    $postback = trim($_SERVER["PHP_SELF"]);
    $postback = htmlspecialchars($postback);
    
    return $postback;
}
function getDSN(){
    //$dsn = "mysql:host=localhost;dbname=test";
    $dsn = "mysql:host=localhost;port=8889;dbname=blogsite";
    return $dsn;
}

function getUsername(){
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
    $user = getUsername();
    $psw = getPassword();
    $pdo = new PDO($dsn,$user,$psw);
    return $pdo;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Grab values submitted by registration page.
    $username = $_POST["usr"];
    $password = $_POST["pwd"];
   

    //Hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    //$pdo = getPDO();
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mysqli = new mysqli("localhost","root","root","blogsite",8889);

    $sql = "INSERT INTO Users VALUES ('". $mysqli->real_escape_string($username) . "', '$passwordHash', 'testuniversity')";
    if($mysqli->query($sql)){
        echo "<p>Your account has been created.</p>",
             "<p><a href='LForm.php'>Login</a></p></html>";
      die;
    }
    elseif($mysqli->errno == 1062){
        echo "<p>The username <strong>$username</strong> already exists.",
         "Please choose another.</p>";
         die;
    }

    
    else{
        die("Error ($mysqli->errno) $mysqli->error");
    }

}


?>

<!DOCTYPE html>
<html>
    <head></head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset = "utf-8">


 <header class ="w3-container w3-threequarter  w3-red w3-border-brown">
            Registration Page!
        </header>
    <body> 
       

        
        <form action = "" method = "post">
            
            
                <br></br>
                <div class = "w3-container w3-margin w3-grey w3-card-4">
                 <legend>User Information:</legend>   
                    <p1>
                        <h1>Registration Form</h1>
                    <p>
                    <input style = "" placeholder = "Username" name = "usr" required autofocus>
                    <br></br>
                    <input type = "password" placeholder="Password" name = "pwd" required>
                    <br></br>
                    <input type = "email" placeholder="Email" name = "eml" required>
                    <br></br>
                    <select name="Colleges" id="college">
                        <option value="disabled">Select your university</option>
                        <option value="siue">Southern Illinois University Edwardsville</option>
                        <option value="siuc">Southern Illinois University Carbondale</option>
                        <option value="bu">Bradley University(Peoria)</option>
                        <option value="slu">Saint Louis University</option>
                      </select>
                    <br></br>
                    <button class = "w3-hover-green">Register</button>
              </p>
                </div>
            
            <!-- END OF CONTAINER -->
            
        </form>
        <footer>&copy;By Justin Burns [2022]</footer>
    </body>
    </html>