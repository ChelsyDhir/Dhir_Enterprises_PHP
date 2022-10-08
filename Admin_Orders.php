<?php
session_start();
require_once('inc/config.inc.php');
require_once('inc/Entity/Customer.class.php');
require_once('inc/Entity/Item.class.php');
require_once('inc/Entity/OrderDetails.class.php');
require_once('inc/Entity/Orders.class.php');
require_once('inc/Pages/CustomerPage.class.php');
require_once('inc/Pages/OrdersPage.class.php');
require_once('inc/Utilities/PDOService.class.php');
require_once('inc/Utilities/CustomerDAO.class.php');
require_once('inc/Utilities/ItemDAO.class.php');
require_once('inc/Utilities/OrderDetailsDAO.class.php');
require_once('inc/Utilities/OrdersDAO.class.php');

OrdersPage::showHeader();

CustomerDAO::initialize();
ItemDAO::initialize();
OrdersDAO::initialize();
OrderDetailsDAO::initialize();


if(isset($_GET['order'])) {
    $current_order_id = OrdersDAO::createOrder();
}

if(isset($_GET['action']) && $_GET['action'] == "delete") {
    OrdersDAO::deleteOrder($_GET['order_id']);
}
if(!empty($_POST)){
    if(isset($_POST['action']) && $_POST['action'] == "create") {
        $newOrder = new OrderDetails();
        $newOrder->setOrderID(OrdersDAO::createOrder());
        $newOrder->setCustomerID($_POST['name']);
        $newOrder->setItemID($_POST['item']);
        $newOrder->setSize($_POST['size']);
        $newOrder->setPrice($_POST['price']);
        $newOrder->setQuantity($_POST['qty']);

        OrderDetailsDAO::createOrderDetails($newOrder);
    }
}

OrdersPage::addOrder(CustomerDAO::getCustomers(), ItemDAO::getItems());
OrdersPage::listAllOrders(OrdersDAO::getOrders());


if(isset($_GET['action']) && $_GET['action'] == 'details'){

    OrdersPage::listOrdersDetails(OrdersDAO::getOrdersDetails());

}



// var_dump(OrdersDAO::getOrdersDetails());

?>