<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?></title>
</head>

<style>
   .table1 {
      font-family: sans-serif;
      color: #444;
      border-collapse: collapse;
      width: 50%;
      border: 1px solid #f2f5f7;
   }

   .table1 tr th {
      background: #35A9DB;
      color: #fff;
      font-weight: normal;
   }

   .table1,
   th,
   td {
      padding: 8px 20px;
      text-align: center;
   }

   .table1 tr:hover {
      background-color: #f5f5f5;
   }

   .table1 tr:nth-child(even) {
      background-color: #f2f2f2;
   }
</style>

<body>
   <!-- untuk judul -->
   <table width="100%">
      <tr>
         <td style="text-align:center">
            <h4><b>PEMERINTAHAN KABUPATEN KUDUS</b></h4>
         </td>
      </tr>
      <tr>
         <td style="text-align:center">
            <b>DINAS PERUMAHAN KAWASAN PERMUKIMAN DAN LINGKUNGAN HIDUP</b>
         </td>
      </tr>
      <tr>
         <td style="text-align:center"><br> </td>
      </tr>
      <tr>
         <td style="text-align:center"><b><u>KARTU SERVICE KENDARAAN</u></b></td>
      </tr>
   </table>

   <table class="table table-bordered">
      <tr>
         <td width="40%">Jenis Kendaraan</td>
         <td width="5%">: </td>
         <td> <?= $pengemudi_data->jenis_kendaraan ?></td>
      </tr>
      <tr>
         <td>Merk</td>
         <td>:</td>
         <td><?= $pengemudi_data->merk ?></td>
      </tr>
      <tr>
         <td>Tahun Pembuatan</td>
         <td>:</td>
         <td><?= $pengemudi_data->tahun_pembuatan ?></td>
      </tr>
      <tr>
         <td>Nomor Kendaraan</td>
         <td>:</td>
         <td><?= $pengemudi_data->no_plat ?></td>
      </tr>
      <tr>
         <td>Pengemudi</td>
         <td>:</td>
         <td><?= $pengemudi_data->nama ?></td>
      </tr>
      <tr>
         <td>Nomor HP</td>
         <td>:</td>
         <td><?= $pengemudi_data->no_hp ?></td>
      </tr>
   </table>
   </div>
   <br>
   <br>
   <br>
   <h1 style="text-align: center;">
      <?= date('Y'); ?>
   </h1>

   <table class="table1">
      <thead>
         <tr>
            <th>No</th>
            <th>Tanggal Order</th>
            <th>Order Kerusakan</th>
            <th>Tanggal Selesai</th>
            <th>Paraf</th>
         </tr>
      </thead>
      <tbody>
         <?php $no = 1;
         foreach ($order_data as $order) { ?>
            <tr>
               <td width="40px"><?= $no++ ?></td>
               <td><?= tgl_indo(($order->tgl_order)) ?></td>
               <td><?= $order->ket_rusak ?></td>
               <td><?php if (!$order->tgl_selesai) { ?>
                     <a href="#" class="btn btn-warning btn-sm disabled"> Belum Selesai</a>
                  <?php } elseif ($order->status == 'Ditolak') { ?>
                     <a href="#" class="btn btn-warning btn-sm disabled"> Batal Order</a>
                  <?php } else { ?>
                     <?= tgl_indo(($order->tgl_order)); ?>
                  <?php } ?>
               </td>
               <td style="text-align:center" width="120px">

               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
</body>

</html>