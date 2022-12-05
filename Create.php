<?php
error_reporting(E_ALL);
session_start();
ini_set('display_errors', '1');



if(isset($_SESSION["username"])){
    #$name = $_SESSION['usr'];
    #$university = getValue($_SESSION['university']);
    echo '' .$_SESSION["userid"];
    echo '' .$_SESSION["username"];
}
else{
    header("Location: RForm.php");
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
            // (blogdata,university, title, type)
        $title = getValue('title');
        $blog = getValue('blogcontent');
        $type = getValue('type');
        $university = 'NA';
        #ADJUST paramsBlog is error occurs? <===> Remember to sanitize these values.
        #$idBlog = $pdo->lastInsertId();
        $paramsBlog = [$_SESSION["userid"],$blog,$university, $title, $type];
        
        $pdoStatement = $pdo->prepare(sqlInsertBlogQuery());
        $pdoStatement->execute($paramsBlog);
        $idBlog = $pdo->lastInsertId();

        header("Location: Hpage.php?info=added");
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

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "active w3-xxlarge" href="HPage.php">Home</a>
            <a class = "w3-xxlarge" href = "Create.php">Create</a>
    </div>
<header class = "w3-jumbo w3-monospace w3-bottombar w3-topbar w3-border-black ">Publish Your Thought &#128540;</header>
<title>The Wall</title>
</head>


<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="css/w3.css">
<link rel ="stylesheet" href="createstyle.css">

<meta charset = "utf-8">

<body>
    <body>
<div class = "w3-container w3-display-middle">
    <form action = "" method = "POST">   
        <br></br><br></br>
        <input class = "w3-monospace" type="text" placeholder="Thought Title..." class = "" name = "title"><br></br>
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