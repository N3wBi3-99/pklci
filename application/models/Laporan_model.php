<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

   function list($id_pengemudi, $firstdate, $lastdate)
   {
      $this->db->select(['order.id id_nyorder', 'order.tgl_order', 'order.tgl_selesai', 'service.id id_nyervice', 'nota.id id_nyota', 'nota.id_service', 'GROUP_CONCAT(nota.nama_barang SEPARATOR ", ") nama_barang', 'service.total']);
      $this->db->from('order');
      $this->db->join('service', 'order.id = service.id_order');
      $this->db->join('nota', 'service.id = nota.id_service');
      $this->db->where('order.id_pengemudi', $id_pengemudi);
      $this->db->where('order.tgl_selesai >=', $firstdate);
      $this->db->where('order.tgl_selesai <=', $lastdate);
      $this->db->group_by('nota.id_service');
      $this->db->order_by('order.tgl_order', 'desc');
      $query = $this->db->get();
      return $query->result();
   }
   function get_pengemudi()
   {
      $this->db->select(['*', 'user.id id_user', 'kendaraan.id id_kendaraan', 'pengemudi.id id_pengemudi']);
      $this->db->from('user');
      $this->db->join('pengemudi', 'user.id = pengemudi.id_user');
      $this->db->join('kendaraan', 'pengemudi.id_kendaraan = kendaraan.id');
      // $this->db->order_by('order.tgl_order', 'desc');
      $query = $this->db->get();
      return $query->result();
   }
}
   
   /* End of file Laporan_model.php */
