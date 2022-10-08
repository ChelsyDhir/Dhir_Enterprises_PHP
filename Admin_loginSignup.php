<?php

require_once('inc/config.inc.php');
require_once('inc/Entity/Admin.class.php');
require_once('inc/Entity/Customer.class.php');
require_once('inc/Entity/Item.class.php');
require_once('inc/Entity/OrderDetails.class.php');
require_once('inc/Entity/Orders.class.php');
require_once('inc/Pages/CustomerPage.class.php');
require_once('inc/Pages/OrdersPage.class.php');
require_once('inc/Pages/SignInSignUpPage.class.php');
require_once('inc/Utilities/PDOService.class.php');
require_once('inc/Utilities/CustomerDAO.class.php');
require_once('inc/Utilities/ItemDAO.class.php');
require_once('inc/Utilities/OrderDetailsDAO.class.php');
require_once('inc/Utilities/OrdersDAO.class.php');
require_once('inc/Utilities/AdminDAO.class.php');

AdminDAO::initialize();
SignInSignUpPage::showHeader();
SignInSignUpPage::showLogin();

if(!empty($_POST)){
}


?>