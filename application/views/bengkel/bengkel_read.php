<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">

            <table class="table table-striped">
               <tr>
                  <td>Nama Bengkel</td>
                  <td><?php echo $nama_bengkel; ?></td>
               </tr>
               <tr>
                  <td>Alamat</td>
                  <td><?php echo $alamat; ?></td>
               </tr>
               <tr>
                  <td>No Hp</td>
                  <td><?php echo $no_hp; ?></td>
               </tr>
            </table>
            <br>
            <p style="text-align: right"><a href="<?php echo site_url('bengkel') ?>" class="btn btn-default">Kembali</a></p>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->