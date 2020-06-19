<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">
            <?php if ($user['level'] == 'Admin') { ?>
               <p>
                  <a href="<?= base_url('bengkel/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
               </p>
            <?php } ?>

            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Bengkel</th>
                     <th>Alamat</th>
                     <th>Nomor HP</th>
                     <?php if ($user['level'] == 'Admin') { ?>
                        <th>Aksi</th>
                     <?php } ?>
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1;
                  foreach ($bengkel_data as $bengkel) { ?>
                     <tr>
                        <td width="40px"><?= $no++ ?></td>
                        <td><?= $bengkel->nama_bengkel ?></td>
                        <td><?= $bengkel->alamat ?></td>
                        <td><?= $bengkel->no_hp ?></td>
                        <?php if ($user['level'] == 'Admin') { ?>
                           <td style="text-align:center" width="120px">
                              <a href="<?= base_url('bengkel/read/' . $bengkel->id) ?>" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-info-circle"></i> </a>
                              <a href="<?= base_url('bengkel/ubah/' . $bengkel->id) ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-pencil"></i> </a>
                              <a href="<?= base_url('bengkel/hapus/' . $bengkel->id) ?>" class="btn btn-danger btn-sm" title="Hapus Data" onClick="return confirm('Hapus data bengkel ?')"><i class="fa fa-trash"></i></a>
                           </td>
                        <?php } ?>
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