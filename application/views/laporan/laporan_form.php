<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <?= $this->session->flashdata('message'); ?>
         <div class="box-body table-responsive">
            <h3 style="text-align: center">Cetak Laporan</h3>

            <form action="<?php echo $action; ?>" method="post" target="_blank">
               <!-- Date range -->
               <div class="form-group">
                  <label>Pada Tanggal:</label>
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" class="form-control pull-right" id="reservation" name="range">
                  </div>
                  <!-- /.input group -->
               </div>
               <!-- /.form group -->
               <button type="submit" class="btn btn-primary pull-right" id="range"><i class="fa fa-print"></i> Cetak</button>
            </form>
         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->