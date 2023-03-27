<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends Backend_Controller {
   var $userID;

   public function __construct(){
      parent::__construct();

      if (!$this->ion_auth->logged_in()):
         redirect('login');
      endif;

      $this->data['module_name'] = 'Purchase';
      $this->load->model('Purchase_model');
      $this->userSessID = $this->session->userdata('user_id');
   }

   public function index($offset=0){
      $limit = 25;

      //Results
      $results = $this->Purchase_model->get_purchase($limit, $offset); 
      $this->data['results'] = $results['rows'];
      $this->data['total_rows'] = $results['num_rows'];

      //pagination
      $this->data['pagination'] = create_pagination('purchase/index/', $this->data['total_rows'], $limit, 3, $full_tag_wrap = true);

      // Load view
      $this->data['meta_title'] = 'Purchase List';
      $this->data['subview'] = 'index';
      $this->load->view('backend/_layout_main', $this->data);
   }

   public function fiscal_year($f_year){
      $limit = 25;
      $offset=0;

      //Results
      $results = $this->Purchase_model->get_purchase($limit, $offset, $f_year); 
      $this->data['results'] = $results['rows'];
      $this->data['total_rows'] = $results['num_rows'];

      //pagination
      $this->data['pagination'] = create_pagination('purchase/fiscal_year/', $this->data['total_rows'], $limit, 3, $full_tag_wrap = true);

      $f_year_name = $this->Common_model->get_fiscal_year($f_year)->fiscal_year_name;

      // Load view
      $this->data['meta_title'] = $f_year_name .' Fiscal Year Purchase List';
      $this->data['subview'] = 'index';
      $this->load->view('backend/_layout_main', $this->data);
   }

   public function create(){
      // if(!$this->ion_auth->is_member()){
      //    redirect('dashboard');
      // }
      $fiscal_year = $this->Common_model->get_current_fiscal_year();
      $this->data['fiscal_year'] = $fiscal_year->fiscal_year_name;

      //Validation
      $this->form_validation->set_rules('title', 'title','required|trim|max_length[255]');

      //Validate and input data
      if ($this->form_validation->run() == true){
         $user = $this->ion_auth->user()->row();

         $form_data = array(
            'user_id'         => $user->id,            
            'supplier_name'   => $this->input->post('title'),
            'f_year_id'       => $fiscal_year->id,
            'created'         => date('Y-m-d H:i:s')
            );

         // print_r($form_data); exit;
         if($this->Common_model->save('purchase', $form_data)){     

            // Schedule Type Appointment
            $insert_id = $this->db->insert_id();
            // Insert Scout Unit under a group

            for ($i=0; $i<sizeof($_POST['pur_item_id']); $i++) { 
               $form_data2 = array(
                  'purchase_id'        => $insert_id,
                  'pur_item_id'        => $_POST['pur_item_id'][$i],
                  'pur_quantity'       => $_POST['pur_quantity'][$i],                             
                  'pur_fiscal_year_id' => $fiscal_year->id,
                  'pur_remark'         => $_POST['pur_remark'][$i]
                  );
               $this->Common_model->save('purchase_item', $form_data2);

               $pur_item = $_POST['pur_item_id'][$i];
               $pur_quantity = $_POST['pur_quantity'][$i];

               // Add inventory quantity
               // $uData = $this->db->set("quantity", "quantity + $pur_quantity"); 
               // $this->db->where('id', $pur_item);
               // $this->db->update("items", $uData);
               $this->db->query("UPDATE items SET quantity = quantity + $pur_quantity where id = $pur_item");
            }

            $this->session->set_flashdata('success', 'Create Requisition successfully.');
            redirect("purchase");
         }
      }

      //Dropdown
      // $this->data['items'] = $this->Common_model->get_items();
      $this->data['categories'] = $this->Common_model->get_categories();
      $this->data['info'] = $this->Common_model->get_user_details();

      // print_r($this->data['info']['user_info']); exit;

      //Load view
      $this->data['meta_title'] = 'Purchase Entry Form';
      $this->data['subview'] = 'create';
      $this->load->view('backend/_layout_main', $this->data);
   }

   public function details($id){
      $dataID = (int) decrypt_url($id); //exit;
      if (!$this->Common_model->exists('purchase', 'id', $dataID)) { 
         show_404('Purchase - details - exitsts', TRUE);
      }      

      //Results
      $this->data['info'] = $this->Purchase_model->get_info($dataID);
      // echo '<pre>';
      // print_r($this->data['info']->title); exit;
      $this->data['items'] = $this->Purchase_model->get_items($dataID); 
      // if($this->data['info']->schedule_type == 'Appointment'){
      //    $this->data['persons'] = $this->Purchase_model->get_appointment_persons($this->data['info']->id); 
      // }

      // Load page
      $this->data['meta_title'] = 'Purchase Details';
      $this->data['subview'] = 'details';
      $this->load->view('backend/_layout_main', $this->data);
   }

}