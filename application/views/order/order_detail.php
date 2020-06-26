<div class="row">
   <div class="col-xs-12">
      <div class="box box-solid">
         <!-- /.box-header -->
         <div class="box-body table-responsive">
            <div class="col-xs-7">
               <p><b>Rincian Bengkel</b></p>
               <table class="table table-bordered">
                  <tr>
                     <td width="27%">Nama Bengkel</td>
                     <td width="3%">: </td>
                     <td> <?= $bengkel_data->nama_bengkel ?></td>
                  </tr>
                  <tr>
                     <td>Tanggal Service</td>
                     <td>:</td>
                     <td><?= tgl_indo(($bengkel_data->tgl_service)) ?></td>
                  </tr>
                  <tr>
                     <td>Alamat Bengkel</td>
                     <td>:</td>
                     <td><?= $bengkel_data->alamat ?></td>
                  </tr>
                  <tr>
                     <td>Nomor HP</td>
                     <td>:</td>
                     <td><?= $bengkel_data->no_hp ?></td>
                  </tr>
               </table>
               <p><b>Rincian Service</b></p>
               <table class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                     <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Barang / Jasa</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Banyak</th>
                        <th style="text-align: center;">Jumlah</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($nota_data as $nota) { ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td style="text-align: left;"><?= $nota->nama_barang ?></td>
                           <td><?= rupiah($nota->harga_satuan) ?></td>
                           <td><?= $nota->banyak_barang ?></td>
                           <td><?= rupiah($nota->jumlah) ?></td>
                        </tr>
                     <?php } ?>
                  </tbody>
                  <tfoot>
                     <th colspan="4" style="text-align: center;"> Total </th>
                     <th style="text-align: center;"><?= rupiah($bengkel_data->total) ?></th>
                  </tfoot>
               </table>
            </div>
            <!-- sampai sini -->
            <div class="col-xs-5" style="text-align: center;">
               <h3>Bukti Service </h3>
               <img src="<?= base_url('assets/img/service/' . $bengkel_data->foto_service) ?>" width="180" height="180" alt="foto_service">
               <br>
               <h3>Bukti Nota Service </h3>
               <img src="<?= base_url('assets/img/nota/' . $bengkel_data->foto_nota) ?>" width="180" height="180" alt="foto_nota">
               <br>
            </div>
         </div>
         <!-- /.box-body -->
         <div class="box-footer with-border">
            <div class="col-xs-12">
               <a href="<?php echo site_url('order') ?>" class="btn btn-default" style="margin-right: 5px;">Kembali</a>
               <a href="<?= site_url('order/cetak/' . $this->uri->segment(3)) ?>" target="_blank" class="btn btn-success pull-right">
                  <i class="fa fa-print"></i> Print
               </a>
               <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Generate PDF
               </button>
            </div>
         </div>
         <!-- box-footer -->
      </div>
      <!-- /.box -->
   </div>
   <!-- /.col -->