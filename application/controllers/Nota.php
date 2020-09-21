<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nota extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Nota_model');
   }

   public function index()
   {
      $nota = $this->Nota_model->list();
      $data = array(
         'nota_data' => $nota,
         'title' => 'Data nota',
         'isi'   => 'nota/nota_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }
}
   
   /* End of file Nota.php */
