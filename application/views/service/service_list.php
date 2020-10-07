<style type="text/css">
   .modal-dialog {
      width: 900px;
   }
</style>
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
                        <td>
                           <a href="" class="view_data" data-toggle="modal" data-target="#modal-service" id="<?= $service->foto_service ?>"> <img src="<?= base_url('assets/img/service/' . $service->foto_service) ?>" width="100" alt="foto_service">
                           </a>
                        </td>
                        <td>
                           <a href="" class="view_data" data-toggle="modal" data-target="#modal-nota" id="<?= $service->foto_nota ?>"><img src="<?= base_url('assets/img/nota/' . $service->foto_nota) ?>" width="100" alt="foto_nota">
                           </a>
                        </td>
                        <td style="text-align:center">
                           <a href="<?= base_url('service/read/' . $service->id) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-info-circle"></i> </a>
                           <a href="<?= base_url('service/update/' . $service->id) ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> </a>
                           <a href="<?= base_url('service/hapus/' . $service->id) ?>" class="btn btn-danger btn-sm" title="Hapus Data" onClick="return confirm('Hapus data service ?')"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>

            <!-- Modal Detail Service -->
            <div class="modal fade" id="modal-service">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Bukti Service</h4>
                     </div>
                     <div class="modal-body">
                        <div id="service" style="text-align: center;">

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

            <!-- Modal Detail Nota -->
            <div class="modal fade" id="modal-nota">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Bukti Nota</h4>
                     </div>
                     <div class="modal-body">
                        <div id="nota" style="text-align: center;">

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
                     path = "assets/img/service/" + id;
                     document.getElementById("service").innerHTML = "<img src='" + path + "' width='700'>";
                  });
               });
            </script>
            <script>
               $(document).ready(function() {
                  $('.view_data').click(function() {
                     var id = $(this).attr("id");
                     path = "assets/img/nota/" + id;
                     document.getElementById("nota").innerHTML = "<img src='" + path + "' width='700'>";
                  });
               });
            </script>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->