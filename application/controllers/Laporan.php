<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
      $data = array(
         'button' => 'Cetak',
         'action' => site_url('laporan/cetak_aksi'),
         'title' => 'Cetak Laporan',
         'isi'   => 'laporan/laporan_form'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function cetak_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->index();
      } else {
         $data = array(
            'range' => $this->input->post('range', TRUE),
         );
         $d = str_replace('-', ',', $data);
         $d = str_replace(' ', '', $d);
         $array = explode(',', $d["range"]);
         echo "<pre>";
         print_r($array[0]);
         exit;
         $this->Bengkel_model->insert($data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('bengkel'));
      }
   }

   public function _rules()
   {
      $this->form_validation->set_rules('range', 'Range', 'trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Laporan.php */
