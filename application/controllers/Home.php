<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Model_form','m_form');
			$this->load->library('user_agent');
			$this->load->library('cart'); 
		}
		
		public function index(){
			$viewdata['home_blogs']=$this->m_form->get_home_blogs();
			$this->LoadView('home',$viewdata);
		}
		
	}

