<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
    function login($data){
        $user_name = $data['user_name'];     
		$password = $data['password']; 
		$remember=$data['remember_me'];
		
		if($remember == "on"){
			$cookie = array(
				'name'   => 'user_name',
				'value'  => $user_name,                            
				'expire' => '2147483647',                                                               
				'secure' => TRUE
			);
		    $this->input->set_cookie($cookie);   
			$cookie = array(
				'name'   => 'password',
				'value'  => $password,                            
				'expire' => '2147483647',                                                               
				'secure' => TRUE
			);
		    $this->input->set_cookie($cookie);
		}
		$this->db->where('user_name',$user_name);    
		$query = $this->db->get('users');
        if($query->num_rows() == 1){
            $rows = $query->row();
            if($rows->password == $password){
                $this->session->set_userdata('_admin',true);
                $this->session->set_userdata('admin_user_name',$user_name);
                $this->session->set_userdata('admin_id',$rows->ID);
                $this->session->set_userdata('admin_email',$rows->email);
				return $rows->ID;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }
		
	function fpass($email,$string){
		$email_check=$this->db->get_where('users', array('email' => $email))->num_rows();
		if($email_check==1){
			$data=array('reset_token'=>$string);
			$this->Dmodel->update_data('users',$email,$data,'email');
			$maildata= array(
				'from'=>Site_Title.','.Site_Email,
				'to'=>$email,
				'subject'=>'Reset your Account Password.',
				'message'=>'We have received a request to reset your account password associated with this email address. If you have not placed this request, you can safely ignore this email and we assure you that your account is completely secure. 
				If you do need to change your Password, you can use this link: '
			);
			$this->Dmodel->send_mail($maildata);
		}
	}
	
	// function verifiybytoken($token){
		// $token_exist=$this->db->get_where('users', array('reset_token' => $token))->num_rows();
		// if($token_exist){
		// }
		// else{
			// return false;
		// }
	// }
	
	function get_order_to_details($odetailid){
		$this->db->select('order_details.*, orders.order_code', 'orders.id as orderid')
		->from('order_details')
		->join('orders', 'order_details.order_id = orders.id')
		->where('order_details.id',$odetailid);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function get_recent(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('orders',10);
		return $query->result_array();
	}
	
	function get_counters(){
	  $counters['received']=$this->db->get_where('orders', array('status' => 'received'))->num_rows();
	  $counters['paid']=$this->db->get_where('orders', array('status' => 'paid'))->num_rows();
	  $counters['recycled']=$this->db->get_where('orders', array('status' => 'recycled'))->num_rows();
	  $counters['returned']=$this->db->get_where('orders', array('status' => 'returned'))->num_rows();
	  return $counters;
	}	
	
	function get_requote_price($odetails, $req_condition){
		$this->db->select('p.price');
		$this->db->join('models m', 'p.model_id=m.id');
		$this->db->join('providers pr', 'p.provider_id=pr.id');
		$this->db->join('storage s', 'p.storage_id=s.id');
		$res= $this->db->get_where('pricing p', array('pr.title' => $odetails->provider, 'm.title' => $odetails->device, 'p.condition_id' => $req_condition,'s.title' => $odetails->storage))->row();
		$res2= $this->db->get_where('conditions', array('id' => $req_condition))->row();
		
		return array('price' =>$res->price,'condition'=>$res2->title);
	}
	
	function get_current_trades(){
		$array = array('status'=>'','trade_details!='=>'Shipping Kit with Prepaid Label');
		$this->db->select('*');
		$this->db->where($array);
		$this->db->or_where('status','shipping_kit_sent');
		$res= $this->db->get('orders')->result_array();
		
		return $res;
	}
	
	function need_payments(){
		$array = array('o.status' => 'received','od.action' => '1');
		$res2=array();
		$this->db->join('order_details od', 'o.id=od.order_id');
		$this->db->select("o.*"); 
		$this->db->group_by("o.id"); 
		
		$res= $this->db->get_where('orders o', $array)->result_array();
		
		foreach($res as $row){
			$array = array('action !=' => '1', 'order_id'=>$row['id']);
			$num_res= $this->db->get_where('order_details', $array)->num_rows();
			if($num_res == 0){
				array_push($res2,$row);
			}
		}
		return $res2;
	}
	
	function get_requote_status($status){
		$array=array('orders.status'=>'received','order_details.action'=>3,'order_requote.status'=>$status);
		$this->db->select('orders.*, order_requote.status as requotestatus, order_details.action, order_requote.id as rid')
		->from('orders')
		->join('order_details', 'order_details.order_id = orders.id')
		->join('order_requote', 'order_requote.order_detail_id = order_details.id')
		->where($array);
		$query=$this->db->get();
		return $query->result_array();
		
	}

	function get_seller_action_status($status){
		$array=array('orders.status'=>'received','order_details.action'=>4,'order_seller_issue.status'=>$status);
		$this->db->select('orders.*, order_seller_issue.status as sellerstatus, order_details.action, order_seller_issue.id as sid')
		->from('orders')
		->join('order_details', 'order_details.order_id = orders.id')
		->join('order_seller_issue', 'order_seller_issue.order_detail_id = order_details.id')
		->where($array);
		$query=$this->db->get();
		return $query->result_array();
		
	}
	
	
}
?>