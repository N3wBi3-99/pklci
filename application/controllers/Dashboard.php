<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->model('Pengemudi_model');
      $this->load->model('Order_model');
      $this->load->model('Kendaraan_model');
      $this->load->model('Bengkel_model');
      cek_admin();
   }

   public function index()
   {
      $user_total = $this->User_model->total_data();
      $pengemudi_total = $this->Pengemudi_model->total_data();
      $order_total = $this->Order_model->total_data();
      $kendaraan_total = $this->Kendaraan_model->total_data();
      $bengkel_total = $this->Bengkel_model->total_data();
      $data = array(
         'user_total' => $user_total,
         'pengemudi_total' => $pengemudi_total,
         'order_total' => $order_total,
         'kendaraan_total' => $kendaraan_total,
         'bengkel_total' => $bengkel_total,
         'title' => 'Halaman Dashboard',
         'isi'   => 'dashboard/list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }
}
   
   /* End of file Dashboard.php */
