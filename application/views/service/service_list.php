<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">
            <?php if ($status == 'Disetujui' && !$tgl_selesai) { ?>
               <p>
                  <a href="<?= base_url('service/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
               </p>
            <?php } ?>

            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Tanggal Order</th>
                     <th>Nama Bengkel</th>
                     <th>Total</th>
                     <th>Tanggal Service</th>
                     <th>Foto Service</th>
                     <th>Foto Nota</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($service_data as $service) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?php echo date('d M Y', strtotime($service->tgl_order)) ?></td>
                        <td><?php echo $service->nama_bengkel ?></td>
                        <td><?php echo $service->total ?></td>
                        <td><?php echo date('d M Y', strtotime($service->tgl_service)) ?></td>
                        <td><a href="<?= base_url('assets/img/service/' . $service->foto_service) ?>"><img src="<?= base_url('assets/img/service/' . $service->foto_service) ?>" width="100" alt="foto_service"></a></td>

                        <td><img src="<?= base_url('assets/img/nota/' . $service->foto_nota) ?>" width="100" alt="foto_nota"></td>
                        <td style="text-align:center">
                           <a href="<?= base_url('service/read/' . $service->id) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-info-circle"></i> </a>
                           <a href="<?= base_url('service/update/' . $service->id) ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> </a>
                           <a href="<?= base_url('service/hapus/' . $service->id) ?>" class="btn btn-danger btn-sm" title="Hapus Data" onClick="return confirm('Hapus data service ?')"><i class="fa fa-trash"></i></a>
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