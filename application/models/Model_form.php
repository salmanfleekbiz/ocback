<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_form extends CI_Model {
    function __construct() {
        parent::__construct();
    }
		
	function ret_id($tbl,$slug){
		$this->db->select('id, title, slug');
		$res=$this->db->get_where($tbl, array('slug' => $slug))->result_array();
		return $res;
	}
	function get_home_blogs(){
		$this->db->limit(6);
		$query = $this->db->get_where('blogs', array('status'=>1, 'post_type'=>'blog'));
		return $query->result_array();
	}
	
	function get_models($cat_id){	
		$this->db->distinct();
		$this->db->select('m.title, m.slug, m.image');
		$this->db->join('models m', 'p.model_id=m.id');
		$this->db->join('providers pr', 'p.provider_id=pr.id');
		$this->db->join('storage s', 'p.storage_id=s.id');
		$this->db->join('conditions c', 'p.condition_id=c.id');
		$query = $this->db->get_where('pricing p', array('p.category_id'=>$cat_id, 'p.status'=>1, 'pr.status'=>1, 's.status'=>1, 'c.status'=>1, 'm.status'=>1));
		return $query->result_array();
	}
		
	function get_providers($model_id){	
		$this->db->distinct();
		$this->db->select('pr.title, pr.slug, pr.logo');
		$this->db->join('providers pr', 'p.provider_id=pr.id');
		$query = $this->db->get_where('pricing p', array('p.model_id'=>$model_id, 'p.status'=>1, 'pr.status'=>1));
		return $query->result_array();
	}
		
	function get_storage($mod_id,$pro_id){	
		$this->db->distinct();
		$this->db->select('s.title, s.slug');
		$this->db->join('storage s', 'p.storage_id=s.id');
		$query = $this->db->get_where('pricing p', array('p.model_id'=>$mod_id, 'p.provider_id'=>$pro_id, 'p.status'=>1, 's.status'=>1));
		return $query->result_array();
	}
		
	function get_condition($mod_id,$pro_id,$sto_id){	
		$this->db->distinct();
		$this->db->select('c.title, c.slug, c.id');
		$this->db->join('conditions c', 'p.condition_id=c.id');
		$query = $this->db->get_where('pricing p', array('p.model_id'=>$mod_id, 'p.provider_id'=>$pro_id, 'p.storage_id'=>$sto_id, 'p.status'=>1, 'c.status'=>1));
		return $query->result_array();
	}
		
	function get_product($pid){	
		$this->db->select('p.id, m.title, m.slug, p.price, c.title AS condition, s.title AS storage, pr.title AS provider');
		$this->db->join('models m', 'p.model_id=m.id');
		$this->db->join('conditions c', 'p.condition_id=c.id');
		$this->db->join('storage s', 'p.storage_id=s.id');
		$this->db->join('providers pr', 'p.provider_id=pr.id');
		$query = $this->db->get_where('pricing p', array('p.id'=>$pid));
		return $query->result_array()[0];
	}
		
	function update_total($oid){	
		$this->db->select_sum('subtotal');
		$order_total= $this->db->get_where('order_details',array('order_id' => $oid))->row();
		
		$this->db->set('amount', $order_total->subtotal);
		$this->db->where('id', $oid);
		$this->db->update('orders');
		return true;
	}
		
	function search_order($keywords){
		$this->db->select('order_code,label_url,tracking_url,created_at,status');
		$this->db->where('order_code', $keywords);
		$this->db->or_where('email', $keywords); 
		$this->db->order_by('id', 'DESC'); 
		$orders= $this->db->get('orders')->result_array();
		return $orders;
	}
	function get_tbl_whr_key_row($tbl,$key,$value){	
		$this->db->where($key, $value);
			$query = $this->db->get($tbl);
			return $query->row();
	}
		
	
   
}
?>