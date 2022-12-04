<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');



// if(isset($_SESSION['usr'])){
//     $name = $_SESSION['usr'];
//     echo "Name: $name";
// }
// else{
//     header("Location: RForm.php");
// }



?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Home Page[W-H-E]</title>
<link rel ="stylesheet" href="createstyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/w3.css">
<meta charset = "utf-8">

<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "active w3-xxlarge" href="HPage.php">Home</a>
            <a class = "w3-xxlarge" href = "Create.php">Create</a>
    </div>

<body>



<header2>
<u class = "w3-monospace w3-display-middle">Home Of Thoughts</u>
</header>

    <div class = "w3-margin w3-grey w3-card-4">
        <a href = "Create.php" class = "w3-container w3-cursive w3-display-middle"><button class = "w3-hover-green">Create Your Thought[+]</button></a>
    </div>

</body>

</html>