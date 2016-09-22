<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {


    public function index() {  // Default method for this controller
        browser();
    }

    public function browser()
    {
        $this->load->model('Order');
        $this->load->model('OrderDetails');
        $this->load->model('customer');
        $this->load->model('employee');
        $this->load->model('shipper');
        $this->load->model('product');
        $this->load->helper('url');
        
        
        $orderMap = $this->Order->listAll();
        $orderDetailsMap = $this->OrderDetails->listAll();
        $currentOrderId = $this->input->get('Order');
        if (!$currentOrderId) {
            $currentOrderId = key($orderMap);
        }
        $selectedOrder = $this->input->get('Order');
        if ($selectedOrder == Null) {
            $selectedOrder = 0;
        }
        
        $productMap = $this->product->listAll();
        $orderDetail = $this->OrderDetails->read($currentOrderId);
        $order = $this->Order->read($currentOrderId);
        $customer = $this->customer->read($order->customerID);
        $employee = $this->employee->read($order->employeeID);
        $shipper = $this->shipper->read($order->shipVia);
        $title = 'Northwind Orders';
        $data = array('orderMap' => $orderMap,
                      'order'    => $order,
                      'employee' => $employee,
                      'customer' => $customer,
                      'shipper'  => $shipper,
                      'products' => $productMap,
                      'orderDetailsMap'  => $orderDetailsMap,
                      'orderDetails'     => $orderDetail,
                      'title'       => 'Northwind Products');
        $data['content'] = $this->load->view(
                      'orders/orderBrowser',
                      $data, TRUE);
        $this->load->view('templates/master', $data);
    }
}
