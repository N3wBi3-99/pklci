<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Laporan_model');
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
         $pengemudi = $this->Laporan_model->get_pengemudi();
         $range = $this->input->post('range', TRUE); // mendapatkan tgl dari inputan laporan
         $d = str_replace('-', ',', $range); //menghapus tanda -
         $d = str_replace(' ', '', $d); // menghapus spasi
         $array = explode(',', $d); // merubah menjadi array
         $firstdate = date("Y-m-d", strtotime($array[0]));
         $lastdate = date("Y-m-d", strtotime($array[1]));
         foreach ($pengemudi as $key => $value) {
            $service[$value->id_pengemudi] = $this->Laporan_model->list($value->id_pengemudi, $firstdate, $lastdate); // mengirimkan data untuk menampilkan setiap pengemudi
         }
         $data = array(
            'service_data' => $service,
            'title' => 'Laporan Biaya Pemeliharaan',
            'isi'   => 'laporan/laporan_cetak'
         );
         // $this->session->set_flashdata('message', '<script>toastr.success("Laporan Berhasil Dicetak");</script>');
         $data['user'] = $this->session->userdata();
         // konfigurasi file pdf
         $html = $this->load->view('laporan/laporan_cetak', $data, TRUE);
         $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [210, 330] //ukuran F4
         ]);
         $mpdf->SetTitle('Laporan Biaya Pemeliharaan');
         $mpdf->WriteHTML($html);
         $nama_file = url_title('Laporan Biaya Pemeliharaan', 'dash', 'true') . '-' . tgl_indo($firstdate) . '-' . 'Sampai' . '-' . tgl_indo($lastdate) . '.pdf';
         $mpdf->Output($nama_file, 'I');
      }
   }

   public function _rules()
   {
      $this->form_validation->set_rules('range', 'Range', 'trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Laporan.php */
