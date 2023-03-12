<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	function __construct() {
    parent::__construct();


	//Common Datas

	$data['order_count'] = $this->CommonModel->count_orders();

	$data['product_count'] = $this->CommonModel->count_products();
	

	//Pass data to all views

	$this->load->vars($data);


    }
	

	

}
