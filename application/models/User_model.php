<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

   function login($username, $password)
   { //untuk login agar level muncul
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where([
         'username' => $username,
      ]);
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->row_array();
   }

   function list()
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   function total_data()
   {
      $this->db->select('*');
      $this->db->from('user');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('user')->row();
   }

   public function insert($data)
   {
      $this->db->insert('user', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('user', $data);
   }

   function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('user');
   }
}
   
   /* End of file User_model.php */
