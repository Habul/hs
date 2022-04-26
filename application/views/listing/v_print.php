<!DOCTYPE html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>HS | Print Quotation</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/pdf.css">
</head>

<body>
   <section>
      <div>
         <table id="table_hide">
            <tr>
               <td width="30%"><img src="<?php echo base_url(); ?>gambar/website/hs-head.jpg" style="width:300px;height:58px;"></td>
            </tr>
            <tr>
               <td>
                  <h2 class="text-center"><u>QUOTATION</u></h2>
                  <h2 class="text-center" style="color:blue"><i>Penawaran Harga</i></h2>
               </td>
            </tr>
         </table>
      </div>

      <div>
         <table id="table_hide_atas">
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
                  <td width="15%">SO Date</td>
                  <td style="text-align:right"> : </td>
                  <td><?php echo date("d-m-Y", strtotime($u->created_at)) ?></td>
               </tr>
               <tr>
                  <td width="15%">Sales Name</td>
                  <td style="text-align:right"> : </td>
                  <td><?php echo ucwords($u->user) ?></td>
               </tr>
            <?php endforeach; ?>
         </table>
      </div><br>

      <div>
         <table id="table">
            <thead>
               <tr>
                  <th width="5%"><b>No</b></th>
                  <th width="20%"><b>Part No</b></th>
                  <th width="50%"><b>Part Description</b></th>
                  <th width="10%"><b>Lead Time</b></th>
                  <th width="5%"><b>Qty</b></th>
                  <th width="10%"><b>Price</b></th>
                  <th width="10%"><b>Total</b></th>
               </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($qoutation as $h) :
               $sum_total[] = $h->price;
               $total_price = array_sum($sum_total);
               $ppn = $total_price * 0.11;
               $total = $total_price + $ppn ?>
               <tbody>
                  <tr>
                     <td class="text-center"><?= $no++; ?></td>
                     <td class="text-center"><?= strtoupper($h->part_code) ?></td>
                     <?php if ($h->id_item == 1) : ?>
                        <?php if ($h->assembly != '') : ?>
                           <td><?= 'PIPE-' . $h->assembly . '-' . strtoupper($h->brand) . '-' . strtoupper($h->model) . '-' . $h->i_d . '-' . $h->od ?></td>
                        <?php else : ?>
                           <td><?= 'PIPE-' . strtoupper($h->brand) . '-' . strtoupper($h->model) . '-' . $h->i_d . '-' . $h->od ?></td>
                        <?php endif ?>
                     <?php elseif ($h->id_item == 2) : ?>
                        <?php if ($h->assembly != '') : ?>
                           <td><?= 'HOSE-' . $h->assembly . '-' . strtoupper($h->brand) . '-' . strtoupper($h->type) . '-' . $h->size ?></td>
                        <?php else : ?>
                           <td><?= 'HOSE-' . strtoupper($h->brand) . '-' . strtoupper($h->type) . '-' . $h->size ?></td>
                        <?php endif ?>
                     <?php elseif ($h->id_item == 3) : ?>
                        <?php if ($h->assembly != '') : ?>
                           <td><?= 'FITTING-' . $h->assembly . '-' . strtoupper($h->brand) . '-' . strtoupper($h->model) . '-' . strtoupper($h->thread) . '-' . strtoupper($h->type) . '-' . strtoupper($h->category) . '-' . $h->size ?></td>
                        <?php else : ?>
                           <td><?= 'FITTING-' . strtoupper($h->brand) . '-' . strtoupper($h->model) . '-' . strtoupper($h->thread) . '-' . strtoupper($h->type) . '-' . strtoupper($h->category) . '-' . $h->size ?></td>
                        <?php endif ?>
                     <?php elseif ($h->id_item == 4) : ?>
                        <?php if ($h->assembly != '') : ?>
                           <td><?= 'HOSE COVER-' . $h->assembly . '-' . strtoupper($h->category) . '-' . $h->size ?></td>
                        <?php else : ?>
                           <td><?= 'HOSE COVER-' . strtoupper($h->category) . '-' . $h->size ?></td>
                        <?php endif ?>
                     <?php elseif ($h->id_item == 5) : ?>
                        <?php if ($h->assembly != '') : ?>
                           <td><?= 'CLAMP PIPE-' . $h->assembly . '-' . strtoupper($h->hole) . '-' . strtoupper($h->plat) . '-' . $h->size ?></td>
                        <?php else : ?>
                           <td><?= 'CLAMP PIPE-' . strtoupper($h->hole) . '-' . strtoupper($h->plat) . '-' . $h->size ?></td>
                        <?php endif ?>
                     <?php endif ?>
                     <td class="text-center">7-14 DAYS</td>
                     <td class="text-center"><?= number_format($h->qty, 0, '.', '.') ?></td>
                     <td class="text-center"><?= number_format($h->price_unit, 0, '.', '.') ?></td>
                     <td class="text-center"><?= number_format($h->price, 0, '.', '.') ?></td>
                  </tr>
               <?php endforeach; ?>
         </table>
         <table id="table_hide">
            <tr>
               <td width="75%"></td>
               <td width="15%" style="text-align:right;color:blue"><b>TOTAL&emsp;<b></td>
               <td style="text-align:right;color:blue">&emsp;<b><?php echo number_format($total_price, 0, '.', '.') ?><b></td>
            </tr>
            <tr>
               <td width="75%"></td>
               <td width="15%" style="text-align:right"><b>PPN&emsp;<b></td>
               <td style="text-align:right"><b>&emsp;<?php echo number_format($ppn, 0, '.', '.') ?><b></td>
            </tr>
            <tr>
               <td width="75%"></td>
               <td width="15%" style="text-align:right"><b>GRAND TOTAL &emsp;<b></td>
               <td style="text-align:right"><b>&emsp;<?php echo number_format($total, 0, '.', '.') ?><b></td>
            </tr>
         </table>
      </div>

      <div>
         <small style="color:blue;"><i>Harga dan Stock tidak mengikat</i></small>
         <table id="table_hide">
            <tr>
               <td colspan="3">
                  <h4><u>Payment Transfer BANK BCA</u></h4>
               </td>
            </tr>
            <tr>
               <td width="10%">PPN</td>
               <td width="10%" style="color:blue"><b>5885-0999-61</b></td>
               <td width="70%"><b>a/n PT. Hydroulink System</b></td>
            </tr>
            <tr>
               <td width="10%">No-PPN</td>
               <td width="10%" style="color:blue"><b>3992-3392-22</b></td>
               <td width="70%"><b>a/n Kismanto</b></td>
            </tr>
         </table><br>
         <table id="table_hide">
            <?php foreach ($listing as $u) : ?>
               <tr>
                  <td class="text-center">
                     Sales Name,
                  </td>
                  <td width="60%"></td>
                  <td class="text-center">
                     Approve By,
                  </td>
               </tr>
               <tr>
                  <td style="padding-top:35px;" class="text-center">.................</td>
                  <td></td>
                  <td style="padding-top:35px;" class="text-center">.................</td>
               </tr>
               <tr>
                  <td class="text-center">(<?php echo ucwords($u->user) ?>)</td>
                  <td></td>
                  <td class="text-center">(Jesica)</td>
               </tr>
            <?php endforeach; ?>
         </table>
      </div>
   </section>
</body>

</html>