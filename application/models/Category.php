<?php
/*
 * Declare the Category class, representing a row of the Categories table.
 *
 * Implements only the Read function, since we're just implementing a category
 * browser, plus a listAll function that returns a map from id to
 * categoryName for all categories in the database.
 *
 * This class uses CodeIgniter's 
 */
class Category extends CI_Model {
    public $id;
    public $categoryName;
    public $supplierID;
    public $description;
    
    public function __construct() {
        $this->load->database();
    }

    /*
     * Return a Category object read from the database for the given category.
     * Throws an exception if no such product exists in the database or if
     * there is more than one item with the same ID.
     */
    public function read($id) {
        $cat = new Category();
        $query = $this->db->get_where('Categories', array('id'=>$id));
        if ($query->num_rows() !== 1) {
            throw new Exception("Product ID $id not found in database");
        }

        // Copy all database column values into this, converting column names
        // to fields names by converting first char to lower case.
        //$row = $query->result();
        $row = $query->row();
        foreach ((array) $row as $field=>$value) {
            $fieldName = strtolower($field[0]) . substr($field, 1);
            $cat->$fieldName = $value;
        }
        return $cat;
    }


    /*
     * Return a map from productID to productName for all products
     */
    public function listAll() {
        $rows = $this->db->get('Categories')->result();  // Gets all rows
        $list = array();
        foreach ($rows as $row) {
            $list[$row->id] = $row->CategoryName;
        }
        return $list;
    }
};

