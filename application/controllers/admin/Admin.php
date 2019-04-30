<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends MY_Controller {
	
	
		public function __construct(){
			parent::__construct();
			$this->load->model('Model_admin','Amodel');
			$this->load->helper('cookie');
			$this->load->helper('string');
		}
			
		public function index(){
			if($this->session->userdata('admin_id') && $this->session->userdata('admin_user_name')){
				redirect(base_url().'admin/dashboard');
			}
			else if($this->input->cookie('a_user') && $this->input->cookie('a_pass')){
				$data['user_name']=$this->input->cookie('a_user');     
				$data['password']=$this->input->cookie('a_pass');
				$result = $this->Amodel->login($data);
				echo $result;
				redirect(base_url().'admin/dashboard');
			}
			else{
				$this->load->view('admin/login');
			}
		}
		
		public function login(){
			$this->index();
		}
		
		public function logout(){
			$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
			$this->session->sess_destroy();
			redirect(base_url().'admin');
		}
		
		public function login_auth(){
			$data['user_name']=$_POST['user_name']; 
			$data['password']=md5($_POST['password']);
			$data['remember_me']=$_POST['remember_me']; 
			$result = $this->Amodel->login($data);
			echo $result;
		}
		
		public function fpass(){
			$email=$_POST['email']; 
			$string = random_string('alnum', 16);
			$result = $this->Amodel->fpass($email,$string);
			echo $result;
		}
		public function verify($slug){
			
			echo $slug;
			die;
		}
		
		public function dashboard(){
			$this->Dmodel->checkLogin();
			$viewdata['title']="Trade Ins";
			$viewdata['counters']=$this->Amodel->get_counters();
			$viewdata['records']=$this->Amodel->get_current_trades();
			$viewdata['conditions']=$this->Dmodel->get_tbl_whr_arr('conditions',array('status'=>1));
			$this->LoadAdminView("admin/dashboard",$viewdata);
		}
		
		public function updatesettings(){
			$tbl="settings";
			$ID=1;
			$key="ID";
			$Title=$this->input->post('Title');
			$ATitle=$this->input->post('ATitle');
			$Email=$this->input->post('Email');
			$Phone=$this->input->post('Phone');
			$Address=$this->input->post('Address');
			$Website=$this->input->post('Website');
			$Timezone=$this->input->post('Timezone');
			$SMTP_Host=$this->input->post('SMTP_Host');
			$SMTP_Email=$this->input->post('SMTP_Email');
			$SMTP_Port=$this->input->post('SMTP_Port');
			$FacebookID=$this->input->post('FacebookID');
			$GoogleID=$this->input->post('GoogleID');
			if(!empty($this->input->post('SMTP_Pass'))){
				$SMTP_Pass=$this->input->post('SMTP_Pass');
				$data=array('Site_Title'=>$Title,'Admin_Title'=>$ATitle,'Email'=>$Email,'Phone'=>$Phone,'Address'=>$Address,'Website'=>$Website,'Timezone'=>$Timezone,'SMTP_Host'=>$SMTP_Host,'SMTP_Email'=>$SMTP_Email,'SMTP_Port'=>$SMTP_Port,'SMTP_Pass'=>$SMTP_Pass,'facebook_id'=>$FacebookID,'google_id'=>$GoogleID);
			}
			else {
				$data=array('Site_Title'=>$Title,'Admin_Title'=>$ATitle,'Email'=>$Email,'Phone'=>$Phone,'Address'=>$Address,'Website'=>$Website,'Timezone'=>$Timezone,'SMTP_Host'=>$SMTP_Host,'SMTP_Email'=>$SMTP_Email,'SMTP_Port'=>$SMTP_Port,'facebook_id'=>$FacebookID,'google_id'=>$GoogleID);
			}
			$result=$this->Dmodel->update_data($tbl,$ID,$data,$key);
		
			echo $result;
			die;
		}
		
		public function updateprofile(){
			$tbl="users";
			$ID=1;
			$key="ID";
			$user_name=$this->input->post('user_name');
			$user_email=$this->input->post('user_email');
			if(!empty($this->input->post('user_password'))){
				$user_password=$this->input->post('user_password');
				$data=array('user_name'=>$user_name,'email'=>$user_email,'password'=>$user_password);
			}
			else {
				$data=array('user_name'=>$user_name,'email'=>$user_email);
			}
			$result=$this->Dmodel->update_data($tbl,$ID,$data,$key);
		
			echo $result;
			die;
		}
		
	}