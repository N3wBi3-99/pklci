<?php
function login($username, $password)
{ //untuk proses login
   $ci = get_instance();
   $ci->load->model('User_model');
   $user = $ci->User_model->login($username, $password);

   if ($user) { // usernya ada & cek password
      if (password_verify($password, $user['password'])) {
         $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'nama' => $user['nama'],
            'jenis_kelamin' => $user['jenis_kelamin'],
            'level' => $user['level'],
         ];
         $ci->session->set_userdata($data);
         if ($ci->session->userdata('level') == 'Pengemudi') {
            redirect('order');
         } else {
            redirect('dashboard');
         }
      } else {
         // password salah
         $ci->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"> Password salah!</i></div>'
         );
         redirect('auth');
      }
   } else {
      // akun tak ada
      $ci->session->set_flashdata(
         'message',
         '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"> Pengguna tidak terdaftar!</i></div>'
      );
      redirect('auth');
   }
}

function cek_login()
{ // untuk cek login
   $ci = get_instance();
   if (!$ci->session->userdata('username')) {
      redirect('auth');
   }
}

function cek_admin()
{ // untuk cek level
   $ci = get_instance();
   if (!$ci->session->userdata('username')) {
      redirect('auth');
   } elseif ($ci->session->userdata('level') != 'Admin') {
      redirect('auth/blocked');
   }
}

function anyar()
{
   $ci = get_instance();
   $ci->load->model('Order_model');
   $total = $ci->Order_model->total_order_baru();
   return $total;
}

function order_baru()
{
   $ci = get_instance();
   $ci->load->model('Order_model');
   $order = $ci->Order_model->order_baru();
   return $order;
}

function cmb_dinamis($name, $table, $field, $pk, $selected)
{ // digunakan untuk mengambil data yang dijoin
   $ci = get_instance();
   $cmb = "<select name='$name' class='form-control'>";
   $data = $ci->db->get($table)->result();
   foreach ($data as $d) {
      $cmb .= "<option value='" . $d->$pk . "'";
      $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
      $cmb .= ">" . strtoupper($d->$field) . "</option>";
   }
   $cmb .= "</select>";
   return $cmb;
}
