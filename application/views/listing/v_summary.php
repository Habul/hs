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
                     <?= form_open('listing/summary') ?>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <label class="input-group-text pr-3">Users</label>
                           </div>
                           <select class="form-control" name="users">
                              <option value="">-- All User --</option>
                              <?php foreach ($users as $u) { ?>
                                 <option value="<?= $u->id ?>"><?= ucwords($u->pengguna_nama) . ' - ' . ucwords($u->pengguna_level) ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-success"><i class="fas fa-search"></i> Priview</button>
                        <button class="btn btn-outline-warning"><i class="fas fa-file-excel"></i> Export to excel</button>
                        <button class="btn btn-outline-secondary"><i class="fas fa-file-pdf"></i> Export to pdf</button>
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
                        <button type="button" class="btn btn-xs btn-icon btn-circle" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="index1" class="table table-striped table-sm">
                        <thead class="thead-dark text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>User</th>
                              <th>No Po</th>
                              <th>Id Hs</th>
                              <th>Company</th>
                              <th>Notes</th>
                           </tr>
                        </thead>
                        <tr>
                           <td class="align-middle text-center"></td>
                           <td class="align-middle text-center"></td>
                           <td class="align-middle text-center"></td>
                           <td class="align-middle text-center"></td>
                           <td class="align-middle"></td>
                           <td class="align-middle"></td>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>