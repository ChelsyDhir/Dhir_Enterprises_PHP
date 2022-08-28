
<!-- --create table item
create table Item (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name varchar(50)
) Engine=InnoDB; -->

<?php
    class Item {
        private $item_id;
        private $item_name;

        function setItemID($item_id) {
            $this->item_id = $item_id;
        }

        function setItemName($item_name) {
            $this->item_name = $item_name;
        }
        
        function getItemID() {
            return $this->item_id;
        }
        
        function getItemName() {
            return $this->item_name;
        }

    }

?>