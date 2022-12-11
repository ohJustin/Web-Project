<?php
error_reporting(E_ALL);
session_start();
ini_set('display_errors', '1');



if(isset($_SESSION["username"])){
    #$name = $_SESSION['usr'];
    #$university = getValue($_SESSION['university']);
    // echo '' .$_SESSION["userid"];
    // echo '' .$_SESSION["username"];
}
else{
    header("Location: registration.php");
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

function sqlInsertBlogQuery(){
    $statement = "INSERT INTO blog_entries (userid, blogdata,university, title, type) VALUES(?, ?, ?, ?, ?);";
    return $statement;
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

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        $pdo = getPDO();

        #Verifies whether the title blog and type have been entered/selected.
        if(isset($_POST['title'], $_POST['blogcontent'], $_POST['type'])){
            
        #Query data
        $title = getValue('title');
        $blog = getValue('blogcontent');
        $type = getValue('type');
        $university = 'NA';

        #ADJUST paramsBlog is error occurs? <===> Remember to sanitize these values.
        $paramsBlog = [$_SESSION["userid"],$blog,$university, $title, $type];
        
        $pdoStatement = $pdo->prepare(sqlInsertBlogQuery());
        $pdoStatement->execute($paramsBlog);
        $idBlog = $pdo->lastInsertId();

        header("Location: index.php?info=added");
        echo " '<br>Inserted blog record with id ' . $idBlog</br>";
    }

}

    catch (PDOException $e){
        echo $e->getMessage();
    }
    finally{
        $pdo = null;
    }

}
?>
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="w3.css">
<link rel ="stylesheet" href="createstyle.css">


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- NAVIGATION BAR -->
<div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "w3-xlarge" href="index.php">Home</a>
            <a class = "active w3-xlarge" href = "create.php">Create</a>
            <a class = "w3-xlarge " href = "search.php">Connect</a>
            <a class = "w3-xlarge " href = "about.php">Q&A</a>


    </div>
    <div class="dropdown">
    <a class="dropbtn w3-display-topmiddle w3-center">Options</a>
    <div class="dropdown-content w3-display-topmiddle">
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
</div>
</div>

<header style="text-shadow:10px 1px 0 #444" class = " w3-jumbo w3-monospace w3-text-green"> Contribute to the wall </header>
<title>The Wall</title>
</head>




<meta charset = "utf-8">

<body>
    <body>
<div class = "w3-container w3-display-middle">
    <form action = "" method = "POST">   
        <br></br><br></br>
        <div class = "w3-center">
        <input class = "w3-monospace w3-center" type="text" placeholder="Thought Title\Usrname" class = "" name = "title"><br></br>
</div>
<div class = "w3-center">
        <textarea name = "blogcontent" placeholder="What are you thinking?...."></textarea><br></br>
        <select class = "w3-monospace" name="type" id="type">
            <option value="disabled">Select your thought type</option>
            <option value="advice">Advice</option>
            <option value="confession">Confession</option>
            <option value="achievement">Achievement</option>
          </select>
        <button class = "w3-hover-green">Share</button>
</div>

        <!-- <div>
            <header>Your fellow</header>
        </div> -->
    </form>

    <div class="entries col-4 d-flex justify-content-center align-items-center">




</div>

</body>
</html>