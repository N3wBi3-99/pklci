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

   function total_data()
   {
      $this->db->select('*');
      $this->db->from('order');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   function get_pengemudi()
   {
      $user = $this->session->userdata();
      $id = $user['id']; // untuk ambil data user yang login

      $this->db->select(['user.*', 'user.id id_userr', 'kendaraan.*', 'kendaraan.id id_kendaraann', 'order.*']);
      $this->db->from('order');
      $this->db->join('pengemudi', 'order.id_pengemudi = pengemudi.id');
      $this->db->join('kendaraan', 'pengemudi.id_kendaraan = kendaraan.id');
      $this->db->join('user', 'pengemudi.id_user = user.id');
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
   // untuk menampilkan data order baru
   function order_baru()
   {
      $this->db->select('*');
      $this->db->from('order');
      $this->db->where('status', 'Menunggu verifikasi');
      $query = $this->db->get();
      return $query->result();
   }

   // untuk menampilkan  jumlah order baru
   function total_order_baru()
   {
      $this->db->select('*');
      $this->db->from('order');
      $this->db->where('status', 'Menunggu verifikasi');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   // untuk detail order bagian bengkel
   function bengkel($id)
   {
      $this->db->select(['bengkel.*', 'service.tgl_service', 'service.total', 'service.foto_service', 'service.foto_nota']);
      $this->db->from('service');
      $this->db->join('bengkel', 'service.id_bengkel = bengkel.id');
      $this->db->where('service.id_order', $id);
      $query = $this->db->get();
      return $query->row();
   }

   // untuk detail order bagian nota
   function nota($id)
   {
      $this->db->select(['nota.*']);
      $this->db->from('service');
      $this->db->join('nota', 'nota.id_service = service.id');
      $this->db->where('service.id_order', $id);
      $query = $this->db->get();
      return $query->result();
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
