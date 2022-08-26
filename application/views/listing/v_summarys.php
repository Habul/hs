<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Summary Report</h1>
               <small>Summary Report Qoutation & Po Customer</small>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Summary Report</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <div class="card bg-light color-palette shadow">
                  <div class="card-body mb-0 mt-0">
                     <h6>Filter by sales</h6>
                     <?= form_open('listing/summarys') ?>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <label class="input-group-text pr-3">Users</label>
                           </div>
                           <select class="form-control" name="users">
                              <option value="">-- All User --</option>
                              <?php foreach ($users as $u) { ?>
                                 <option <?php if ($u->pengguna_id == $user) {
                                             echo "selected='selected'";
                                          } ?> value="<?= $u->pengguna_id ?>"><?= ucwords($u->pengguna_nama) . ' - ' . ucwords($u->pengguna_level) ?>
                                 </option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-warning" href=""><i class="fas fa-file-excel"></i> Export to excel</a>
                        <a class="btn btn-outline-secondary" href="" target="_blank"><i class="fas fa-file-pdf"></i> Export to pdf</a>
                        <button class="btn btn-outline-success"><i class="fas fa-search"></i> Priview</button>
                     </div>
                     <?= form_close() ?>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="card card-success card-outline">
                  <div class="card-header">
                     <h4 class="card-title"><i class="fas fa-search"></i> Priview Summary Report
                     </h4>
                     <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="maximize">
                           <i class="fas fa-expand"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="index1" class="table table-striped table-sm">
                        <thead class="thead-dark text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>User</th>
                              <th>Id Qto</th>
                              <th>Item</th>
                              <th>No Po</th>
                              <th>Company</th>
                              <th>Notes</th>
                              <th width="8%">Detail Qto</th>
                           </tr>
                        </thead>
                        <?php foreach ($summary as $s) { ?>
                           <tr>
                              <td class="align-middle text-center"></td>
                              <td class="align-middle text-center"><?= $s->pengguna_nama ?></td>
                              <td class="align-middle text-center"><?= $s->id_hs ?></td>
                              <td class="align-middle text-center"><?= strtoupper($s->item) ?></td>
                              <td class="align-middle text-center">
                                 <?php if ($s->no_po == '') : ?>
                                    <span class="badge badge-danger"><i class="fas fa-times-circle"></i> Blank</span>
                                 <?php elseif ($s->no_po != '') : echo $s->no_po ?>
                                 <?php endif ?>
                              </td>
                              <td class="align-middle"><?= $s->company ?></td>
                              <td class="align-middle"><?= $s->notes ?></td>
                              <td class="align-middle text-center">
                                 <a class="btn-sm btn-info" data-toggle="modal" data-target="#modal_view<?= $s->id; ?>" title="View Detail Quotation">
                                    <i class="fas fa-search-dollar"></i></a>
                              </td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>