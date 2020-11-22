<style type="text/css">
   .modal-dialog {
      width: 900px;
   }
</style>
<div class="row">
   <div class="col-xs-12">
      <!-- untuk pengemudi yang tidak aktif -->
      <?php if ($user['level'] == '2') { ?>
         <?php if ($status != "Aktif") { ?>
            <div class="callout callout-warning">
               <h4><i class="icon fa fa-warning"></i> Perhatian</h4>
               <p>Untuk anda yang terdapat tanda kuning ini, status anda sebagai pengemudi sudah tidak aktif. Jadi anda tidak bisa melakukan order pemeliharaan kembali. Terimakasih atas kerja sama anda selama ini.</p>
            </div>
         <?php } ?>
      <?php } ?>

      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">
            <?php if ($user['level'] == '2') { ?>
               <?php if ($status == 'Aktif') { ?>
                  <p>
                     <a href="<?= base_url('order/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                  </p>
               <?php } ?>
            <?php } ?>

            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <?php if ($user['level'] == '1') { ?>
                        <th>Pengemudi</th>
                     <?php } else { ?>
                        <th>Nomor Plat</th>
                        <th>Jenis Kendaraan</th>
                     <?php } ?>
                     <th>Jenis Order</th>
                     <th>Ket. Rusak</th>
                     <th>Tanggal Order</th>
                     <th>Tanggal Selesai</th>
                     <th>Verifikasi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($order_data as $order) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <?php if ($user['level'] == '1') { ?>
                           <td><?= $order->nama ?></td>
                        <?php } else { ?>
                           <td><?= $order->no_plat ?></td>
                           <td><?= $order->jenis_kendaraan ?></td>
                        <?php } ?>
                        <td><?= $order->jenis_order ?></td>
                        <td><?= $order->ket_rusak ?>
                           <a href="" class="view_data" data-toggle="modal" data-target="#modal-default" id="<?= $order->foto_order ?>">(
                              <i class="fa fa-info-circle"></i>)
                           </a>
                        </td>
                        <td><?= tgl_indo(($order->tgl_order)) ?></td>
                        <td>
                           <?php if (!$order->tgl_selesai) { ?>
                              <a href="#" class="btn btn-warning btn-sm disabled"> Belum Selesai</a>
                           <?php } elseif ($order->status == 'Ditolak') { ?>
                              <a href="#" class="btn btn-warning btn-sm disabled"> Batal Order</a>
                           <?php } else { ?>
                              <?= tgl_indo(($order->tgl_selesai)); ?>
                              <?= ''; ?>
                              <?php if ($user['level'] == '1') { ?>
                                 <a href="<?= base_url('order/detail/' . $order->id) ?>" title="Detail">(<i class="fa fa-info-circle"></i>) </a>
                              <?php } ?>
                           <?php } ?>
                        </td>
                        <td style="text-align:center">
                           <?php if ($order->status == 'Menunggu verifikasi') { ?>
                              <?php if ($user['level'] == '1') { ?>
                                 <a href="<?= base_url('order/verifikasi_setuju/' . $order->id) ?>" class="btn btn-success btn-sm" onClick="return confirm('Verifikasi order ini ?')"><i class="fa fa-check"></i> </a>
                                 <a href="<?= base_url('order/verifikasi_tolak/' . $order->id) ?>" class="btn btn-danger btn-sm" onClick="return confirm('Tolak order ini ?')"><i class="fa fa-close"></i></a>
                              <?php } else { ?>
                                 <a href="" class="btn btn-warning disabled"> Menunggu verifikasi</a>
                              <?php } ?>
                           <?php } elseif ($order->status == 'Disetujui') { ?>
                              <a href="" class="btn btn-success disabled"> Disetujui</a>
                           <?php } elseif ($order->status == 'Ditolak') { ?>
                              <a href="" class="btn btn-danger disabled"> Ditolak</a>
                           <?php } ?>
                        </td>

                     </tr>
                  <?php } ?>
               </tbody>
            </table>
            <!-- Modal Detail Order -->
            <div class="modal fade" id="modal-default">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Bukti Order</h4>
                     </div>
                     <div class="modal-body">
                        <div id="gambar" style="text-align: center;">

                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                     </div>
                  </div>
                  <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <script>
               $(document).ready(function() {
                  $('.view_data').click(function() {
                     var id = $(this).attr("id");
                     path = "assets/img/order/" + id;
                     document.getElementById("gambar").innerHTML = "<img src='" + path + "' width='700'>";
                  });
               });
            </script>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->