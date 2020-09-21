<?= $this->session->flashdata('message'); ?>
<div class="row">
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
         <div class="inner">
            <h3><?= $order_total ?></h3>

            <p>Data Order</p>
         </div>
         <div class="icon">
            <i class="fa fa-list-alt"></i>
         </div>
         <a href="<?= base_url('order') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
         <div class="inner">
            <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
            <h3><?= $pengemudi_total ?></h3>

            <p>Data Pengemudi</p>
         </div>
         <div class="icon">
            <i class="fa fa-user-secret"></i>
         </div>
         <a href="<?= base_url('pengemudi') ?>"" class=" small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
         <div class="inner">
            <h3><?= $kendaraan_total ?></h3>

            <p>Data Kendaraan</p>
         </div>
         <div class="icon">
            <i class="fa fa-truck"></i>
         </div>
         <a href="<?= base_url('kendaraan') ?>"" class=" small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
         <div class="inner">
            <h3><?= $user_total ?></h3>

            <p>Data Pengguna</p>
         </div>
         <div class="icon">
            <i class="fa fa-users"></i>
         </div>
         <a href="<?= base_url('user') ?>"" class=" small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
         <div class="inner">
            <h3><?= $bengkel_total ?></h3>

            <p>Data Bengkel</p>
         </div>
         <div class="icon">
            <i class="fa fa-gears"></i>
         </div>
         <a href="<?= base_url('bengkel') ?>"" class=" small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <!-- ./col -->