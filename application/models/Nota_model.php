<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nota_model extends CI_Model
{

   function list()
   {
      $this->db->select('*');
      $this->db->from('nota');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('nota')->row();
   }

   public function insert($data)
   {
      $this->db->insert('nota', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('nota', $data);
   }

   function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('nota');
   }
}
   
   /* End of file Nota_model.php */
