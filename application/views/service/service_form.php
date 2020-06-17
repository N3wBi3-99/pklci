<script>
   function minn(id) {
      var harga_satuan = $("#harga_satuan" + id).val();
      var banyak = $("#banyak" + id).val();
      var jumlah = harga_satuan * banyak;
      $("#jumlah" + id).val(jumlah);
      var tot = 0;
      var arr = document.getElementsByName("jumlah");
      for (var i = 0; i < arr.length; i++) {
         if (parseInt(arr[i].value)) {
            tot += parseInt(arr[i].value);
            // console.log(arr);
         }
      }
      $("#total").val(tot);
   }

   function tambah_barang() {
      var idf = document.getElementById('idf').value;
      var stre;
      stre = "<div id='srow" + idf +
         "'><div class='form-inline' style='margin:auto; width:90%'> <input type='text' name='nama_barang" + idf +
         "' class='form-control form-control-sm' maxlength='20' id='nama_barang" + idf +
         "' required placeholder='Nama Barang'>&nbsp;&nbsp;&nbsp; <input type='number' min='0' name='harga_satuan" + idf +
         "' class='form-control form-control-sm' maxlength='20' id='harga_satuan" + idf +
         "' min='0' required placeholder='Harga Satuan'>&nbsp;&nbsp;&nbsp; <input type='number' min='0' name='banyak" + idf +
         "' id='banyak" + idf +
         "' class='form-control form-control-sm' maxlength='50' required placeholder='QTY' onkeyup='minn(" + idf + ")'>&nbsp;&nbsp;&nbsp; <input type='number' name='jumlah' id='jumlah" + idf +
         "' class='form-control form-control-sm'  rows='4' maxlength='50' required placeholder='jumlah' readonly>&nbsp;&nbsp;&nbsp; <button type='button' class='btn btn-danger btn-sm' onclick='hapusElemen(\"srow" + idf + "\"); return false;'>Hapus</button><input type='hidden' name='rows[]' value='" + idf +
         "'></div></div><br>";

      $("#divbarang").append(stre);
      idf = (idf - 1) + 2;
      document.getElementById("idf").value = idf;
   }

   function hapusElemen(idf) {
      $('#' + idf).remove();
      // console.log(idf);
   }
</script>
<div class="row">
   <div class="col-xs-12">
      <div class="box box-info">
         <!-- /.box-header -->
         <div class="box-body">

            <?= form_open_multipart($action); ?>

            <div class="form-horizontal">
               <input type="hidden" name="" value="1" id="idf">
               <div class="box-body">
                  <!-- ini untuk menambah data service -->
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Kartu Order (Tgl Order) <?php echo form_error('id_order') ?></label>
                     <?php if ($id_order) {  ?>
                        <div class="col-sm-5">
                           <input type="hidden" class="form-control" name="id_order" value="<?= $id_order; ?>" readonly />
                           <input type="text" class="form-control" name="tgl_order" value="<?= date('d M Y', strtotime($tgl_order)); ?>" readonly />
                        </div>
                     <?php } else { ?>
                        <div class="col-sm-5">
                           <select name="id_order" class="form-control select2">
                              <option value="">Pilih Kartu Order(tgl order)</option>
                              <?php foreach ($order_data as $order) { ?>
                                 <option value="<?= $order->id ?>"><?= date('d M Y', strtotime($order->tgl_order)) ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     <?php } ?>
                  </div>
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Nama Bengkel <?php echo form_error('id_bengkel') ?></label>
                     <div class="col-sm-5">
                        <select name="id_bengkel" class="form-control select2">
                           <option value="">Pilih Bengkel</option>
                           <?php foreach ($bengkel_data as $bengkel) { ?>
                              <option value="<?= $bengkel->id ?>"><?= $bengkel->nama_bengkel ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Nomor Nota <?php echo form_error('no_nota') ?></label>
                     <div class="col-sm-5">
                        <input type="text" class="form-control" name="no_nota" id="no_nota" placeholder="Nomor Nota" value="<?php echo $no_nota; ?>" />
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="date" class="col-sm-4 control-label">Tanggal Service <?php echo form_error('tgl_service') ?></label>
                     <div class="col-sm-5">
                        <div class="input-group date">
                           <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                           </div>
                           <input type="text" class="form-control pull-right" name="tgl_service" id="datepicker" placeholder="Tanggal Service" value="<?= $tgl_service; ?>" />
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="int" class="col-sm-4 control-label">Total <?php echo form_error('total') ?></label>
                     <div class="col-sm-5">
                        <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" readonly />
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="foto_service" class="col-sm-4 control-label">Foto Service <?php echo form_error('foto_service') ?></label>
                     <div class="col-sm-5">
                        <input type="file" id="foto_service" name="foto_service">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="foto_nota" class="col-sm-4 control-label">Foto Nota <?php echo form_error('foto_nota') ?></label>
                     <div class="col-sm-5">
                        <input type="file" id="foto_nota" name="foto_nota">
                     </div>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <div>
                     <!-- untuk menambah detail barang nota -->
                     <p align="center"><button type="button" class="btn btn-info btn-sm" onclick="tambah_barang(); return false;">Tambah Barang</button></p>
                  </div>
                  <div>
                     <div class="" style="margin: auto; width:90%;" id="divbarang"></div>
                  </div>
               </div>
               <div class="box-footer">
                  <a href="<?php echo site_url('service') ?>" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right"><?php echo $button ?></button>
               </div>
               </form>

            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->