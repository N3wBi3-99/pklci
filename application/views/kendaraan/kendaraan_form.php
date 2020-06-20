<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
               <div class="form-horizontal">
                  <div class="box-body">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="int" class="col-sm-4 control-label">Nama Pemilik
                           </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" />
                              <?php echo form_error('nama_pemilik') ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="int" class="col-sm-4 control-label">Merk </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" value="<?php echo $merk; ?>" />
                              <?php echo form_error('merk') ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="int" class="col-sm-4 control-label">Jenis Kendaraan </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" placeholder="Jenis Kendaraan" value="<?php echo $jenis_kendaraan; ?>" />
                              <?php echo form_error('jenis_kendaraan') ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="int" class="col-sm-4 control-label">Tahun Pembuatan </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="tahun_pembuatan" id="tahun_pembuatan" placeholder="Tahun Pembuatan" value="<?php echo $tahun_pembuatan; ?>" />
                              <?php echo form_error('tahun_pembuatan') ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="int" class="col-sm-3 control-label">Nomor Plat </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="no_plat" id="no_plat" placeholder="Nomor Plat" value="<?php echo $no_plat; ?>" />
                              <?php echo form_error('no_plat') ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="int" class="col-sm-3 control-label">Nomor Rangka </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="no_rangka" id="no_rangka" placeholder="Nomor Rangka" value="<?php echo $no_rangka; ?>" />
                              <?php echo form_error('no_rangka') ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="int" class="col-sm-3 control-label">Nomor Mesin </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="no_mesin" id="no_mesin" placeholder="Nomor Mesin" value="<?php echo $no_mesin; ?>" />
                              <?php echo form_error('no_mesin') ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="int" class="col-sm-3 control-label">Nomor BPKB </label>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" name="no_bpkb" id="no_bpkb" placeholder="Nomor BPKB" value="<?php echo $no_bpkb; ?>" />
                              <?php echo form_error('no_bpkb') ?>
                           </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                     </div>
                  </div>
                  <div class="box-footer">
                     <a href="<?php echo site_url('kendaraan') ?>" class="btn btn-default">Batal</a>
                     <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
                  </div>
            </form>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->