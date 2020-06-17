<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
   function list()
   {
      $this->db->select(['user.*', 'user.id id_user', 'kendaraan.*', 'kendaraan.id id_kendaraan', 'order.*']);
      $this->db->from('order');
      $this->db->join('pengemudi', 'pengemudi.id = order.id_pengemudi');
      $this->db->join('kendaraan', 'kendaraan.id = pengemudi.id_kendaraan');
      $this->db->join('user', 'user.id = pengemudi.id_user');
      $this->db->order_by('order.id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   function get_pengemudi()
   {
      $user = $this->session->userdata();
      $id = $user['id']; // untuk ambil data user yang login

      $this->db->select(['user.*', 'user.id id_userr', 'kendaraan.*', 'kendaraan.id id_kendaraann', 'order.*']);
      $this->db->from('order');
      $this->db->join('pengemudi', 'pengemudi.id = order.id_pengemudi');
      $this->db->join('kendaraan', 'kendaraan.id = pengemudi.id_kendaraan');
      $this->db->join('user', 'user.id = pengemudi.id_user');
      $this->db->where('pengemudi.id_user', $id);
      $this->db->order_by('order.id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   // cek status pengemudi aktif/nonaktif untuk tambah data
   function cek_pengemudi()
   {
      $user = $this->session->userdata();
      $id = $user['id']; // untuk ambil data user yang login
      $this->db->select('*');
      $this->db->from('pengemudi');
      $this->db->where('status', 'Aktif');
      $this->db->where('id_user', $id);
      $query = $this->db->get();
      return $query->row_array();
   }

   function order_baru()
   {
      $this->db->select('*');
      $this->db->from('order');
      $this->db->where('status', 'Menunggu verifikasi');
      $query = $this->db->get();
      return $query->result();
   }

   function total_order_baru()
   {
      $this->db->select('*');
      $this->db->from('order');
      $this->db->where('status', 'Menunggu verifikasi');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('order')->row();
   }

   public function insert($data)
   {
      $this->db->insert('order', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('order', $data);
   }

   function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->update('order');
   }
}
   
   /* End of file Order.php */
