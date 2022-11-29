<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


?>

<!DOCTYPE html>
<html>
    <head></head>
    <title>Login Form</title>
    <link rel ="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset = "utf-8">



    <body> 
        <header class ="w3-container w3-threequarter w3-display-top w3-red w3-border-brown">
            Welcome to the Log-In Page!
        </header>

        <p1>
            <h1>Login Form</h1>
        </p1>
        <form action = "" method = "post">
            <fieldset>
                <div class = "w3-container w3-margin w3-grey w3-card-4">
                    
                <div class = "">
                <p>
                    <input style = "" placeholder = "Username" name = "usr" required autofocus>
                </p>
                </div>

                <p>
                    <input type = "password" placeholder="Password" name = "pwd" required>
                </p>

                <div class = "">
                <p>
                    <button class = "w3-hover-green">Log In</button>
                </p>
                </div>

                </div>
            </fieldset>
        </form>
        <footer>&copy; Login Form Test{Justin Burns}</footer>
    </body>
    </html>