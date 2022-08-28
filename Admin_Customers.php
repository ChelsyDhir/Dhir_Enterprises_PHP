<?php

require_once('inc/config.inc.php');
require_once('inc/Entity/Customer.class.php');
require_once('inc/Pages/CustomerPage.class.php');
require_once('inc/Utilities/PDOService.class.php');
require_once('inc/Utilities/CustomerDAO.class.php');

CustomerPage::showHeader();
//If it shows--- Call to a member function query() on null--that means DAO is not initialized
    CustomerDAO::initialize();

if(!empty($_POST)){
    if(isset($_POST['action']) && $_POST['action'] == "create") {
        
        $newCustomer = new Customer();
        $newCustomer->setName($_POST['name']);
        $newCustomer->setAddress($_POST['address']);
        $newCustomer->setGstNumber($_POST['gst']);
        $newCustomer->setPhone($_POST['phone']);

        CustomerDAO::createCustomer($newCustomer);
    }

    if(isset($_POST['action']) && $_POST['action'] == "edit") {
        //edit always include the $_POST['ID'] to be able to access
        //the update record in update function of respective DAO
        $updateCustomer = new Customer();
        $updateCustomer->setCustomerID($_POST['CustID']);
        $updateCustomer->setName($_POST['name']);
        $updateCustomer->setAddress($_POST['address']);
        $updateCustomer->setGstNumber($_POST['gst']);
        $updateCustomer->setPhone($_POST['phone']);

        CustomerDAO::updateCustomer($updateCustomer);
    }
    
}

if(isset($_GET['action']) && $_GET['action'] == "delete") {
    CustomerDAO::deleteCustomer($_GET['customer_id']);
}

if(isset($_GET['action']) && $_GET['action']=="edit") {
    CustomerPage::editCustomer(CustomerDAO::getCustomer($_GET['customer_id']));
}else
CustomerPage::addCustomer();
CustomerPage::listCustomers(CustomerDAO::getCustomers());



CustomerPage::showFooter();
?>