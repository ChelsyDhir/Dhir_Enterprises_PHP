<?php

if(isset($_GET['admin'])){

    if($_GET['admin'] && $_GET['admin'] == "customers") {
        header("location: ");
    } 
    elseif($_GET['admin'] && $_GET['admin'] == "orders") {
        header("Location: ");
    }
    elseif($_GET['admin'] && $_GET['admin'] == "stocks") {
        header("Location: ");
    }
}

if(isset($_GET['admin']) && $_GET['admin'] == "logout"){
    session_destroy();
    header("Location: index.php");
}

showHeader();
main_page();

function main_page(){
    ?>
    <div class="header">
    <h1>Dhir Enterprises</h1>    
    <!-- <img src="./images/login.jpg" class="center"  width="1200" height="400"> -->
    <h4><a href=<?= $_SERVER['PHP_SELF']."?admin=customers"?>> View Customers</a><h2>
    <h4><a href=<?= $_SERVER['PHP_SELF']."?admin=orders"?>>View Orders</a><h2>
    <h4><a href=<?= $_SERVER['PHP_SELF']."?admin=stocks"?>>View Items</a><h2>
    <h4><a href=<?= $_SERVER['PHP_SELF']."?admin=logout"?>>Logout</a><h2>
    <?php
    }
    
    function showHeader() { ?>
        <!DOCTYPE html>
      <html>
          <head>
              <meta charset="utf-8">
              <meta name="author" content="Chelsy, Chelsy">
              <link rel="stylesheet" href="css/styles_C.css">
    
          </head>
          <body>
              <section>
      </section>   
    <?php }



?>