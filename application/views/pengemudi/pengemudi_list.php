<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">

            <p>
               <a href="<?= base_url('pengemudi/tambah') ?>" class="btn btn-success"><i class="fa fa fa-plus"></i> Tambah Data</a>
            </p>

            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>NO</th>
                     <th>Kardek</th>
                     <th>Nama Pengemudi</th>
                     <th>No. Plat</th>
                     <th>Merk</th>
                     <th>Jenis Kendaraan</th>
                     <th>Status Pengemudi</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($pengemudi_data as $pengemudi) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td>
                           <a href="<?= base_url('pengemudi/kardek/' . $pengemudi->id) ?>" class="btn btn-primary" title="Hapus Data"><i class="fa fa-print"></i> Kardek</a>
                        </td>
                        <td><?= $pengemudi->nama ?></td>
                        <td><?= $pengemudi->no_plat ?></td>
                        <td><?= $pengemudi->merk ?></td>
                        <td><?= $pengemudi->jenis_kendaraan ?></td>
                        <td style="text-align: center">
                           <?php if ($pengemudi->status == 'Aktif') { ?>
                              <a href="<?= base_url('pengemudi/status_nonaktif/' . $pengemudi->id) ?>" class="btn btn-success btn-sm" onClick="return confirm('Nonaktifkan pengemudi ini ?')">Aktif</a>
                           <?php } else { ?>
                              <a href="" class="btn btn-danger disabled" onClick="return confirm('Aktifkan pengemudi ini ?')">Tidak Aktif</a>
                           <?php }  ?>
                        </td>
                        <td style="text-align:center" width="120px">
                           <a href="<?= base_url('pengemudi/read/' . $pengemudi->id) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-info-circle"></i> </a>
                           <?php
                           $sql = "SELECT * FROM `order` 
                           WHERE id_pengemudi = {$pengemudi->id}";
                           $cek_order = $this->db->query($sql)->row();
                           if (!$cek_order) { ?>
                              <a href="<?= base_url('pengemudi/ubah/' . $pengemudi->id) ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> </a>
                              <a href="<?= base_url('pengemudi/hapus/' . $pengemudi->id) ?>" class="btn btn-danger btn-sm" title="Hapus Data" onClick="return confirm('Hapus data pengemudi ?')"><i class="fa fa-trash"></i></a>
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