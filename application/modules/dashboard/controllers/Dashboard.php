<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend_Controller {
	var $userData;

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('login');
		}

		$this->data['module_name'] = 'Dashboard';
		$this->load->model('Dashboard_model');
		$this->load->model('requisition/Requisition_model');
		$this->userData = $this->Common_model->get_user_details();
		
		// $this->userSessID = $this->session->userdata('user_id');
      // print_r($this->session->all_userdata());		
		//$this->session->set_userdata('current_group', 'superadmin');
	}	

	public function index(){
		// $browser = get_browser(null, true);
		// print_r($browser);

		// print_r($userDetails);
		if(!$this->session->userdata('current_group')){
			if($this->ion_auth->is_admin()){
				$this->session->set_userdata('current_group', 1);
				$this->session->set_userdata('current_group_name', 'Admin');

			}else if($this->ion_auth->in_group('officer')){
				$this->session->set_userdata('current_group', 2);
				$this->session->set_userdata('current_group_name', 'Administrative Officer');

			}else if($this->ion_auth->in_group('service')){
				$this->session->set_userdata('current_group', 3);
				$this->session->set_userdata('current_group_name', 'Common Service');

			}else if($this->ion_auth->is_member()){
				$this->session->set_userdata('current_group', 5);
				$this->session->set_userdata('current_group_name', 'User');
			}						
		}

		$user_grp_session = $this->session->userdata('current_group');

		// if(($this->ion_auth->is_admin() && $user_grp_session == 1) || ($this->ion_auth->in_group('officer') && $user_grp_session == 2) || ($this->ion_auth->in_group('service') && $user_grp_session == 3)){
		if($this->ion_auth->is_admin() && $user_grp_session == 1){	

			$result = $this->Dashboard_model->get_count_data();
			$this->data['total_data'] = $result['count'];

			$result = $this->Dashboard_model->get_count_data(1);
			$this->data['total_pending'] = $result['count'];

			$result = $this->Dashboard_model->get_count_data(2);
			$this->data['total_approve'] = $result['count'];

			$result = $this->Dashboard_model->get_count_data(3);
			$this->data['total_rejected'] = $result['count'];

			// Load Page
			$this->data['meta_title'] = 'Dashboard';
			$this->data['subview'] = 'admin_dashboard';				
			$this->load->view('backend/_layout_main', $this->data);	

		}elseif($this->ion_auth->in_group('officer') && $user_grp_session == 2){			
			$this->data['info'] = $this->userData['user_info'];
			// Result
			$this->data['user'] = $this->ion_auth->user()->row();

			//Results
			$results = $this->Requisition_model->get_requisition($limit, $offset, '2'); 
			$this->data['results'] = $results['rows'];

			// Load Page
			$this->data['meta_title'] = 'Dashboard Administrative Officer';
			$this->data['subview'] = 'officer_dashboard';						
			$this->load->view('backend/_layout_main', $this->data);

		}elseif($this->ion_auth->in_group('service') && $user_grp_session == 3){			
			$this->data['info'] = $this->userData['user_info'];
			// Result
			$this->data['user'] = $this->ion_auth->user()->row();

			//Results
			$results = $this->Requisition_model->get_requisition($limit, $offset, '1'); 
			$this->data['results'] = $results['rows'];

			// Load Page
			$this->data['meta_title'] = 'Dashboard Common Service';
			$this->data['subview'] = 'common_service_dashboard';						
			$this->load->view('backend/_layout_main', $this->data);

		}elseif($this->ion_auth->is_member() && $user_grp_session == 5){			
			$this->data['info'] = $this->userData['user_info'];
			// Result
			$this->data['user'] = $this->ion_auth->user()->row();

			// Load Page
			$this->data['meta_title'] = 'Dashboard';
			$this->data['subview'] = 'user_dashboard';						
			$this->load->view('backend/_layout_main', $this->data);
		}

		/*
		if(($this->ion_auth->is_admin() && $user_grp_session == 1) || ($this->ion_auth->is_scout_admin() && $user_grp_session == 2)){	

			// Load Page
			$this->data['meta_title'] = 'Dashboard';
			// $this->data['subview'] = 'superadmin_dashboard';		
			$this->data['subview'] = 'guest_dashboard';				
			$this->load->view('backend/_layout_main', $this->data);	

		}elseif($this->ion_auth->is_scout_admin() && $user_grp_session == 2){			
			$this->data['info'] = $this->userData['user_info'];
			// $this->data['scout_info'] = $this->Dashboard_model->get_scout_info($this->userData['user_info']->id);

			// load page
			$this->data['meta_title'] = 'Dashboard';
			$this->data['subview'] = 'admin_dashboard';						
			$this->load->view('backend/_layout_main', $this->data);

		}elseif($this->ion_auth->is_region_admin() && $user_grp_session == 4){
			$data_arr = [];				

			// load page
			$this->data['meta_title'] = 'Dashboard';
			$this->data['subview'] = 'region_dashboard';						
			$this->load->view('backend/_layout_main', $this->data);	

		}elseif($this->ion_auth->is_scout_member() && $user_grp_session == 9){			
			$this->data['info'] = $this->userData['user_info'];
			$this->data['scout_info'] = $this->Dashboard_model->get_scout_info($this->userData['user_info']->id);

			// load page
			$this->data['meta_title'] = 'Dashboard';
			$this->data['subview'] = 'scout_member_dashboard';						
			$this->load->view('backend/_layout_main', $this->data);
		}
		*/
	}

	public function ajaxevent(){
		if (!$this->ion_auth->logged_in()){
			redirect('login');
		}

		$session_data = $this->session->userdata('user_id');  // get id of author
		//$this->db->where('author', $session_data); // get data 'where' author=session.id
		$result =  $this->db->where('status', 1)->get('appointment')->result_array();
		// print_r($result); exit;
		print_r(json_encode($result)); 
	}

	public function no_assign(){
			//Load page       
		$this->data['meta_title'] = 'No Assign';
		$this->data['subview'] = 'no_assign';
		$this->load->view('backend/_layout_main', $this->data);
	}

}