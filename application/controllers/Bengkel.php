<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bengkel extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Bengkel_model');
   }

   public function index()
   {
      $bengkel = $this->Bengkel_model->list();
      $data = array(
         'bengkel_data' => $bengkel,
         'title' => 'Data bengkel',
         'isi'   => 'bengkel/bengkel_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function tambah()
   {
      cek_admin();
      $data = [
         'button' => 'Tambah',
         'action' => site_url('bengkel/tambah_aksi'),
         'id' => set_value('id'),
         'nama_bengkel' => set_value('nama_bengkel'),
         'alamat' => set_value('alamat'),
         'no_hp' => set_value('no_hp'),
         'title' => 'Tambah Data',
         'isi'   => 'bengkel/bengkel_form'
      ];
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function tambah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah();
      } else {
         $data = array(
            'nama_bengkel' => $this->input->post('nama_bengkel', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
         );
         $this->Bengkel_model->insert($data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('bengkel'));
      }
   }

   public function ubah($id)
   {
      $row = $this->Bengkel_model->get_by_id($id);
      if ($row) {
         $data = array(
            'button' => 'Ubah',
            'action' => site_url('bengkel/ubah_aksi'),
            'id' => set_value('id', $row->id),
            'nama_bengkel' => set_value('nama_bengkel', $row->nama_bengkel),
            'alamat' => set_value('alamat', $row->alamat),
            'no_hp' => set_value('no_hp', $row->no_hp),
            'title' => 'Ubah Data', // untuk judul
            'isi' => 'bengkel/bengkel_form'
         );
         $data['user'] = $this->session->userdata();
         $this->load->view('layout/wrapper', $data);
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('bengkel'));
      }
   }

   public function ubah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->ubah($this->input->post('id', TRUE));
      } else {
         $data = array(
            'nama_bengkel' => $this->input->post('nama_bengkel', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
         );

         $this->Bengkel_model->update($this->input->post('id', TRUE), $data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Diubah");</script>');
         redirect(site_url('bengkel'));
      }
   }

   public function hapus($id)
   {
      $row = $this->Bengkel_model->get_by_id($id);
      if ($row) {
         $this->Bengkel_model->delete($id);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('bengkel'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('bengkel'));
      }
   }

   public function read($id)
   {
      $row = $this->Bengkel_model->get_by_id($id);
      if ($row) {
         $data = array(
            'id' => $row->id,
            'nama_bengkel' => $row->nama_bengkel,
            'alamat' => $row->alamat,
            'no_hp' => $row->no_hp,
            'title' => 'Detail Bengkel', // untuk judul
            'isi' => 'bengkel/bengkel_read'
         );
         $data['user'] = $this->session->userdata();
         $this->load->view('layout/wrapper', $data);
      }
   }


   public function _rules()
   {
      $this->form_validation->set_rules('nama_bengkel', 'nama bengkel', 'trim|required');
      $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
      $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Bengkel.php */
