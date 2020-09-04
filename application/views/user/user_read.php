<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body table-responsive">

            <table class="table table-striped">
               <tr>
                  <td>Nip</td>
                  <td><?php echo $nip; ?></td>
               </tr>
               <tr>
                  <td>Nama</td>
                  <td><?php echo $nama; ?></td>
               </tr>
               <tr>
                  <td>Tempat Lahir</td>
                  <td><?php echo $tempat_lahir; ?></td>
               </tr>
               <tr>
                  <td>Tanggal Lahir</td>
                  <td><?php echo date('d M Y', strtotime($tgl_lahir)); ?></td>
               </tr>
               <tr>
                  <td>Jenis Kelamin</td>
                  <td><?php echo $jenis_kelamin; ?></td>
               </tr>
               <tr>
                  <td>No Hp</td>
                  <td><?php echo $no_hp; ?></td>
               </tr>
               <tr>
                  <td>Alamat</td>
                  <td><?php echo $alamat; ?></td>
               </tr>
               <tr>
                  <td>Username</td>
                  <td><?php echo $username; ?></td>
               </tr>
               <tr>
                  <td>Password</td>
                  <td>⁕⁕⁕⁕⁕⁕⁕⁕</td>
               </tr>
               <tr>
                  <td>Level</td>
                  <td><?php echo $level; ?></td>
               </tr>
            </table>
            <br>
            <p style="text-align: right"><a href="<?php echo site_url('user') ?>" class="btn btn-default">Kembali</a></p>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->