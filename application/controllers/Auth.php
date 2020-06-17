<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

   public function index()
   {
      if ($this->session->userdata('username')) { // agar user tidak bisa kembali ke halaman login
         redirect('dashboard');
      }
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == false) {
         $data['title'] = 'Halaman Login';
         $this->load->view('login/list', $data);
      } else {
         // validasinya sukses
         $username = $this->input->post('username');
         $password = $this->input->post('password');
         // jalankan helper
         login($username, $password);
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('id');
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('nama');
      $this->session->unset_userdata('level');
      $this->session->unset_userdata('jenis_kelamin');
      $this->session->set_flashdata(
         'message',
         '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-info-circle"> Anda berhasil keluar</i></div>'
      );
      redirect('auth');
   }

   public function blocked()
   {
      $this->load->view('login/blocked'); // jika pengemudi ingin mengakses menu yang hanya untuk admin
   }
}
   
   /* End of file Auth.php */
