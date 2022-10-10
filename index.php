<?php

if(isset($_GET['admin'])){

    if($_GET['admin'] && $_GET['admin'] == "customers") {
        header("location: Admin_Customers.php");
    } 
    elseif($_GET['admin'] && $_GET['admin'] == "orders") {
        header("Location: Admin_Orders.php");
    }
    elseif($_GET['admin'] && $_GET['admin'] == "stocks") {
        header("Location: ");
    }elseif($_GET['admin'] && $_GET['admin'] == "login") {
        header("Location: Admin_loginSignup.php");
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

    
    <div class="tab">
    <a href=<?= $_SERVER['PHP_SELF']."?admin=login"?> class="tablinks">Login</button>
    <a href=<?= $_SERVER['PHP_SELF']."?admin=customers"?> class="tablinks">Customers</button>
    <a href=<?= $_SERVER['PHP_SELF']."?admin=orders"?> class="tablinks">Orders</button>
    <a href=<?= $_SERVER['PHP_SELF']."?admin=stocks"?> class="tablinks">Items</button>
    <a href=<?= $_SERVER['PHP_SELF']."?admin=logout"?> class="tablinks">Logout</button>
    </div>

    <div class="header">
    <h1>Dhir Enterprises</h1>
    </div>  

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