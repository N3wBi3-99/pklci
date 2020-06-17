<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bengkel_model extends CI_Model
{

   function list()
   {
      $this->db->select('*');
      $this->db->from('bengkel');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   function total_data()
   {
      $this->db->select('*');
      $this->db->from('bengkel');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('bengkel')->row();
   }

   public function insert($data)
   {
      $this->db->insert('bengkel', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('bengkel', $data);
   }

   function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('bengkel');
   }
}
   
   /* End of file Bengkel_model.php */
