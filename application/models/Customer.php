<?php
/*
 * Declare the Customer class, representing a row of the Order table.
 * Since the database was imported from elsewhere and has capital letters
 * at the start of each field name, an internal tweak is used to convert
 * column names to php lower-case-first format.
 *
 * Implements only the Read function, since we're just implementing an order 
 * broswer
 */
class Customer extends CI_Model {
    public $id;
    public $code;
    public $companyName;
    public $contactName;
    public $contactTitle;
    public $address;
    public $city;
    public $region;
    public $postalCode;
    public $country;
    public $phone;
    public $fax;


    public function __construct() {
        $this->load->database();
    }

    /*
     * Return a Customer object read from the database for the given customer.
     * @param int $id  Id of the customer to be returned.
     * @return a Customer instance
     * @throws a generic exception if no such product exists in the database.
     */
    public function read($id) {
        $cust = new Customer();
        $query = $this->db->get_where('Customers', array('id'=>$id));
        $rows = $query->result();
        //print_r($rows);
        $row = $rows[0];
        $cust->load($row);
        return $cust;
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

