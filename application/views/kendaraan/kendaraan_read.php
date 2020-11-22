<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">

            <table class="table table-striped">
               <tr>
                  <td>Nama Pemilik</td>
                  <td><?php echo $nama_pemilik; ?></td>
               </tr>
               <tr>
                  <td>Merk</td>
                  <td><?php echo $merk; ?></td>
               </tr>
               <tr>
                  <td>Jenis Kendaraan</td>
                  <td><?php echo $jenis_kendaraan; ?></td>
               </tr>
               <tr>
                  <td>Tahun Pembuatan</td>
                  <td><?php echo $tahun_pembuatan; ?></td>
               </tr>
               <tr>
                  <td>No Plat</td>
                  <td><?php echo $no_plat; ?></td>
               </tr>
               <tr>
                  <td>No Rangka</td>
                  <td><?php echo $no_rangka; ?></td>
               </tr>
               <tr>
                  <td>No Mesin</td>
                  <td><?php echo $no_mesin; ?></td>
               </tr>
            </table>
            <?php
            if ($user['level'] == '1') { ?>
               <br>
               <p style="text-align: right"><a href="<?php echo site_url('kendaraan') ?>" class="btn btn-default">Kembali</a></p>
            <?php } ?>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->