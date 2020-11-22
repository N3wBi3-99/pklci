<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengemudi extends CI_Controller
{


   public function __construct()
   {
      parent::__construct();
      $this->load->model('Pengemudi_model');
      cek_admin();
   }

   public function index()
   {
      $pengemudi = $this->Pengemudi_model->list();
      $data = array(
         'pengemudi_data' => $pengemudi,
         'title' => 'Data pengemudi',
         'isi'   => 'pengemudi/pengemudi_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function status_nonaktif($id)
   {
      if ($id) {
         $data = array(
            'status' => 'Tidak aktif',
            'tgl_nonaktif' => date('Y-m-d'),
         );
         $this->Pengemudi_model->update($id, $data);
         $this->session->set_flashdata('message', '<script>toastr.success("Pengemudi Berhasil Dinonaktifkan");</script>');
         redirect(site_url('pengemudi'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('pengemudi'));
      }
   }

   public function tambah()
   {
      $user = $this->Pengemudi_model->cmbuser();
      $kendaraan = $this->Pengemudi_model->cmbkendaraan();
      $data = [
         'user_data'   => $user,
         'kendaraan_data'   => $kendaraan,
         'button' => 'Tambah',
         'action' => site_url('pengemudi/tambah_aksi'),
         'id' => set_value('id'),
         'id_user' => set_value('id_user'),
         'id_kendaraan' => set_value('id_kendaraan'),
         'title' => 'Tambah Data',
         'isi'   => 'pengemudi/pengemudi_form'
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
            'id_user' => $this->input->post('id_user', TRUE),
            'id_kendaraan' => $this->input->post('id_kendaraan', TRUE),
            'status' => 'Aktif',
            'tgl_aktif' => date('Y-m-d'),
         );
         $this->Pengemudi_model->insert($data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('pengemudi'));
      }
   }

   public function ubah($id)
   {
      $row = $this->Pengemudi_model->get_by_id($id);
      $user = $this->Pengemudi_model->cmbuser();
      $kendaraan = $this->Pengemudi_model->cmbkendaraan();
      if ($row) {
         $data = array(
            'user_data'   => $user,
            'kendaraan_data'   => $kendaraan,
            'button' => 'Ubah',
            'action' => site_url('pengemudi/ubah_aksi'),
            'id' => set_value('id', $row->id),
            'id_user' => set_value('id_user', $row->id_user),
            'id_kendaraan' => set_value('id_kendaraan', $row->id_kendaraan),
            'title' => 'Ubah Data', // untuk judul
            'isi' => 'pengemudi/pengemudi_form'
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
      # code...
   }

   public function hapus($id)
   {
      $row = $this->Pengemudi_model->get_by_id($id);
      if ($row) {
         $this->Pengemudi_model->delete($id);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('pengemudi'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('pengemudi'));
      }
   }

   function kardek($id)
   {
      $pengemudi = $this->Pengemudi_model->kardek($id);
      $order = $this->Pengemudi_model->kardek_order($id);
      $data = array(
         'pengemudi_data' => $pengemudi,
         'order_data' => $order,
         'title' => 'Data Kardek',
         'isi'   => 'kardek/kardek_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   function cetak_kardek($id) // mencatat kardek
   {
      $pengemudi = $this->Pengemudi_model->kardek($id);
      $order = $this->Pengemudi_model->kardek_order($id);
      $data = array(
         'pengemudi_data' => $pengemudi,
         'order_data' => $order,
         'title' => 'Kartu Kardek',
         'isi'   => 'kardek/kardek_cetak'
      );
      $data['user'] = $this->session->userdata();
      // konfigurasi file pdf
      $html = $this->load->view('kardek/kardek_cetak', $data, TRUE);
      $mpdf = new \Mpdf\Mpdf([
         'mode' => 'utf-8',
         'format' => [210, 330] //ukuran F4
      ]);
      $mpdf->SetTitle('Kartu Kardek');
      $mpdf->WriteHTML($html);
      $nama_file = url_title('Kartu Kardek', 'dash', 'true') . '-' . $pengemudi->nama . '.pdf';
      $mpdf->Output($nama_file, 'I');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
      $this->form_validation->set_rules('id_kendaraan', 'id kendaraan', 'trim|required');

      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Pengemudi.php */
