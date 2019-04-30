<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Categories extends MY_Controller {
	
		var $table='categories';
		var $pagetitle='Categories';
		var $viewname='admin/categories';
		
		public function index(){
			$this->Dmodel->checkLogin();
			$viewdata['title']=$this->pagetitle;
			$viewdata['records']=$this->Dmodel->get_tbl($this->table);
			$this->LoadAdminView($this->viewname,$viewdata);
		}
		
		public function AddRecord(){
			$this->Dmodel->checkLogin();
			$data=$_POST;
			if($this->Dmodel->IFExist($this->table,'title',$data['title'])){
				$data['created_at']=DateTime_Now;
				$data['slug']=$this->slugify($data['title']);
				$exec=$this->Dmodel->insertdata($this->table,$data);
				$last_id=$this->db->insert_id();
				if(isset($_FILES['image']) && $_FILES['image']['tmp_name']){
					$config['upload_path']          = APPPATH.'../assets/uploads/categories';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 2048;
					$config['max_width']            = 1024;
					$config['max_height']           = 1024;
					$filename=$_FILES['image']['name'];
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					$lname=strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $data['title']));
					$ldata['image']=$last_id.'-'.$lname.'.'.$ext;
					$_FILES['image']['name']=$ldata['image'];
					$this->load->library('upload', $config);
					if(file_exists(APPPATH.'../assets/uploads/categories/'.$ldata['image'])){
						unlink(APPPATH.'../assets/uploads/categories/'.$ldata['image']);
					}
					if ( ! $this->upload->do_upload('image')){
						$error = array('error' => $this->upload->display_errors());
					}
					else{
						$exec=$this->Dmodel->update_data($this->table,$last_id,$ldata,'id');
						$data = array('upload_data' => $this->upload->data());
					}
				}		
				echo $exec;
			}
			else{
				echo 2;
			}
		}
		public function EditRecord(){
			$this->Dmodel->checkLogin();
			$data=$_POST;
			if($this->Dmodel->IFExistEdit($this->table,'title',$data['title'],$data['id'])){
				$data['updated_at']=DateTime_Now;
				$data['slug']=$this->slugify($data['title']);
				$exec=$this->Dmodel->update_data($this->table,$data['id'],$data,'id');
				if(isset($_FILES['image']) && $_FILES['image']['tmp_name']){
					$config['upload_path']          = APPPATH.'/../assets/uploads/categories';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 2048;
					$config['max_width']            = 1024;
					$config['max_height']           = 1024;
					$filename=$_FILES['image']['name'];
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					$lname=strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $data['title']));
					$ldata['image']=$data['id'].'-'.$lname.'.'.$ext;
					$_FILES['image']['name']=$ldata['image'];
					$this->load->library('upload', $config);
					if(file_exists(APPPATH.'../assets/uploads/categories/'.$ldata['image'])){
						unlink(APPPATH.'../assets/uploads/categories/'.$ldata['image']);
					}
					if ( ! $this->upload->do_upload('image')){
						$exec = array('error' => $this->upload->display_errors());
					}
					else{
						$exec=$this->Dmodel->update_data($this->table,$data['id'],$ldata,'id');
						$data = array('upload_data' => $this->upload->data());
					}
				}
				echo $exec;
			}
			else{
				echo 2;
			}
		}
		public function DeleteRecord(){
			$whr_key="id";
			$ids=$this->input->post('ids');
			$result=$this->Dmodel->delete_multi_rec($ids,$whr_key,$this->table);
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissable">
			<i class="fa fa-check"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Record Deleted.</b>
			</div>'); 
			redirect(base_url().'admin/categories') ;
		}
		
		public function toggleStatus(){
			$id=$this->input->post('id');
			$data=$this->Dmodel->toggle_status($this->table,$id);
			echo $data; 
		}
	}