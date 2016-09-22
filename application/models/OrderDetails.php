<?php
/*
 * Declare the OrderDetails class, representing a row of the order details table.
 * Since the database was imported from elsewhere and has capital letters
 * at the start of each field name, an internal tweak is used to convert
 * column names to php lower-case-first format.
 *
 * Implements only the Read function, since we're just implementing a product
 * browser, plus a listAll function that returns a map from orderId to
 * orderDetails for all orders in the database.
 */
class OrderDetails extends CI_Model {
    public $id;
    public $orderID;
    public $productID;
    public $quantity;
    public $discount;


    public function __construct() {
        $this->load->database();
    }

    /*
     * Return a OrderDetails object read from the database for the given order.
     * @param int $id  Id of the OrderDetail to be returned.
     * @return an OrderDetails instance
     * @throws a generic exception if no such product exists in the database.
     */
    public function read($id) {
        $orderDets = new OrderDetails();
        $query = $this->db->get_where('OrderDetails', array('orderid'=>$id));
        $rows = $query->result();
        //print_r($rows);
        $row = $rows[0];
        $orderDets->load($row);
        return $orderDets;
    }


    /** Return an associative array id=>productName for all products in the
     *  database, or all matching a given categoryId (if given).
     * @param int $catId the ID in the categories table; only products in
     * this category are returned if given. Otherwise all products are returned.
     * @return associative array mapping productId to product
     */
    public function listAll($orderDetsId=NULL) {
        $this->db->select('id, orderId as orderID');
        if ($orderDetsId) {
            $this->db->where(array('orderId' => $orderDetsId));
        }
        $rows = $this->db->get('OrderDetails')->result();
        $list = array();
        foreach ($rows as $row) {
            $list[$row->id] = $row->orderID;
        }
        return $list;
    }


    /** Return an array of all products in the database.
     * @return an array of Product objects containing all products, ordered
     * by name.
     */
    public function getAllOrderDetails($orderID) {
        $this->db->select('OrderDetails.id, OrderDetails.ProductID,
                OrderDetails.Quantity, OrderDetails.Discount')
        ->from('OrderDetails')
        ->where('OrderDetails.orderId =' . $orderID);
        
 
        
        $rows = $this->db->get()->result();

        $list = array();
        foreach ($rows as $row) {
            $orderDets = new OrderDetails();
            $orderDets->load($row);
            $list[] = $row;
        }
        return $list;
    }


    // Given a row from the database, copy all database column values
    // into 'this', converting column names to fields names by converting
    // first char to lower case.
    private function load($row) {
        foreach ((array) $row as $field => $value) {
            $fieldName = strtolower($field[0]) . substr($field, 1);
            $this->$fieldName = $value;
        }
    }


    // Check that the result from a DB query was OK
    private static function checkResult($result) {
        global $DB;
        if (!$result) {
            die("DB error ({$DB->error})");
        }
    }
};

