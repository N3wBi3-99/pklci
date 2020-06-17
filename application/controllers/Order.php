<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{


   public function __construct()
   {
      parent::__construct();
      $this->load->model('Order_model');
   }

   public function index()
   {
      if ($this->session->userdata('level') == 'Pengemudi') {
         $this->Pengemudi();
      }
      $order = $this->Order_model->list();
      $data = array(
         'order_data' => $order,
         'title' => 'Data order',
         'isi'   => 'order/order_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   // untuk tampilan order pengemudi
   private function pengemudi()
   {
      $cek = $this->Order_model->cek_pengemudi();
      $order = $this->Order_model->get_pengemudi();
      $data = array(
         'status' => $cek['status'],
         'order_data' => $order,
         'title' => 'Kartu Order', // untuk judul
         'isi' => 'order/order_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function verifikasi_setuju($id)
   {
      if ($id) {
         $data = array(
            'status' => 'Disetujui',
         );

         $this->Order_model->update($id, $data);
         $this->session->set_flashdata('message', '<script>toastr.success("Verifikasi Disetujui");</script>');
         redirect(site_url('order'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('order'));
      }
   }

   public function verifikasi_tolak($id)
   {
      if ($id) {
         $data = array(
            'status' => 'Ditolak',
         );

         $this->Order_model->update($id, $data);
         $this->session->set_flashdata('message', '<script>toastr.error("Verifikasi Ditolak");</script>');
         redirect(site_url('order'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('order'));
      }
   }

   public function tambah()
   {
      $data = [
         'button' => 'Tambah',
         'action' => site_url('order/tambah_aksi'),
         'id' => set_value('id'),
         'id_pengemudi' => set_value('id_pengemudi'),
         'jenis_order' => set_value('jenis_order'),
         'ket_rusak' => set_value('ket_rusak'),
         'tgl_order' => set_value('tgl_order'),
         'tgl_selesai' => set_value('tgl_selesai'),
         'status' => set_value('status'),
         'title' => 'Tambah Data',
         'isi'   => 'order/order_form'
      ];
      $data['user'] = $this->session->userdata();
      $id = $data['user']['id']; // untuk ambil data user yang login
      // mengambil id pengemudi
      $sql = "SELECT pengemudi.*
                FROM user
                JOIN pengemudi ON `user`.id = pengemudi.id_user
                WHERE `user`.id= {$id}";

      $data['pengemudi'] = $this->db->query($sql)->row_array();
      $this->load->view('layout/wrapper', $data);
   }

   public function tambah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah();
      } else {
         $data = array(
            'id' => $this->input->post('id', TRUE),
            'id_pengemudi' => $this->input->post('id_pengemudi', TRUE),
            'jenis_order' => $this->input->post('jenis_order', TRUE),
            'ket_rusak' => $this->input->post('ket_rusak', TRUE),
            'tgl_order' => date('Y-m-d'),
            'status' => 'Menunggu verifikasi',
         );
         $this->Order_model->insert($data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('order'));
      }
   }

   public function ubah($id)
   {
      $row = $this->Order_model->get_by_id($id);
      if ($row) {
         $data = array(
            'button' => 'Ubah',
            'action' => site_url('order/ubah_aksi'),
            'id' => set_value('id', $row->id),
            'id_pengemudi' => set_value('id_pengemudi', $row->id_pengemudi),
            'jenis_order' => set_value('jenis_order', $row->jenis_order),
            'ket_rusak' => set_value('ket_rusak', $row->ket_rusak),
            'tgl_order' => set_value('tgl_order', $row->tgl_order),
            'tgl_selesai' => set_value('tgl_selesai', $row->tgl_selesai),
            'status' => set_value('status', $row->status),
         );
         $this->load->view('order/order_form', $data);
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('order'));
      }
   }

   public function ubah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->ubah($this->input->post('id', TRUE));
      } else {
         $data = array(
            'id_pengemudi' => $this->input->post('id_pengemudi', TRUE),
            'jenis_order' => $this->input->post('jenis_order', TRUE),
            'ket_rusak' => $this->input->post('ket_rusak', TRUE),
            'tgl_order' => $this->input->post('tgl_order', TRUE),
            'tgl_selesai' => $this->input->post('tgl_selesai', TRUE),
            'status' => $this->input->post('status', TRUE),
         );

         $this->Order_model->update($this->input->post('id', TRUE), $data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Diubah");</script>');
         redirect(site_url('order'));
      }
   }

   public function hapus($id)
   {
      $row = $this->Order_model->get_by_id($id);
      if ($row) {
         $this->Order_model->delete($id);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('order'));
      } else {
         $this->session->set_flashdata('message', '<script>toastr.error("Data Gagal Diubah");</script>');
         redirect(site_url('order'));
      }
   }

   public function read($id)
   {
      $row = $this->Order_model->get_by_id($id);
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
      }
   }

   public function _rules()
   {
      $this->form_validation->set_rules('id_pengemudi', 'id pengemudi', 'trim');
      $this->form_validation->set_rules('jenis_order', 'jenis order', 'trim|required');
      $this->form_validation->set_rules('ket_rusak', 'ket rusak', 'trim|required');
      $this->form_validation->set_rules('tgl_order', 'tgl order', 'trim');
      $this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'trim');
      $this->form_validation->set_rules('status', 'status', 'trim');

      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Order.php */
