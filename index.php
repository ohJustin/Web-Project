<?php
session_start();
$year = date('Y');

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

#CHECK IF SESSION HAS BEEN CREATED ALONG WITH ITS KEYS AND VALUES(ID,USERNAME)
if(isset($_SESSION["username"])){
//     echo 'Username: <br></br> '.$_SESSION["username"] .' ';
//     echo '<br></br>ID: ' . $_SESSION["userid"] . '<br></br>';
//    echo ''.session_id();
}
elseif(!isset($_SESSION["username"])){
    header("Location: registration.php");
}


$mypdo = getPDO();
$entries = sqlSelectEntriesQuery();
$entries = $mypdo->query($entries);



// if($_SERVER['REQUEST_METHOD'] === 'POST'){

// }

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title>Home Page</title>



<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel ="stylesheet" href="rstyle.css">
<link href="w3.css">
<meta charset = "utf-8">

<!-- NAVIGATION BAR -->
<div class = "navbar w3-bar w3-border-black w3-cursive">
            <a class = "w3-xlarge" href="index.php">Home</a>
            <a class = "w3-xlarge" href = "create.php">Create</a>
            <a class = "active w3-xlarge " href = "profile.php">Profile</a>
            <a class = "w3-xlarge " href = "search.php">Connect</a>
            <a class = "w3-xlarge " href = "about.php">Q&A</a>
            <!-- <a href = "logout.php" class = "w3-btn w3-hover-green">Logout</a> -->
            <button onclick="window.location.href='logout.php';">
            Logout
            </button>
    </div>

<body>
        <!-- HEADER/TITLE BELOW NAVIGATION BAR -->
        <header style="text-shadow:10px 1px 0 #444" class = "w3-panel w3-jumbo w3-monospace w3-bottombar w3-topbar w3-border-black w3-green"> The Wall </header>
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Post has been added successfully
                </div>
            <?php }?>
        <?php } ?>

    
<!-- DISPLAYING OF ALL BLOG ENTRIES -->
<br></br>

<?php if(isset($_GET['subbed'])){?>
    <p class="error w3-center "><?php echo $_GET['subbed']; ?></p>
            <?php }?>
    <div class = "card-wrapper">
        <?php foreach($entries as $e){ ?>
                    <div class="w3-center ">
                        <div class=" w3-card w3-hover-shadow w3-text-white w3-bg-dark w3-mt-5 w3-large" style="width: 18rem;">
                            <div class="card-body w3-card-body w3-green">
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

<footer class="w3-panel w3-center w3-text-gray w3-small">
             &copy; <?php echo $year; ?> Justin Burns
        </footer>

</html>