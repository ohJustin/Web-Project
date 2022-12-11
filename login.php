<?php

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
            #User input data.
            $pwd = $_POST['pwd'];
            $usr = $_POST['usr'];
        
       
                                // Query strings for user information
            //hashedpass from user
            $tablepswQuery = "SELECT hashedpass FROM registration WHERE username = '$usr'";
            //id
            $student_idquery = "SELECT id FROM registration WHERE username = '$usr'";
            
         
            $matchedpasswordHashedResult = $pdo->query($tablepswQuery);
            echo "" .$matchedpasswordHashedResult->rowCount();

            $user_idresult = $pdo->query($student_idquery);
            $user_id = $user_idresult->fetch(PDO::FETCH_OBJ)->id;

            
            if($matchedpasswordHashedResult != false && $matchedpasswordHashedResult->rowCount() == 1){
                $matchedpasswordHashed = $matchedpasswordHashedResult->fetch(PDO::FETCH_OBJ)->hashedpass;
                if(password_verify($pwd,$matchedpasswordHashed)){
                    session_start();

                    // Current Session Keys/Values for the active user.
                    $_SESSION["username"] = $usr;
                    $_SESSION["userid"] = $user_id;
                    // Redirect user to Home Page ... Session/Login authenticated.
                    header("Location: index.php");
                    
                }
                // Bad Login
                else{
                    header("Location:login.php?logerr=Bad Login Information! Try Again");
                }
            }
            else{
                header("Location:login.php?logerr=Bad Login Information! Try Again");
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
        

        <div class = "login-wrapper">
        <form action = "" method = "post" class = "form">
        <p1>
            <h2>Login</h2>
        </p1>
        <?php if (isset($_GET['logerr'])) { ?>
        <p class="error w3-monospace w3-green w3-center"><?php echo $_GET['logerr']; ?></p>
        <br></br>
        <?php } ?>
           
            


                <div class = "input-group">
                    <input style = "" placeholder = "" name = "usr" required autofocus>
                    <label for="usr">User Name</label>
                </div>

                <div class = "input-group">
                    <input type = "password" placeholder="" name = "pwd" required>
                    <label for="pwd">Password</label>
                </div>  
                
                <div class = "input-group"> 
                    <button class = "submit-btn" onclick="location.href='registration.php'" type="button">No Account?</button>
                    
                    <button class = "submit-btn w3-hover-green">Log In</button>
                </div>  

                </div>
            

            
        </form>
        <footer>&copy; Login Form{Justin Burns}</footer>
    </body>
    </html>