<?php
/*
 * Declare the Supplier class, representing a row of the orders table.
 * Since the database was imported from elsewhere and has capital letters
 * at the start of each field name, an internal tweak is used to convert
 * column names to php lower-case-first format.
 *
 * Implements only the Read function, since we're just implementing an Order
 * browser
 */
class Supplier extends CI_Model {
    public $id;
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
     * Return a Supplier object read from the database for the given order.
     * @param int $id  Id of the supplier to be returned.
     * @return a Supplier instance
     * @throws a generic exception if no such product exists in the database.
     */
    public function read($id) {
        $supp = new Supplier();
        $query = $this->db->get_where('Suppliers', array('id'=>$id));
        $rows = $query->result();
        //print_r($rows);
        $row = $rows[0];
        $supp->load($row);
        return $supp;
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
