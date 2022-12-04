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
    <head></head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <input type = "username" placeholder = "Username" name = "usr" required autofocus>
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

                    <button class = "w3-hover-green" >Register</button>
              </p>
                </div>
            
            <!-- END OF CONTAINER -->
            
        </form>
        <footer>&copy;By Justin Burns [2022]</footer>
    </body>
    </html>