<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
   }

   public function index()
   {
      // cek level login
      if ($this->session->userdata('level') == 'Pengemudi') {
         $user = $this->session->userdata();
         $id = $user['id'];
         $this->ubah($id);
      }

      $user = $this->User_model->list();
      $data = array(
         'user_data' => $user,
         'title' => 'Data user',
         'isi'   => 'user/user_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function tambah()
   {
      $data = [
         'button' => 'Tambah',
         'action' => site_url('user/tambah_aksi'),
         'id' => set_value('id'),
         'nip' => set_value('nip'),
         'nama' => set_value('nama'),
         'tempat_lahir' => set_value('tempat_lahir'),
         'tgl_lahir' => set_value('tgl_lahir'),
         'jenis_kelamin' => set_value('jenis_kelamin'),
         'no_hp' => set_value('no_hp'),
         'alamat' => set_value('alamat'),
         'username' => set_value('username'),
         'password' => set_value('password'),
         'level' => set_value('level'),
         'title' => 'Tambah Data', // untuk judul
         'isi' => 'user/user_form'
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
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'username' => $this->input->post('username', TRUE),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'level' => $this->input->post('level', TRUE),
         );

         $this->User_model->insert($data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('user'));
      }
   }

   public function ubah($id)
   {
      $row = $this->User_model->get_by_id($id);
      if ($row) {
         $data = array(
            'button' => 'Ubah',
            'action' => site_url('user/ubah_aksi'),
            'id' => set_value('id', $row->id),
            'nip' => set_value('nip', $row->nip),
            'nama' => set_value('nama', $row->nama),
            'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
            'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
            'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
            'no_hp' => set_value('no_hp', $row->no_hp),
            'alamat' => set_value('alamat', $row->alamat),
            'username' => set_value('username', $row->username),
            'password' => set_value('password', ''),
            'level' => set_value('level', $row->level),
            'title' => 'Ubah Data', // untuk judul
            'isi' => 'user/user_form'
         );
         $data['user'] = $this->session->userdata();
         $this->load->view('layout/wrapper', $data);
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('user'));
      }
   }

   public function ubah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->ubah($this->input->post('id', TRUE));
      } else {
         $data = array(
            'nip' => $this->input->post('nip', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'username' => $this->input->post('username', TRUE),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'level' => $this->input->post('level', TRUE),
         );

         $this->User_model->update($this->input->post('id', TRUE), $data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Diubah");</script>');
         if ($this->session->userdata('level') == 'Pengemudi') {
            $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Diubah");</script>');
            redirect(site_url('order'));
         } else {
            $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Diubah");</script>');
            redirect(site_url('user'));
         }
      }
   }

   public function hapus($id)
   {
      $row = $this->User_model->get_by_id($id);
      if ($row) {
         $this->User_model->delete($id);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('user'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('user'));
      }
   }

   public function read($id)
   {
      $row = $this->User_model->get_by_id($id);
      if ($row) {
         $data = array(
            'id' => $row->id,
            'nip' => $row->nip,
            'nama' => $row->nama,
            'tempat_lahir' => $row->tempat_lahir,
            'tgl_lahir' => $row->tgl_lahir,
            'jenis_kelamin' => $row->jenis_kelamin,
            'no_hp' => $row->no_hp,
            'alamat' => $row->alamat,
            'username' => $row->username,
            'password' => $row->password,
            'level' => $row->level,
            'title' => 'Detail User', // untuk judul
            'isi' => 'user/user_read'
         );
         $data['user'] = $this->session->userdata();
         $this->load->view('layout/wrapper', $data);
      }
   }


   public function _rules()
   {
      $this->form_validation->set_rules('nip', 'nip', 'trim|required');
      $this->form_validation->set_rules('nama', 'nama', 'trim|required');
      $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
      $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
      $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
      $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
      $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
      $this->form_validation->set_rules('username', 'username', 'trim|required');
      $this->form_validation->set_rules('password', 'password', 'trim|required');
      $this->form_validation->set_rules('level', 'level', 'trim|required');

      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Bengkel.php */
