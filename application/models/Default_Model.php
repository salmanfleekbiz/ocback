<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Default_Model extends CI_Model {

		function __construct() {
			parent::__construct();
			$set= $this->db->get('settings')->row();
			define('Site_Title',$set->Site_Title);
			define('Admin_Title',$set->Admin_Title);
			define('Site_Email',$set->Email);
			define('Address',$set->Address);
			define('Phone',$set->Phone);
			define('Website',$set->Website);
			define('FacebookID',$set->facebook_id);
			define('GoogleID',$set->google_id);
			define('SMTP_Host',$set->SMTP_Host);
			define('SMTP_Email',$set->SMTP_Email);
			define('SMTP_Pass',$set->SMTP_Pass);
			define('SMTP_Port',$set->SMTP_Port);
			define('Timezone',$set->Timezone);
			date_default_timezone_set($set->Timezone);
			define('Date_Now',date('Y-m-d'));
			define('Time_Now',date('H:i:s'));
			define('DateTime_Now',date('Y-m-d H:i:s'));
		}
		
		function checkLogin(){
			if(!$this->session->userdata('admin_id') || !$this->session->userdata('admin_user_name')){
				redirect(base_url().'admin/');
			}
		}
		
		function get_tbl($tbl){
			$query = $this->db->get($tbl);
			return $query->result_array();
		}
		
		function get_tbl_whr($tbl,$id){	
			$query = $this->db->get_where($tbl, array('id' => $id));
			return $query->result_array();
		}
		
		function get_tbl_whr_arr($tbl,$arr){	
			$query = $this->db->get_where($tbl, $arr);
			return $query->result_array();
		}
		
		function get_tbl_whr_in($tbl,$key,$arr){	
			$this->db->where_in($key, $arr);
			$query = $this->db->get($tbl);
			return $query->result_array();
		}
		
		function insertdata($tbl,$data){
			$query = $this->db->insert($tbl,$data);
			return $query;
		}
		
		function update_data($tbl,$id,$data,$key){	
			$this->db->where($key, $id);
			$query = $this->db->update($tbl,$data);
		
			return $query;
		}
		
		function toggle_status($tbl,$id){		
			$query =$this->db->query('UPDATE '.$tbl.' SET status = IF(status=1, 0, 1) WHERE id='.$id);
			return $query;
		}
		
		function delete_rec($id,$whr_key, $table) {
			$this->db->where($whr_key, $id);
			if ($this->db->delete($table)) {
				return true;
			} 
			else {
				return false;
			}
		}
		function delete_multi_rec($arr,$whr_key, $table) {
			$this->db->where_in($whr_key, $arr);
			if ($this->db->delete($table)) {
				return true;
			} 
			else {
				return false;
			}
		}
		
		function get_data($qry){
			$query = $this->db->query($qry);
			if(($query->num_rows()) > 0){
				return $query->result_array();
			}
			else{
				return 0;
			}
		}
		
		function get_tbl_whr_row($tbl,$id){	
			$this->db->where('id', $id);
			$query = $this->db->get($tbl);
			return $query->row();
		}
		
		function get_table_where($sdata, $table, $id){
			$this->db->select($sdata);
			$this->db->where('id',$id);
			$query  = $this->db->get($table);
			$result = $query->result_array();
			return $result;
		}
		
		function send_mail($maildata){
			$config = array(
				'protocol' => 'mail',
				'smtp_host' => SMTP_Host,
				'smtp_port' => SMTP_Port,
				'smtp_user' => SMTP_Email,
				'smtp_pass' => SMTP_Pass,
				'wordwrap' => TRUE
			);
			$this->load->library('email', $config);
			$this->email->from($maildata['from_email'],$maildata['from_name']);
			$this->email->to($maildata['to_email'],$maildata['to_name']);
			$this->email->subject($maildata['subject']);
			$this->email->message($maildata['message']);
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			
			if($this->email->send()) {
				return 1;
			} else {
				echo $this->email->print_debugger();
				die;
			}
		}
		
		
		function IFExist($table,$Column,$value) {
			$query = $this->db->get_where($table, array($Column => $value))->num_rows();

			return $query == 0 ? true : false;
			
		}
		
		function IFExistEdit($table,$Column,$value,$id) {
			$query = $this->db->get_where($table, array($Column => $value , 'id !=' => $id ))->num_rows();
			return $query == 0 ? true : false;
		}
		
	}

?>