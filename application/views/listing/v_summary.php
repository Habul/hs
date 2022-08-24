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
      </div>
   </section>
</div>