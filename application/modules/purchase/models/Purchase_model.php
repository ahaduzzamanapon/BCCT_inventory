<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_model extends CI_Model {

   public function __construct() {
      parent::__construct();
   }

   public function get_purchase($limit=1000, $offset=0, $status=null) {
      $desk_arr=[];
      $desk_arr[]=$this->ion_auth->get_group_id();
      if(in_array('6', $this->ion_auth->get_permission())){
         $ta=1;
     }
      $this->db->select('p.*, f.fiscal_year_name');
      $this->db->from('purchase p');
      $this->db->join('fiscal_year f', 'f.id = p.f_year_id', 'LEFT');
      if($status != null && $status != 4) {
         $this->db->where('p.status', $status);
      }elseif($status == 4) {
         $this->db->where('p.is_received =', 1);
      }
      if($ta!=1){
         $this->db->where_in('p.desk_id', $desk_arr);
     }
      $this->db->order_by('p.id', 'DESC');
      $query = $this->db->get()->result();
      $result['rows'] = $query;
        // count query
      $q = $this->db->select('COUNT(*) as count');
      $this->db->from('purchase'); 
      $query = $this->db->get()->result();
      $tmp = $query;
      $result['num_rows'] = $tmp[0]->count;

      return $result;
   }

   public function get_info($id) {
      $this->db->select('p.*, u.first_name');
      $this->db->from('purchase p');
      $this->db->join('users u', 'u.id = p.user_id', 'LEFT');
      $this->db->where('p.id', $id);
      $query = $this->db->get()->row();

      return $query;
   }

   public function get_items($id) {
      $this->db->select('pi.*, i.item_name, iu.unit_name, c.category_name');
      $this->db->from('purchase_item pi');
      $this->db->join('items i', 'i.id = pi.pur_item_id', 'LEFT');
      $this->db->join('item_unit iu', 'iu.id = i.unit_id', 'LEFT');
      $this->db->join('categories c', 'c.id = i.cat_id', 'LEFT');
      $this->db->where('pi.purchase_id', $id);
      $query = $this->db->get()->result();

      return $query;
   }

   public function get_dd_host_persons(){
      $data[''] = '-- Select Host Person --';
      $this->db->select('id, CONCAT(host_name, " (",host_designation," )") as text');
      $this->db->from('host_person');
      // $this->db->order_by('task_name_en', 'ASC');
      $query = $this->db->get();

      foreach ($query->result_array() AS $rows) {
         $data[$rows['id']] = $rows['text'];
      }

      return $data;
   }

   public function appointment_destroy($id) {
      // Delete row
      if($this->db->delete('appointment', array('id' => $id))){            
         return TRUE;
      }else{
         return FALSE;
      }
   }

}
