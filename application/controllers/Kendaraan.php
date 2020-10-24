<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Kendaraan_model');
   }

   public function index()
   {
      // untuk detail kendaraan di pengemudi
      if ($this->session->userdata('level') == 'Pengemudi') {
         $user = $this->session->userdata();
         $iduser = $user['id']; // mengambil id user
         $array = $this->Kendaraan_model->detail($iduser); // di proses untuk mengambil id kendaraan
         // $id = implode($array); // convert array to string
         $this->read($array['id']); // dapat id kendaraan
         // echo "<pre>";
         // print_r($array['id']);
         // exit;
      }

      $kendaraan = $this->Kendaraan_model->list();
      $data = array(
         'kendaraan_data' => $kendaraan,
         'title' => 'Data Kendaraan',
         'isi'   => 'kendaraan/kendaraan_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function tambah()
   {
      cek_admin();
      $data = [
         'button' => 'Tambah',
         'action' => site_url('kendaraan/tambah_aksi'),
         'id' => set_value('id'),
         'nama_pemilik' => set_value('nama_pemilik'),
         'merk' => set_value('merk'),
         'jenis_kendaraan' => set_value('jenis_kendaraan'),
         'tahun_pembuatan' => set_value('tahun_pembuatan'),
         'no_plat' => set_value('no_plat'),
         'no_rangka' => set_value('no_rangka'),
         'no_mesin' => set_value('no_mesin'),
         'no_bpkb' => set_value('no_bpkb'),
         'title' => 'Tambah Data',
         'isi'   => 'kendaraan/kendaraan_form'
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
            'nama_pemilik' => $this->input->post('nama_pemilik', TRUE),
            'merk' => $this->input->post('merk', TRUE),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan', TRUE),
            'tahun_pembuatan' => $this->input->post('tahun_pembuatan', TRUE),
            'no_plat' => $this->input->post('no_plat', TRUE),
            'no_rangka' => $this->input->post('no_rangka', TRUE),
            'no_mesin' => $this->input->post('no_mesin', TRUE),
            'no_bpkb' => $this->input->post('no_bpkb', TRUE),
         );

         $this->Kendaraan_model->insert($data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('kendaraan'));
      }
   }

   public function ubah($id)
   {
      $row = $this->Kendaraan_model->get_by_id($id);
      if ($row) {
         $data = array(
            'button' => 'Ubah',
            'action' => site_url('kendaraan/ubah_aksi'),
            'id' => set_value('id', $row->id),
            'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
            'merk' => set_value('merk', $row->merk),
            'jenis_kendaraan' => set_value('jenis_kendaraan', $row->jenis_kendaraan),
            'tahun_pembuatan' => set_value('tahun_pembuatan', $row->tahun_pembuatan),
            'no_plat' => set_value('no_plat', $row->no_plat),
            'no_rangka' => set_value('no_rangka', $row->no_rangka),
            'no_mesin' => set_value('no_mesin', $row->no_mesin),
            'no_bpkb' => set_value('no_bpkb', $row->no_bpkb),
            'title' => 'Ubah Data', // untuk judul
            'isi' => 'kendaraan/kendaraan_form'
         );
         $data['user'] = $this->session->userdata();
         $this->load->view('layout/wrapper', $data);
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('kendaraan'));
      }
   }

   public function ubah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->ubah($this->input->post('id', TRUE));
      } else {
         $data = array(
            'nama_pemilik' => $this->input->post('nama_pemilik', TRUE),
            'merk' => $this->input->post('merk', TRUE),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan', TRUE),
            'warna' => $this->input->post('warna', TRUE),
            'tahun_pembuatan' => $this->input->post('tahun_pembuatan', TRUE),
            'no_plat' => $this->input->post('no_plat', TRUE),
            'no_rangka' => $this->input->post('no_rangka', TRUE),
            'no_mesin' => $this->input->post('no_mesin', TRUE),
            'no_bpkb' => $this->input->post('no_bpkb', TRUE),
         );

         $this->Kendaraan_model->update($this->input->post('id', TRUE), $data);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('kendaraan'));
      }
   }

   public function hapus($id)
   {
      $row = $this->Kendaraan_model->get_by_id($id);
      if ($row) {
         $this->Kendaraan_model->delete($id);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('kendaraan'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('kendaraan'));
      }
   }

   public function read($id)
   {
      $row = $this->Kendaraan_model->get_by_id($id);
      if ($row) {
         $data = array(
            'id' => $row->id,
            'nama_pemilik' => $row->nama_pemilik,
            'merk' => $row->merk,
            'jenis_kendaraan' => $row->jenis_kendaraan,
            'tahun_pembuatan' => $row->tahun_pembuatan,
            'no_plat' => $row->no_plat,
            'no_rangka' => $row->no_rangka,
            'no_mesin' => $row->no_mesin,
            'no_bpkb' => $row->no_bpkb,
            'title' => 'Detail Kendaraan', // untuk judul
            'isi' => 'kendaraan/kendaraan_read'
         );
         $data['user'] = $this->session->userdata();
         $this->load->view('layout/wrapper', $data);
      }
   }
   public function _rules()
   {
      $this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
      $this->form_validation->set_rules('merk', 'merk', 'trim|required');
      $this->form_validation->set_rules('jenis_kendaraan', 'jenis kendaraan', 'trim|required');
      $this->form_validation->set_rules('tahun_pembuatan', 'tahun pembuatan', 'trim|required');
      $this->form_validation->set_rules('no_plat', 'no plat', 'trim|required');
      $this->form_validation->set_rules('no_rangka', 'no rangka', 'trim|required');
      $this->form_validation->set_rules('no_mesin', 'no mesin', 'trim|required');
      $this->form_validation->set_rules('no_bpkb', 'no bpkb', 'trim|required');

      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}

/* End of file Kendaraan.php */
