<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {


    public function index() {  // Default method for this controller
        browser();
    }

    public function browser()
    {
        $this->load->model('category');
        $this->load->model('product');
        $this->load->model('supplier');
        $this->load->helper('url');
        $categoryMap = $this->category->listAll();
        $currentCategoryId = $this->input->get('Category');
        if (!$currentCategoryId) {
            $currentCategoryId = key($categoryMap);
        }
        $productMap = $this->product->listAll($currentCategoryId);
        $currentProductId = $this->input->get('Product');
        if (!$currentProductId || !isset($productMap[$currentProductId])) {
            $currentProductId = key($productMap);
        }
        $product = $this->product->read($currentProductId);
        $supplier = $this->supplier->read($product->supplierID);
        $category = $this->category->read($product->categoryID);
        //$productName = $this->productName-.read($product->productName);
        $title = 'Northwind Products';
        $data = array('categoryMap' => $categoryMap,
                      'productMap'  => $productMap,
                      'category' => $category,
                      'product'     => $product,
                      'supplier' => $supplier,
                      'title'       => 'Northwind Products');
        $data['content'] = $this->load->view(
                      'products/productBrowser',
                      $data, TRUE);
        $this->load->view('templates/master', $data);
    }
}
