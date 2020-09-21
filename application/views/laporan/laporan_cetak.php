<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Pengemudi</th>
                     <th>Nomor Kendaraan</th>
                     <th>Tanggal Order</th>
                     <th>Tanggal Selesai</th>
                     <th>Service</th>
                     <th>jumlah</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($service_data as $id_pengemudi => $service) {
                     if ($service) {
                        foreach ($service as $key => $value) {
                           $sql = "SELECT user.nama, kendaraan.no_plat 
                                FROM pengemudi 
                                JOIN `user` on pengemudi.id_user = `user`.id 
                                JOIN kendaraan ON pengemudi.id_kendaraan = kendaraan.id
                                WHERE pengemudi.id = {$id_pengemudi}";
                           $pengemudi = $this->db->query($sql)->row();
                           // echo "<pre>";
                           // print_r($pengemudi);
                           // exit;
                  ?>
                           <tr>
                              <td width="30px"><?= $no++ ?></td>

                              <td><?= $pengemudi->nama ?></td>
                              <td><?= $pengemudi->no_plat ?></td>
                              <?php

                              ?>
                              <td><?= tgl_indo($value->tgl_order) ?></td>
                              <td><?= tgl_indo($value->tgl_selesai) ?></td>
                              <td><?= $value->nama_barang ?></td>
                              <td><?= $value->total ?></td>
                           <?php
                        }
                           ?>
                           </tr>
                     <?php
                     }
                  }
                     ?>
               </tbody>
               <tfoot>

               </tfoot>
            </table>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->