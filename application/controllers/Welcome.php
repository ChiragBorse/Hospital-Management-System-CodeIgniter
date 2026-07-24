<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Load database
        $this->method_call =& get_instance();
    }
    
    

	public function index()
	{
		$this->load->view('index');
	}

    public function show_doctor()
	{
		$this->load->view('doctor');
	}
}
