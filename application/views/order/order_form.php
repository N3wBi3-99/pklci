<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">

            <?= form_open_multipart($action); ?>
            <div class="form-horizontal">
               <div class="box-body">
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Jenis Order </label>
                     <div class="col-sm-5">
                        <select name="jenis_order" class="form-control select2">
                           <option value="">Pilih Jenis Order</option>
                           <option value="Ringan" <?= $jenis_order == 'Ringan' ? 'selected' : '' ?>>Ringan</option>
                           <option value="Sedang" <?= $jenis_order == 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                           <option value="Berat" <?= $jenis_order == 'Berat' ? 'selected' : '' ?>>Berat</option>
                        </select>
                        <?php echo form_error('jenis_order') ?>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Keterangan Rusak</label>
                     <div class="col-sm-5">
                        <textarea class="form-control" rows="3" name="ket_rusak" id="ket_rusak" placeholder="Keterangan Rusak"><?php echo $ket_rusak; ?></textarea>
                        <?php echo form_error('ket_rusak') ?>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="foto_order" class="col-sm-4 control-label">Foto Order </label>
                     <div class="col-sm-5">
                        <input type="file" id="foto_order" name="foto_order">
                        <?php echo form_error('foto_order') ?>
                     </div>
                  </div>
                  <input type="hidden" name="id_pengemudi" value="<?php echo $pengemudi['id']; ?>" />
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
               </div>
               <div class="box-footer">
                  <a href="<?php echo site_url('order') ?>" class="btn btn-default">Batal</a>
                  <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
               </div>
               </form>

            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->