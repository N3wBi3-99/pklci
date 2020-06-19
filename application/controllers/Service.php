<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Service_model');
      $this->load->model('Nota_model');
      $this->load->model('Order_model');
   }

   public function index()
   {
      $cek = $this->Service_model->cek_order();
      $service = $this->Service_model->get_pengemudi();
      $data = array(
         // untuk cek order
         'status' => $cek['status'],
         'tgl_selesai' => $cek['tgl_selesai'],
         // sampai sini
         'service_data' => $service,
         'title' => 'Data Service',
         'isi'   => 'service/service_list'
      );
      $data['user'] = $this->session->userdata();
      $this->load->view('layout/wrapper', $data);
   }

   public function tambah()
   {
      $order = $this->Service_model->cmborder();
      $bengkel = $this->Service_model->cmbbengkel();
      $data = array(
         'order_data'   => $order,
         'bengkel_data'   => $bengkel,
         'button' => 'Tambah',
         'action' => site_url('service/tambah_aksi'),
         'id' => set_value('id'),
         'id_order' => set_value('id_order'),
         'id_bengkel' => set_value('id_bengkel'),
         'total' => set_value('total'),
         'tgl_service' => set_value('tgl_service'),
         'foto_service' => set_value('foto_service'),
         'foto_nota' => set_value('foto_nota'),
         'title' => 'Tambah Data', // untuk judul
         'isi' => 'service/service_form'
      );
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
            'id_order' => $this->input->post('id_order', TRUE),
            'id_bengkel' => $this->input->post('id_bengkel', TRUE),
            'total' => $this->input->post('total', TRUE),
            'tgl_service' => $this->input->post('tgl_service', TRUE),
         );
         $tambah = $this->Service_model->insert($data);
         $id = $this->db->insert_id();

         // untuk tambah foto service
         $upload_service = $_FILES['foto_service'];
         if ($upload_service) {
            $config_service['allowed_types'] = 'gif|jpg|png';
            $config_service['max_size']     = '4096';
            $config_service['upload_path'] = './assets/img/service/';
            $config_service['file_name'] = $id . '_service';

            $this->load->library('upload', $config_service);
            if ($this->upload->do_upload('foto_service')) {
               $new_service = $this->upload->data('file_name');
               // $this->db->set('foto_service', $new_service);
               $data = [
                  'foto_service' => $new_service
               ];
               $this->Service_model->update($id, $data);
            } else {
               echo $this->upload->display_errors();
            }
         } // sampai sini

         // untuk tambah foto nota
         $upload_nota = $_FILES['foto_nota'];
         if ($upload_nota) {
            $config_nota['allowed_types'] = 'gif|jpg|png';
            $config_nota['max_size']     = '4096';
            $config_nota['upload_path'] = './assets/img/nota/';
            $config_nota['file_name'] = $id . '_nota';

            $this->upload->initialize($config_nota);
            if ($this->upload->do_upload('foto_nota')) {
               $new_nota = $this->upload->data('file_name');
               // $this->db->set('foto_nota', $new_nota);
               $data = [
                  'foto_nota' => $new_nota
               ];
               $this->Service_model->update($id, $data);
            } else {
               echo $this->upload->display_errors();
            }
         } // sampai sini

         // untuk update tgl_selesai order
         $id_order = $this->input->post('id_order', TRUE);
         if ($id_order) {
            $data = [
               'tgl_selesai' => date('Y-m-d'),
            ];
            $this->db->where('id', $id_order);
            $this->db->update('order', $data);
         }

         // tambah barang untuk nota (form dinamis)
         foreach ($_POST['rows'] as $key => $val) {
            $jumlah = $this->input->post('harga_satuan' . $val) * $this->input->post('banyak' . $val);
            $data = array(
               'id_service' => $id,
               'nama_barang' => $this->input->post('nama_barang' . $val, TRUE),
               'harga_satuan' => $this->input->post('harga_satuan' . $val, TRUE),
               'banyak_barang' => $this->input->post('banyak' . $val, TRUE),
               'jumlah' => $jumlah,
            );
            $this->Nota_model->insert($data);
         }
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Ditambahkan");</script>');
         redirect(site_url('service'));
      }
   }

   public function hapus($id)
   {
      $row = $this->Service_model->get_by_id($id);
      if ($row) {
         $this->Service_model->delete($id);
         $this->session->set_flashdata('message', '<script>toastr.success("Data Berhasil Dihapus");</script>');
         redirect(site_url('service'));
      } else {
         $this->session->set_flashdata('message', 'Record Not Found');
         redirect(site_url('service'));
      }
   }

   public function _rules()
   {
      $this->form_validation->set_rules('id_order', 'id order', 'trim|required');
      $this->form_validation->set_rules('id_bengkel', 'id bengkel', 'trim|required');
      $this->form_validation->set_rules('total', 'total', 'trim|required');
      $this->form_validation->set_rules('tgl_service', 'tgl service', 'trim|required');
      $this->form_validation->set_rules('foto_service', 'foto service', 'trim');
      $this->form_validation->set_rules('foto_nota', 'foto nota', 'trim');

      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}
   
   /* End of file Service.php */
