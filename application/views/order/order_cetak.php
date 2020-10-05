<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title; ?></title>
   <style type="text/css" media="print">
      body {
         font-size: 12px;
         font-family: Arial, Calibri, 'Times New Roman', sans-serif;
      }

      table {
         border: solid thin #000;
         border-collapse: collapse;
         width: 75%;
      }

      td {
         padding: 6px 12px;
         border: solid thin #000;
      }
   </style>
</head>

<body>
   Tanggal Cetak : <?= tgl_indo((date('Y-m-d'))) ?>

   <h1 style="text-align: center;">Rincian Service dan Nota</h1>
   <p><b>Rincian Bengkel</b></p>
   <table class="">
      <tr>
         <td width="25%">Nama Bengkel</td>
         <td width="5%">: </td>
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
   <table border="1" style="text-align: center;">
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
         <tr>
            <th colspan="4" style="text-align: center;"> Total </th>
            <th style="text-align: center;"><?= rupiah($bengkel_data->total) ?></th>
         </tr>
      </tfoot>
   </table>
   <br>
   <h2 style="text-align: center;"> Bukti Service dan Nota </h2>

   <h3>Bukti Service </h3>
   <div style="text-align: center;">
      <img src="<?= base_url('assets/img/service/' . $bengkel_data->foto_service) ?>" width="400" height="300" alt="foto_service">
      <br>
   </div>
   <h3>Bukti Nota Service </h3>
   <div style="text-align: center;">
      <img src="<?= base_url('assets/img/nota/' . $bengkel_data->foto_nota) ?>" width="400" height="300" alt="foto_nota">
      <br>
   </div>

</body>

</html>