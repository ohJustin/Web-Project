<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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