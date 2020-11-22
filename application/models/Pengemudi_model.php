<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengemudi_model extends CI_Model
{
   function list()
   {
      $this->db->select(['pengemudi.*', 'user.nama', 'kendaraan.no_plat', 'kendaraan.merk', 'kendaraan.jenis_kendaraan', 'kendaraan.tahun_pembuatan']);
      $this->db->from('pengemudi');
      $this->db->join('user', 'user.id = pengemudi.id_user');
      $this->db->join('kendaraan', 'kendaraan.id = pengemudi.id_kendaraan');
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

   function total_data()
   {
      $this->db->select('*');
      $this->db->from('pengemudi');
      $this->db->where('pengemudi.status', 'Aktif');
      $query = $this->db->get();
      $rowcount = $query->num_rows();
      return $rowcount;
   }

   function kardek($id)
   {
      $this->db->select(['pengemudi.*', 'user.nama', 'user.no_hp', 'kendaraan.no_plat', 'kendaraan.merk', 'kendaraan.jenis_kendaraan', 'kendaraan.tahun_pembuatan']);
      $this->db->from('pengemudi');
      $this->db->join('user', 'user.id = pengemudi.id_user');
      $this->db->join('kendaraan', 'kendaraan.id = pengemudi.id_kendaraan');
      $this->db->where('pengemudi.id', $id);
      $this->db->order_by('id', 'desc');
      $query = $this->db->get();
      return $query->row();
   }

   function kardek_order($id)
   {
      $this->db->select(['order.*']);
      $this->db->from('order');
      $this->db->join('pengemudi', 'pengemudi.id = order.id_pengemudi');
      $this->db->where('tgl_selesai !=', null);
      $this->db->where('pengemudi.id', $id);
      $query = $this->db->get();
      return $query->result();
   }

   function cmbuser()
   {
      $sql = "SELECT * FROM `user` WHERE `user`.id 
      NOT IN (SELECT id_user FROM pengemudi join user_level where pengemudi.status = 'Aktif'  AND user_level.id='2')
     ";
      return $this->db->query($sql)->result();
   }

   function cmbkendaraan()
   {
      $sql = "SELECT * FROM `kendaraan` WHERE `kendaraan`.id 
                NOT IN ( SELECT id_kendaraan FROM pengemudi where pengemudi.status = 'Aktif')";
      return $this->db->query($sql)->result();
   }

   // get data by id
   function get_by_id($id)
   {
      $this->db->where('id', $id);
      return $this->db->get('pengemudi')->row();
   }

   public function insert($data)
   {
      $this->db->insert('pengemudi', $data);
   }

   function update($id, $data)
   {
      $this->db->where('id', $id);
      $this->db->update('pengemudi', $data);
   }

   function delete($id)
   {
      $this->db->where('id', $id);
      $this->db->delete('pengemudi');
   }
}
   
   /* End of file Pengemudi_model.php */
