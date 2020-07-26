<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body table-responsive">
            <?= $this->session->flashdata('message'); ?>

            <p>
               <a href="<?= base_url('user/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
            </p>

            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>NIP</th>
                     <th>Nama Lengkap</th>
                     <th>Alamat</th>
                     <th>Jenis Kelamin</th>
                     <th>Nomor Hp</th>
                     <th>Level</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($user_data as $user) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $user->nip ?></td>
                        <td><?= $user->nama ?></td>
                        <td><?= $user->alamat ?></td>
                        <td><?= $user->jenis_kelamin ?></td>
                        <td><?= $user->no_hp ?></td>
                        <td><?= $user->level ?></td>
                        <td style="text-align:center">
                           <a href="<?= base_url('user/read/' . $user->id) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-info-circle"></i> </a>
                           <?php
                           $sql = "SELECT * FROM pengemudi WHERE id_user = {$user->id}";
                           $cek_user = $this->db->query($sql)->row();
                           if (!$cek_user) { ?>
                              <a href="<?= base_url('user/ubah/' . $user->id) ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> </a>
                              <a href="<?= base_url('user/hapus/' . $user->id) ?>" class="btn btn-danger btn-sm" title="Hapus Data" onClick="return confirm('Hapus data user ?')"><i class="fa fa-trash"></i></a>
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