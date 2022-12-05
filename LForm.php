<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

    $year = date('Y');
    $passwordStatus = '';
    $pwdEntered = '';
    $pwdChecked = '';
    $pwdHashed = '';

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
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        $pdo = getPDO();
        if(isset($_POST['usr'],$_POST['pwd'])){
            #hash entered password.
            $pwd = $_POST['pwd'];
            $usr = $_POST['usr'];
       
            $tablepswQuery = "SELECT hashedpass FROM user_table WHERE username = '$usr'";
            $student_idquery = "SELECT id FROM user_table WHERE username = '$usr'";
         
            $matchedpasswordHashedResult = $pdo->query($tablepswQuery);
            echo "" .$matchedpasswordHashedResult->rowCount();

            $user_id = $pdo->query($student_idquery);
            #$user_id = $user_id->fetch(PDO::FETCH_OBJ)->id;

            if($matchedpasswordHashedResult != false && $matchedpasswordHashedResult->rowCount() == 1){
                $matchedpasswordHashed = $matchedpasswordHashedResult->fetch(PDO::FETCH_OBJ)->hashedpass;
                if(password_verify($pwd,$matchedpasswordHashed)){
                    $_SESSION["username"] = $usr;
                    $_SESSION["userid"] = $user_id;
                    
                    header("Location: HPage.php");
                }

                else{
                    echo "<script>alert('Bad Login Information Try Again!');</script>";
                }
            }
            else{
                echo "<script>alert('Bad Login Information Try Again!');</script>";
            }
        }
    }

    catch (PDOException $e){
        echo $e->getMessage() . '<br></br>';
    }
    finally{
        $pdo = null;
    }
}
?>

<!DOCTYPE html>
<html>
    <head></head>
    <title>Login</title>
    <link rel ="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <meta charset = "utf-8">



    <body> 
        
        <!-- <header class ="w3-container w3-threequarter w3-display-top w3-red w3-monospace w3-border-brown">
            Welcome to the Login Page!
        </header> -->
        <div class = "login-wrapper">
        <form action = "" method = "post" class = "form">
        <p1>
            <h2>Login</h2>
        </p1>
        
           
            <!-- w3-container w3-margin w3-grey w3-card-4 -->
                
                <div class = "input-group">
                    <input style = "" placeholder = "" name = "usr" required autofocus>
                    <label for="usr">User Name</label>
                </div>

                <div class = "input-group">
                    <input type = "password" placeholder="" name = "pwd" required>
                    <label for="pwd">Password</label>
                </div>  
                
                <div class = "input-group"> 
                    <button class = "submit-btn" onclick="location.href='RForm.php'" type="button">No Account?</button>
                    
                    <button class = "submit-btn w3-hover-green">Log In</button>
                </div>  

                </div>
            

            
        </form>
        <footer>&copy; Login Form{Justin Burns}</footer>
    </body>
    </html>