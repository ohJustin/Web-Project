<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- NAVIGATION BAR AND HEADER -->
    <div class = "navbar w3-bar w3-border-black w3-monospace w3-jumbo">
            <a class = "active" href="HPage.html">Home</a>
            <a href = "Create.html">Create</a>
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
        

    <form action = "" method = "POST">
        <div class = "w3-container w3-display-middle">
        <input class = "w3-monospace" type="text" placeholder="Thought Title..." class = "" name = "title"><br></br>
        <textarea name = "blogcontent" placeholder="What are you thinking?...."></textarea><br></br>
        <select class = "w3-monospace" name="Type" id="type">
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

</body>
</html>