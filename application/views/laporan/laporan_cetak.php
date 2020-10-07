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
         /* width: 75%; */
      }

      th {
         padding: 6px 12px;
         border: solid thin #000;
      }

      td {
         padding: 6px 12px;
         border: solid thin #000;
      }
   </style>
</head>

<body>
   <table id="example1" class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Pengemudi</th>
            <th>Nomor Kendaraan</th>
            <th>Tanggal Order</th>
            <th>Tanggal Selesai</th>
            <th>Service</th>
            <th>Total</th>
         </tr>
      </thead>
      <tbody>
         <?php $no = 1;
         $subtotal = 0;
         foreach ($service_data as $id_pengemudi => $service) {
            if ($service) {
               foreach ($service as $key => $value) {
                  $sql = "SELECT user.nama, kendaraan.no_plat 
                                FROM pengemudi 
                                JOIN `user` on pengemudi.id_user = `user`.id 
                                JOIN kendaraan ON pengemudi.id_kendaraan = kendaraan.id
                                WHERE pengemudi.id = {$id_pengemudi}";
                  $pengemudi = $this->db->query($sql)->row();
         ?>
                  <tr>
                     <td width="30px"><?= $no++ ?></td>
                     <td><?= $pengemudi->nama ?></td>
                     <td><?= $pengemudi->no_plat ?></td>
                     <td><?= tgl_indo($value->tgl_order) ?></td>
                     <td><?= tgl_indo($value->tgl_selesai) ?></td>
                     <td><?= $value->nama_barang ?></td>
                     <td><?= rupiah($value->total) ?></td>

                  </tr>
               <?php
                  $subtotal += $value->total; //untuk menjumlahkan total biaya service
               }
               ?>
         <?php
            }
         }
         ?>
      </tbody>
      <tfoot>
         <tr>
            <th colspan="6" style="text-align: center;"> Total Keseluruhan </th>
            <th><?= rupiah($subtotal) ?></th>
         </tr>
      </tfoot>
   </table>
</body>

</html>