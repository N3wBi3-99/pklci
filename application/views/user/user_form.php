<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">
            <?php if ($user['level'] == '1') { ?>
               <form action="<?php echo $action; ?>" method="post">
               <?php } else { ?>
                  <form action="<?= base_url('user/ubah_aksi'); ?>" method="post">
                  <?php } ?>
                  <div class="form-horizontal">
                     <div class="box-body">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="int" class="col-sm-3 control-label">Nip </label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" maxlength="18" onkeypress="return hanyaAngka(event)" />
                                 <?php echo form_error('nip') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="varchar" class="col-sm-3 control-label">Nama </label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                 <?php echo form_error('nama') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="varchar" class="col-sm-3 control-label">Tempat Lahir </label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                                 <?php echo form_error('tempat_lahir') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="date" class="col-sm-3 control-label">Tanggal Lahir </label>
                              <div class="col-sm-8">
                                 <div class="input-group date">
                                    <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="tgl_lahir" id="datepicker" placeholder="Tanggal Lahir" value="<?= $tgl_lahir; ?>" />
                                    <?php echo form_error('tgl_lahir') ?>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="varchar" class="col-sm-3 control-label"> Jenis Kelamin </label>
                              <div class="col-sm-8">
                                 <input type="radio" name="jenis_kelamin" class="minimal" value="Laki-laki" <?= $jenis_kelamin == 'Laki-laki' ? 'checked' : '' ?> /> Laki-laki<br>
                                 <input type="radio" name="jenis_kelamin" class="minimal" value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'checked' : '' ?> /> Perempuan
                                 <?php echo form_error('jenis_kelamin') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="text" class="col-sm-3 control-label">No Hp </label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" maxlength="15" onkeypress="return hanyaAngka(event)" />
                                 <?php echo form_error('no_hp') ?>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="alamat" class="col-sm-2 control-label">Alamat </label>
                              <div class="col-sm-8">
                                 <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                                 <?php echo form_error('alamat') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="varchar" class="col-sm-2 control-label">Username </label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                                 <?php echo form_error('username') ?>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="varchar" class="col-sm-2 control-label">Password </label>
                              <div class="col-sm-8">
                                 <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                                 <?php echo form_error('password') ?>
                              </div>
                           </div>
                           <?php if ($user['level'] == '1') { ?>
                              <?php if ($id_user_level == '1') { ?>
                                 <input type="hidden" name="id_user_level" value="1" />
                              <?php } elseif (!$id_user_level) { ?>
                                 <input type="hidden" name="id_user_level" value="2" />
                              <?php } else { ?>
                                 <input type="hidden" name="id_user_level" value="2" />
                              <?php } ?>
                           <?php } else { ?>
                              <input type="hidden" name="id_user_level" value="2" />
                           <?php } ?>
                           <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        </div>
                     </div>
                     <div class="box-footer">
                        <?php if ($user['level'] == '1') { ?>
                           <a href="<?php echo site_url('user') ?>" class="btn btn-default">Batal</a>
                           <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
                        <?php } else { ?>
                           <a href="<?php echo site_url('order') ?>" class="btn btn-default">Batal</a>
                           <button type="submit" class="btn btn-primary pull-right">Ubah</button>
                        <?php } ?>
                     </div>
                  </form>

                  <script>
                     function hanyaAngka(evt) {
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                           return false;
                        return true;
                     }
                  </script>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->