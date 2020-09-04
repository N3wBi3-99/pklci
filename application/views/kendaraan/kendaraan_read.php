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
                  <td><?php echo date('Y', strtotime($tahun_pembuatan)); ?></td>
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
               <tr>
                  <td>No Bpkb</td>
                  <td><?php echo $no_bpkb; ?></td>
               </tr>
            </table>
            <br>
            <p style="text-align: right"><a href="<?php echo site_url('kendaraan') ?>" class="btn btn-default">Kembali</a></p>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->