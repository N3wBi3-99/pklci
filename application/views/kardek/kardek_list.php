<div class="row">
   <div class="col-xs-12">
      <div class="box box-solid"><br>
         <div class="box-header with-border">
            <table width="100%">
               <tr>
                  <td style="text-align:center">
                     <h4><b>PEMERINTAHAN KABUPATEN KUDUS</b></h4>
                  </td>
               </tr>
               <tr>
                  <td style="text-align:center">
                     <b>DINAS PERUMAHAN KAWASAN PERMUKIMAN DAN LINGKUNGAN HIDUP</b>
                  </td>
               </tr>
               <tr>
                  <td style="text-align:center"><br> </td>
               </tr>
               <tr>
                  <td style="text-align:center"><b><u>KARTU SERVICE KENDARAAN</u></b></td>
               </tr>
            </table>
         </div>
         <div class="box-body">
            <br>
            <!-- untuk data pengemudi -->
            <div class="col-xs-6">
               <table class="table table-bordered">
                  <tr>
                     <td width="40%">Jenis Kendaraan</td>
                     <td width="5%">: </td>
                     <td> <?= $pengemudi_data->jenis_kendaraan ?></td>
                  </tr>
                  <tr>
                     <td>Merk</td>
                     <td>:</td>
                     <td><?= $pengemudi_data->merk ?></td>
                  </tr>
                  <tr>
                     <td>Tahun Pembuatan</td>
                     <td>:</td>
                     <td><?= $pengemudi_data->tahun_pembuatan ?></td>
                  </tr>
                  <tr>
                     <td>Nomor Kendaraan</td>
                     <td>:</td>
                     <td><?= $pengemudi_data->no_plat ?></td>
                  </tr>
                  <tr>
                     <td>Pengemudi</td>
                     <td>:</td>
                     <td><?= $pengemudi_data->nama ?></td>
                  </tr>
                  <tr>
                     <td>Nomor HP</td>
                     <td>:</td>
                     <td><?= $pengemudi_data->no_hp ?></td>
                  </tr>
               </table>
            </div>
            <br>
            <br>
            <br>
            <h1 style="text-align: center;">
               <?= date('Y'); ?>
            </h1>

            <!-- untuk data Order -->
            <div class="col-xs-12">
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Tanggal Order</th>
                        <th>Order Kerusakan</th>
                        <th>Tanggal Selesai</th>
                        <th>Paraf</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($order_data as $order) { ?>
                        <tr>
                           <td width="40px"><?= $no++ ?></td>
                           <td><?= tgl_indo(($order->tgl_order)) ?></td>
                           <td><?= $order->ket_rusak ?></td>
                           <td><?php if (!$order->tgl_selesai) { ?>
                                 <a href="#" class="btn btn-warning btn-sm disabled"> Belum Selesai</a>
                              <?php } elseif ($order->status == 'Ditolak') { ?>
                                 <a href="#" class="btn btn-warning btn-sm disabled"> Batal Order</a>
                              <?php } else { ?>
                                 <?= tgl_indo(($order->tgl_order)); ?>
                              <?php } ?>
                           </td>
                           <td style="text-align:center" width="120px">

                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- /.box-body -->
         <div class="box-footer with-border">
            <div class="col-xs-12">
               <a href="<?php echo site_url('pengemudi') ?>" class="btn btn-default" style="margin-right: 5px;">Kembali</a>
               <a href="<?php echo site_url('pengemudi/cetak_kardek/' .  $this->uri->segment(3)) ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
               <button type="button" class="btn btn-success pull-right">
                  <i class="fa fa-file-text-o"></i> Total biaya service
               </button>
               <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Generate PDF
               </button>
            </div>
         </div>
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->