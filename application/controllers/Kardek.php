<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kardek extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Order_model');
      $this->load->model('Service_model');
      $this->load->model('Nota_model');
   }

   public function index()
   {
      $kardek = $this->Order_model->list();
      $data = array(
         'kardek_data' => $kardek,
         'title' => 'Data Kardek',
         'isi'   => 'kardek/kardek_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }
}
   
   /* End of file Kardek.php */
