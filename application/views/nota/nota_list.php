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

               </tbody>
            </table>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->