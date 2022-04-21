<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>HS | Qoutation</title>
   <link rel='icon' href="<?php echo base_url(); ?>gambar/website/hs-ico.png" type="image/gif">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/pdf.css">
</head>

<body>
   <div>
      <section>
         <div>
            <div>
               <table id="table">
                  <tr>
                     <td width="30%"><img src="<?php echo base_url(); ?>gambar/website/hs-head.jpg" style="width:350px;height:106px;"></td>

                  </tr>
                  <tr>
                     <td style="text-align:center">
                        <h1><u>QOUTATION</u></h1>
                     </td>
                  </tr>
                  <tr>
                     <td style="text-align:center">
                        <h1>Penawaran Harga</h1>
                     </td>
                  </tr>
               </table>
            </div>
         </div>

         <div>
            <div>
               <table id="table_hide">
                  <?php foreach ($listing as $u) : ?>
                     <tr>
                        <td width="15%">Customer Name</td>
                        <td width="3%" style="text-align:right"> : </td>
                        <td><?php echo $u->company; ?></td>
                     </tr>
                     <tr>
                        <td width="15%">SO No</td>
                        <td style="text-align:right"> : </td>
                        <td><?php echo 'HS/INQ/' . strtoupper(substr($u->user, 0, 3)) . '/' . date("Y/m", strtotime($u->created_at)) . '/' . $u->id ?></td>
                     </tr>
                     <tr>
                        <td width=" 15%">SO Date</td>
                        <td style="text-align:right"> : </td>
                        <td><?php echo date("d-m-Y", strtotime($u->created_at)); ?></td>
                     </tr>
                     <tr>
                        <td width="15%">Sales Name</td>
                        <td style="text-align:right"> : </td>
                        <td><?php echo $u->user; ?></td>
                     </tr>
                  <?php endforeach; ?>
               </table>
            </div>
         </div>
      </section>
   </div>
</body>

</html>