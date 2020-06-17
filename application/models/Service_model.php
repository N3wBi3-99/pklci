<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{
   function list()
   {
      $this->db->select('*');
      $this->db->from('service');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   // tampil per pengemudi
   function get_pengemudi()
   {
      $user = $this->session->userdata();
      $id = $user['id']; // untuk ambil data user yang login

      $this->db->select(['service.*', 'bengkel.nama_bengkel', 'order.tgl_order']);
      $this->db->from('service');
      $this->db->join('order', 'service.id_order = order.id');
      $this->db->join('bengkel', 'service.id_bengkel = bengkel.id');
      $this->db->join('pengemudi', 'order.id_pengemudi = pengemudi.id');
      $this->db->join('user', 'pengemudi.id_user = user.id');
      $this->db->where('user.id', $id);
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   // cek apakah ada order
   function cek_order()
   {
      $user = $this->session->userdata();
      $id = $user['id']; // untuk ambil data user yang login
      $sql = "SELECT `order`.* FROM `order`
              JOIN pengemudi ON `order`.id_pengemudi = pengemudi.id
              JOIN `user` on pengemudi.id_user = `user`.id
              WHERE `order`.`status` = 'Disetujui'
              AND `order`.tgl_selesai IS NULL
              AND pengemudi.id_user = {$id}
              AND `order`.id NOT IN ( SELECT id_order FROM service )
              ORDER BY `order`.id DESC";
      return $this->db->query($sql)->row_array();
   }

   // tambah order
   function cmborder()
   {
      $user = $this->session->userdata();
      $id = $user['id']; // untuk ambil data user yang login
      $sql = "SELECT `user`.id id_user, `user`.nama, kendaraan.no_plat, kendaraan.jenis_kendaraan, `order`.*
                FROM `order`
                JOIN pengemudi ON `order`.id_pengemudi = pengemudi.id
                JOIN `user` on pengemudi.id_user = `user`.id
                JOIN kendaraan ON pengemudi.id_kendaraan = kendaraan.id
                WHERE `order`.`status` = 'Disetujui'
                AND `order`.tgl_selesai IS NULL 
                AND pengemudi.id_user = {$id}
                AND `order`.id NOT IN ( SELECT id_order FROM service )
                ORDER BY `order`.id DESC";
      return $this->db->query($sql)->result();
   }

   // tambah bengkel
   function cmbbengkel()
   {
      $this->db->select('*');
      $this->db->from('bengkel');
      $query = $this->db->get();
      return $query->result();
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('service')->row();
   }

   public function insert($data)
   {
      $this->db->insert('service', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('service', $data);
   }

   function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('service');
   }
}

   /* End of file Service_model.php */
