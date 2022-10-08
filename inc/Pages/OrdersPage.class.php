<?php

class OrdersPage {
    
    static function showHeader() { ?>
        <!DOCTYPE html>
      <html>
          <head>
              <title>Dhir Enterprises</title>
              <meta charset="utf-8">
              <meta name="author" content="Chelsy, Chelsy">
              <link rel="stylesheet" href="css/styles_C.css">
          </head>
          <body>
              <section>
                  <!-- <h1>Welcome to Dhir Enterprises</h1>  -->
      </section>   
  <?php }

    static function showFooter()   { ?>        
        </div>
            </body>
        </html>
    <?php }

    static function listOrdersDetails(Array $orders) {
        ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <!-- <h2>Listing details of a perticular Order</h2> -->
        <table id="list">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Item</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Number of Items</th>  
                    <th>Total Cost</th>
                    <th>Edit/Delete</th>
            </thead>
            <?php

                $i=0;
                foreach($orders as $order)  {
        
                    if($i%2==1)
                        echo"<tbody class=\"evenRow\">";
                    else
                        echo"<tbody class=\"oddRow\">";
                   
                        echo "<tr>";
                    echo "<td>".$order->getOrderID()."</td>";
                    echo "<td>".$order->customer_id."</td>";                    
                    echo "<td>".$order->name."</td>";
                    echo "<td>".$order->item_name."</td>";
                    echo "<td>".$order->size."</td>";
                    echo "<td>$".$order->price."</td>";
                    echo "<td>".$order->quantity."</td>";
                    $totalPrice = number_format($order->price * $order->quantity, 2);
                    echo "<td>$".$totalPrice."</td>";
                    $EditLink = $_SERVER['PHP_SELF']."?action=edit&order_id=".$order->getOrderID();
                    $DeleteLink = $_SERVER['PHP_SELF']."?action=delete&order_id=".$order->getOrderID();

                    echo "<td><a href=\"".$EditLink."\">&#9997</a> <a href=\"".$DeleteLink."\">&#10060</a></td>";

                    // echo "<td><a href=\"".$DeleteLink."\">&#10060</a></td>";

                    echo "</tr>";
                    $i++;
                } 
        echo'</tbody>';
        echo '</table>
            </section>';
  
    }

    static function listAllOrders($CustomerOrders) {?>
        <!-- Start the page's show data form -->
        <section class="topmain">
        <h2>List all Orders</h2>
        <table id="list">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Details</th>
            </thead>
            <?php

            $i=0;
            foreach($CustomerOrders as $order)  {

                if($i%2==1)
                    echo"<tbody class=\"evenRow\">";
                else
                    echo"<tbody class=\"oddRow\">";
            
                    echo "<tr>";
                echo "<td>".$order->getOrderID()."</td>";
                echo "<td>".$order->customer_id."</td>";                    
                echo "<td>".$order->name."</td>";
                echo "<td>".$order->getdate()."</td>";
                $detailLink = $_SERVER['PHP_SELF']."?action=details&order_id=".$order->getOrderID();

                echo "<td><a href=\"".$detailLink."\">&#9997</a></td>";

                echo "</tr>";
                $i++;
            } 
            echo'</tbody>';
            echo '</table>
            </section>';
        }

    static function addOrder(array $customers, array $items)   { 
        ?>
        <section class="form1">
                <h3>Add a new Order to the list</h3>
                <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                    <table>
                    <tr>
                        <td>Customer Name</td> 
                        <td> <select name="name"> <?php 
                        foreach($customers as $customer){?>
                        <option value=<?= $customer->getCustomerID()?>><?= $customer->getName()?></option>    
                        <?php  } ?>
                           </select>
                        </td>
                    </tr>
                    <tr>
                        <td>item</td>
                        <td> <select name="item"> <?php 
                        foreach($items as $item){?>
                        <option value=<?= $item->getItemID()?>><?= $item->getItemName()?></option>    
                        <?php  } ?>
                           </select>
                        </td>                    
                    </tr> 
                    <tr>
                        <td>Size</td>
                        <td><input type="text" name="size" id="size" placeholder="Size of the Item" required></td>
                    </tr>    
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" id="price" placeholder="Price" required></td>
                    </tr>  
                    <tr>
                        <td>Number of Items</td>
                        <td><input type="text" name="qty" id="qty" placeholder="Number of items" required></td>
                    </tr>                                          
                    
                    </table>                                        
                    <input type="hidden" name="action" value="create">
                    <input type="submit" value="Add Order">
                </form>
            </section>

    <?php }


static function editCustomer(Customer $CustomerToEdit)   { 
    ?>
    <section class="form1">
            <h3>Editing customer with ID: <?= $CustomerToEdit->getCustomerID()?></h3>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                <table>
                    <tr>
                        <td>Customer Name</td>
                        <td><input type="text" name="name" id="name" placeholder="Name" value= <?= $CustomerToEdit->getName()?> ></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="phone" id="phone" placeholder="(XXX) XXX XXXX" required value= <?= $CustomerToEdit->getPhone()?> ></td>
                    </tr>     
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" id="address" placeholder="Address" value= <?= $CustomerToEdit->getAddress()?> ></td>
                    </tr>  
                    <tr>
                        <td>GST Number</td>
                        <td><input type="text" name="gst" id="gst" placeholder="GST Number" value= <?= $CustomerToEdit->getGstNumber()?> ></td>
                    </tr>                                          
                    
                </table>   
                <input type="hidden" name="CustID" value=<?= $CustomerToEdit->getCustomerID()?>>                                     
                <input type="hidden" name="action" value="edit">
                <input type="submit" value="Submit">
            </form>
        </section>

<?php }
}


?>