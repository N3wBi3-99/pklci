<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
   function list()
   {
      $this->db->select('*');
      $this->db->from('kendaraan');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   function total_data()
   {
      $this->db->select('*');
      $this->db->from('kendaraan');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   // detail kendaraan di pengemudi
   function detail($iduser)
   {
      $this->db->select(['kendaraan.id']);
      $this->db->from('kendaraan');
      $this->db->join('pengemudi', 'kendaraan.id = pengemudi.id_kendaraan');
      $this->db->join('user', 'user.id = pengemudi.id_user');
      $this->db->where('user.id', $iduser);
      $query = $this->db->get();
      return $query->row_array();
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('kendaraan')->row();
   }

   public function insert($data)
   {
      $this->db->insert('kendaraan', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('kendaraan', $data);
   }

   function delete($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('kendaraan', $data);
   }
}
   
   /* End of file Kendaraan_model.php */
