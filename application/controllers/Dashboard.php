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
      $user = $this->User_model->total_data();
      $pengemudi = $this->Pengemudi_model->total_data();
      $order = $this->Order_model->total_data();
      $kendaraan = $this->Kendaraan_model->total_data();
      $bengkel = $this->Bengkel_model->total_data();
      $data = array(
         'title' => 'Halaman Administrator',
         'isi'   => 'dashboard/list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }
}
   
   /* End of file Dashboard.php */
