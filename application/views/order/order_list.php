<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body">
            <?php if ($user['level'] == 'Pengemudi') { ?>
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
                     <?php if ($user['level'] == 'Admin') { ?>
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
                        <?php if ($user['level'] == 'Admin') { ?>
                           <td><?= $order->nama ?></td>
                        <?php } else { ?>
                           <td><?= $order->no_plat ?></td>
                           <td><?= $order->jenis_kendaraan ?></td>
                        <?php } ?>
                        <td><?= $order->jenis_order ?></td>
                        <td><?= $order->ket_rusak ?></td>
                        <td><?= date('d M Y', strtotime($order->tgl_order)) ?></td>
                        <td>
                           <?php if (!$order->tgl_selesai) { ?>
                              <a href="#" class="btn btn-warning btn-sm disabled"> Belum Selesai</a>
                           <?php } elseif ($order->status == 'Ditolak') { ?>
                              <a href="#" class="btn btn-warning btn-sm disabled"> Batal Order</a>
                           <?php } else { ?>
                              <?= date('d M Y', strtotime($order->tgl_order)); ?>
                              <?= ''; ?>
                              <?php if ($user['level'] == 'Admin') { ?>
                                 <a href="<?= base_url('order/read/' . $order->id) ?>" title="Detail">(<i class="fa fa-info-circle"></i>) </a>
                              <?php } ?>
                           <?php } ?>
                        </td>
                        <td style="text-align:center">
                           <?php if ($order->status == 'Menunggu verifikasi') { ?>
                              <?php if ($user['level'] == 'Admin') { ?>
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
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->