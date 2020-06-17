<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">

            <div class="form-horizontal">
               <div class="box-body">
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Nama Pengguna <?php echo form_error('id_user') ?></label>
                     <div class="col-sm-5">
                        <select name="id_user" class="form-control select2">
                           <option value="">Pilih Nama Pengguna</option>
                           <?php foreach ($user_data as $user) { ?>
                              <option value="<?= $user->id ?>"><?= $user->nama ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Nomor Plat <?php echo form_error('id_kendaraan') ?></label>
                     <div class="col-sm-5">
                        <select name="id_order" class="form-control select2">
                           <option value="">Pilih Nomor Plat</option>
                           <?php foreach ($kendaraan_data as $kendaraan) { ?>
                              <option value="<?= $kendaraan->id ?>"><?= $kendaraan->no_plat ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
               </div>
               <div class="box-footer">
                  <a href="<?php echo site_url('pengemudi') ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
               </div>
               </form>

            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->