<?php
session_start();

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


if(isset($_REQUEST['blogid'])){
    $pdo = getPDO();
    $blogid = $_REQUEST['blogid'];

    $blogentry = "SELECT * FROM blog_entries WHERE blogid = $blogid";
    $blogentry = $pdo->query($blogentry);

}


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Home Page[W-H-E]</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel ="stylesheet" href="vstyle.css">

<!-- <link href="css/w3.css"> -->
<meta charset = "utf-8">

<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "w3-xlarge" href="index.php">Home</a>
            <a class = "w3-xlarge" href = "create.php">Create</a>
            <a class = "w3-xlarge " href = "profile.php">Profile</a>
            <a class = "active w3-xlarge" href = "">Blog View</a>
    </div>
<body class = "">


    <div>
    <?php foreach($blogentry as $e){ ?>
        <div>
            <h1><?php echo $e['title'];?></h1>
        </div>
        <p class = "w3-large"><?php echo $e['blogdata'];?></p>
    <?php }?>
    </div>

</body>
</html>