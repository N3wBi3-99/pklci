<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">

            <form action="<?php echo $action; ?>" method="post">
               <div class="form-horizontal">
                  <div class="box-body">
                     <div class="form-group">
                        <label for="int" class="col-sm-4 control-label">Nama Bengkel </label>
                        <div class="col-sm-5">
                           <input type="text" class="form-control" name="nama_bengkel" id="nama_bengkel" placeholder="Nama Bengkel" value="<?php echo $nama_bengkel; ?>" />
                           <?php echo form_error('nama_bengkel') ?>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="int" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-5">
                           <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                           <?php echo form_error('alamat') ?>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="int" class="col-sm-4 control-label">Nomor HP </label>
                        <div class="col-sm-5">
                           <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP" value="<?php echo $no_hp; ?>" />
                           <?php echo form_error('no_hp') ?>
                        </div>
                     </div>
                     <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  </div>
                  <div class="box-footer">
                     <a href="<?php echo site_url('bengkel') ?>" class="btn btn-default">Batal</a>
                     <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
                  </div>
            </form>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->