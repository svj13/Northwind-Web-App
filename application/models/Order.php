<?php
/*
 * Declare the Order class, representing a row of the orders table.
 * Since the database was imported from elsewhere and has capital letters
 * at the start of each field name, an internal tweak is used to convert
 * column names to php lower-case-first format.
 *
 * Implements only the Read function, since we're just implementing an order
 * browser, plus a listAll function that returns a map from id to
 * the order id for all orders in the database.
 */
class Order extends CI_Model {
    public $id;
    public $customerID;
    public $employeeID;
    public $orderDate;
    public $requiredDate;
    public $shippedDate;
    public $shipVia;
    public $freight;


    public function __construct() {
        $this->load->database();
    }

    /*
     * Return an Order object read from the database for the given order.
     * @param int $id  Id of the product to be returned.
     * @return an Order instance
     * @throws a generic exception if no such order exists in the database.
     */
    public function read($id) {
        $order = new Order();
        $query = $this->db->get_where('Orders', array('id'=>$id));
        if ($query->num_rows() !== 1) {
            throw new Exception("Order ID $id not found in database");
        }

        $rows = $query->result();
        $row = $rows[0];
        $order->load($row);
        return $order;
    }


    /** Return an associative array id=>id for all orders in the
     *  database.
     * @param int $orderId the ID in the categories table; only orders in
     * this category are returned if given. Otherwise all orders are returned.
     * @return associative array mapping id to order
     */
    public function listAll($orderId=NULL) {
        $this->db->select('id, id as id');
        if ($orderId) {
            $this->db->where(array('id' => $orderId));
        }
        $rows = $this->db->get('Orders')->result();
        $list = array();
        foreach ($rows as $row) {
            $list[$row->id] = $row->id;
        }
        return $list;
    }


    /** Return an array of all products in the database.
     * @return an array of Product objects containing all products, ordered
     * by name.
     */
    public function getAllOrders() {
        $this->db->order_by('id');
        $rows = $this->db->get('Orders')->result();
        $list = array();
        foreach ($rows as $row) {
            $order = new Order();
            $order->load($row);
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

