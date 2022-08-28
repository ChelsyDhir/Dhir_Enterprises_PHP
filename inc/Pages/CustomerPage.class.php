<?php

class CustomerPage {
    
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

    static function listCustomers(Array $customers) {
        ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>List of all Customers</h2>
        <table id="list">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>GST Number</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>
            <?php

                $i=0;
                foreach($customers as $customer)  {
        
                    if($i%2==1)
                        echo"<tbody class=\"evenRow\">";
                    else
                        echo"<tbody class=\"oddRow\">";
                   
                        echo "<tr>";
                    echo "<td>".$customer->getCustomerID()."</td>";
                    echo "<td>".$customer->getName()."</td>";                    
                    echo "<td>".$customer->getPhone()."</td>";
                    echo "<td>".$customer->getAddress()."</td>";
                    echo "<td>".$customer->getGSTNumber()."</td>";

                    $link = $_SERVER['PHP_SELF']."?action=edit&customer_id=".$customer->getCustomerID();
                    echo "<td><a href=\"".$link."\">&#9997</a></td>";

                    $link = $_SERVER['PHP_SELF']."?action=delete&customer_id=".$customer->getCustomerID();
                    echo "<td><a href=\"".$link."\">&#10060</a></td>";

                    echo "</tr>";
                    $i++;
                } 
        echo'</tbody>';
        echo '</table>
            </section>';
  
    }

    static function addCustomer()   { 
        ?>
        <section class="form1">
                <h3>Add a New Customer in the list</h3>
                <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                    <table>
                        <tr>
                            <td>Customer Name</td>
                            <td><input type="text" name="name" id="name" placeholder="Name"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" id="phone" placeholder="(XXX) XXX XXXX" required></td>
                        </tr>     
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" id="address" placeholder="Address"></td>
                        </tr>  
                        <tr>
                            <td>GST Number</td>
                            <td><input type="text" name="gst" id="gst" placeholder="GST Number"></td>
                        </tr>                                          
                        
                    </table>                                        
                    <input type="hidden" name="action" value="create">
                    <input type="submit" value="Add Customer">
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