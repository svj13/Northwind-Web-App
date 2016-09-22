<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
    
    public function browser() 
    {
        $this->load->helper('url');
        $data = array();
        $data['content'] = $this->load->view(
                      'about/aboutBrowser',
                      $data, TRUE);
        $this->load->view('templates/master', $data);
        
    }
    
    
}

