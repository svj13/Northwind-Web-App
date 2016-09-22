<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    
    public function browser() 
    {
        $this->load->helper('url');
        $this->load->library('session');
        $data = array();
        $data['content'] = $this->load->view(
                      'login/loginBrowser',
                      $data, TRUE);
        $this->load->view('templates/master', $data);
        
    }
    
 /*
 * Displays the default login page. When the correct credentials have been 
 * entered, it will start the session as the user. If the incorrect
 * credentials have been used, the user will be notified to try again.
 */
    public function displayLogin() {
        $this->load->helper('url');
        $this->load->library('session');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        //Ensures username and password are correct
        if ($username == 'user' && $password =='northwind') {
            $this->session->set_userdata('loggedIn', 'true');
        }
        $data = array('title' => 'login');
        $data['content'] = $this->load->view(
                      'login/loginBrowser',
                      $data, TRUE);
        $this->load->view('templates/master', $data);
        
    }
    
 /*
 * Will log the user out and end the current session
 */
    public function logout() {
        $this->load->helper('url');
        $this->load->library('session');
        $this->session->set_userdata('loggedIn', 'false');
        $data = array('title' => 'login');
        $data['content'] = $this->load->view(
                      'login/loginBrowser',
                      $data, TRUE);
        $this->load->view('templates/master', $data);
    }
    
    
}