<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">

            <p>
               <a href="<?= base_url('kendaraan/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
            </p>

            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>NO</th>
                     <th>Nama Pemilik</th>
                     <th>No. Plat</th>
                     <th>Merk</th>
                     <th>Jenis Kendaraan</th>
                     <th>Tahun</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($kendaraan_data as $kendaraan) { ?>
                     <tr>
                        <td width="40px"><?= $no++ ?></td>
                        <td><?= $kendaraan->nama_pemilik ?></td>
                        <td><?= $kendaraan->no_plat ?></td>
                        <td><?= $kendaraan->merk ?></td>
                        <td><?= $kendaraan->jenis_kendaraan ?></td>
                        <td><?= $kendaraan->tahun_pembuatan ?></td>
                        <td style="text-align:center" width="120px">
                           <a href="<?= base_url('kendaraan/read/' . $kendaraan->id) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-info-circle"></i> </a>
                           <?php
                           $sql = "SELECT * FROM pengemudi WHERE id_kendaraan = {$kendaraan->id}";
                           $cek_kendaraan = $this->db->query($sql)->row();
                           if (!$cek_kendaraan) { ?>
                              <a href="<?= base_url('kendaraan/ubah/' . $kendaraan->id) ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> </a>
                              <a href="<?= base_url('kendaraan/hapus/' . $kendaraan->id) ?>" class="btn btn-danger btn-sm" title="Hapus Data" onClick="return confirm('Hapus data kendaraan ?')"><i class="fa fa-trash"></i></a>
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