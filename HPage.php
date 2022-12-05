<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors', '1');

// $username = $_SESSION["username"];

#$selectallQuery = "SELECT * FROM blog_entries";

function sqlSelectEntriesQuery(){
    $statement = "SELECT * FROM blog_entries";
    return $statement;
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

if(isset($_SESSION["username"])){
    echo 'Username: <br></br> '.$_SESSION["username"] .' ';
    echo '<br></br>ID: ' . $_SESSION["userid"] . '<br></br>';
   echo ''.session_id();
}
elseif(!isset($_SESSION["username"])){
    header("Location: RForm.php");
}


$mypdo = getPDO();
$entries = sqlSelectEntriesQuery();
$entries = $mypdo->query($entries);
// IMPLEMENT LISTING(S) OF BLOG ENTRIES \ SEARCH ONE-TO-MANY DB TABLES ! 12/4/2022

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Home Page[W-H-E]</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel ="stylesheet" href="rstyle.css">
<link href="css/w3.css">
<meta charset = "utf-8">

<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "active w3-xxlarge" href="HPage.php">Home</a>
            <a class = "w3-xxlarge" href = "Create.php">Create</a>
    </div>

<body>
        
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Post has been added successfully
                </div>
            <?php }?>
        <?php } ?>

    <div class = "w3-margin w3-grey w3-card-4">
        <a href = "Create.php" class = "w3-container w3-cursive w3-display-middle"><button class = "w3-hover-green">Create Your Thought[+]</button></a>
    </div>

<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
    <div class = "row">
        <?php foreach($entries as $e){ ?>
                    <div class="w3-col-12 w3-col-lg-4 w3-d-flex w3-center">
                        <div class="w3-card w3-text-white w3-bg-dark w3-mt-5" style="width: 18rem;">
                            <div class="w3-card-body w3-blue">
                                <h5 class="w3-card-title"><?php echo $e['title'];?></h5>
                                <p class="w3-card-text"><?php echo substr($e['blogdata'], 0, 50);?>...</p>
                                <a href="view.php?blogid=<?php echo $e['blogid']?>" class="w3-btn w3-btn-light">Read More &rarr;</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
    </div>
</body>

</html>