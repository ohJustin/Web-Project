<?php
#error_reporting(E_ALL);
#ini_set('display_errors', '1');

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

function getValue($key){
    if(isset($_POST[$key])){
        $key = htmlspecialchars(trim($key));
        return $key;
    }
    else{
        $key = "key is not set [fix me later]";
        return $key;
    }
}

function sqlInsertUser(){
    $statement = "INSERT INTO user_table (username,hashedpass,university) VALUES (?, ?, ?);";
    return $statement;
}




    //Grab values submitted by registration page.
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["usr"])){
    try{
    $username = $_POST["usr"];
    $password = $_POST["pwd"];
    $college = $_POST['Colleges'];
    $pdo = getPDO();
    $lastidQuery = 'SELECT MAX(id) FROM user_table';
    //Hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);


    $pdoStatement = $pdo->prepare(sqlInsertUser());
    $pdoidStatement = $pdo->prepare($lastidQuery);
    $idresult = $pdoidStatement->execute;
    $idresult += 1;
    $params = [$username, $passwordHash, $college];
    $result = $pdoStatement->execute($params);
    
    
    if($result){
        header("Location: LForm.php");
        echo "<p>Your account has been created.</p>",
        "<p><a href='LForm.php'>Login</a></p></html>";
    }

    }
    catch(PDOException $e){
        #echo $e->getMessage();
        if(!$result){
            $_POST["usr"] = '';
            $_POST["pwd"] = '';
            echo "Registration error, please try again.<br></br><br></br>";
        }
    }
    finally{
        $pdo = null;
    }

    }
    }







?>

<!DOCTYPE html>
<html>
    <title>Registration Form</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="rstyle.css">
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <header class ="w3-container w3-threequarter w3-display-top w3-red w3-monospace w3-border-brown">
            Make your account!
    </header> -->

    <body> 
                <div class = "login-wrapper">
                <form action = "" method = "post" class = "form">
                    <!-- <img src="background.jpg" alt=""> -->
                <p1>
                    <h2>Registration Form</h2>
                </p1>
                    
                    <div class = "input-group">
                    <input type = "username" placeholder = "" name = "usr" required autofocus>
                    <label for="usr">Username</label>
                    </div>  

                    <br></br>
                    <div class = "input-group">
                    <input type = "password" placeholder="" name = "pwd" required>
                    <label for="pwd">Password</label>
                    </div>  

                    <br></br>
                    <div class = "input-group">
                    <input type = "email" placeholder="" name = "eml" required>
                    <label for="eml">Email</label>
                     
                    <br></br>
                    <select name="Colleges" id="college">
                        <div class = "college-wrapper">
                        <option value="disabled">Select your university</option>
                        <label for="college">University</label>
                        <option value="siue">Southern Illinois University Edwardsville</option>
                        <option value="siuc">Southern Illinois University Carbondale</option>
                        <option value="bu">Bradley University(Peoria)</option>
                        <option value="slu">Saint Louis University</option>
                    </div>  
                    </select>
                    <br></br>
                    </div>  

                    <div class = "input-group"> 
                    <button class = "submit-btn w3-hover-green" >Register</button>
                    <br></br>
                    <a href="LForm.php" class = "login-btn w3-hover-green w3-xlarge">Login</a>
                    </div>  

                    </div>
            
        </form>
        <footer>&copy;By Justin Burns [2022]</footer>
    </body>
    </html>