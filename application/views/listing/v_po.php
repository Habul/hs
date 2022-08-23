<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Purchase Order Customer</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Po Customer
                  </li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="content">
      <div class="container-fluid">
         <?php if ($this->session->flashdata('berhasil')) { ?>
            <div class="alert alert-success alert-dismissible fade show" id="info" role="alert">
               <button type=" button" class="close" data-dismiss="alert">&times;</button>
               <i class="icon fa fa-check"></i>&nbsp;<?= $this->session->flashdata('berhasil') ?>
            </div>
         <?php } ?>
         <?php if ($this->session->flashdata('gagal')) { ?>
            <div class="alert alert-warning alert-dismissible fade show" id="info" role="alert">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <i class="icon fa fa-warning"></i>&nbsp;<?= $this->session->flashdata('gagal') ?>
            </div>
         <?php } ?>
         <div class="row">
            <div class="col-md-12">
               <div class="card card-success card-outline">
                  <div class="card-header">
                     <h4 class="card-title"><a class="btn btn-success col-15 shadow" data-toggle="modal" data-target="#modal_add">
                           <i class="fa fa-plus"></i>&nbsp; Add New PO</a>
                     </h4>
                     <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-icon btn-circle btn-warning" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle btn-primary" data-card-widget="maximize">
                           <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-xs btn-icon btn-circle btn-danger" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <table id="index1" class="table table-striped table-sm">
                        <thead class="thead-dark text-center">
                           <tr>
                              <th width="5%">No</th>
                              <th>Name</th>
                              <th>No Po</th>
                              <th>Id Hs</th>
                              <th>Company</th>
                              <th>Notes</th>
                              <th width="8%">Actions</th>
                           </tr>
                        </thead>
                        <?php foreach ($po as $p) {    ?>
                           <tr>
                              <td class="align-middle text-center"></td>
                              <td class="align-middle text-center"><?= ucwords($p->user) ?></td>
                              <td class="align-middle text-center"><?= strtoupper($p->no_po) ?></td>
                              <td class="align-middle text-center"><?= strtoupper($p->id_hs) ?></td>
                              <td class="align-middle"><?= ucwords($p->company) ?></td>
                              <td class="align-middle"><?= $p->note ?></td>
                              <td class="align-middle text-center">
                                 <a class="btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?= $p->id; ?>" title="Edit">
                                    <i class="fa fa-pencil-alt"></i></a>
                                 <a class="btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $p->id; ?>" title="Delete">
                                    <i class="fa fa-trash"></i></a>
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

<!-- Bootstrap modal add -->
<div class="modal fade" id="modal_add" tabindex="-1" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-light color-palette">
         <div class="modal-header">
            <h5 class="col-12 modal-title text-center">Create New Po
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </h5>
         </div>
         <form onsubmit="addbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/po_add') ?>">
            <div class="modal-body">
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text pr-4">Name&nbsp;</label>
                  </div>
                  <input type="text" name="user" class="form-control" value="<?= ucwords($this->session->userdata('nama')) ?>" readonly>
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text pr-4">No PO</label>
                  </div>
                  <input type="text" name="no_po" class="form-control" placeholder="Input No PO Customer .." required>
               </div>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <label class="input-group-text pr-4">ID Qto</label>
                  </div>
                  <select class="form-control" name="id_hs" id="id_hs" required>
                     <option value="">-- Select ID Qto --</option>
                     <?php foreach ($listing as $q) { ?>
                        <option value="<?= $q->id_hs ?>"><?= $q->id_hs . ' - ' . $q->company ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="form-group mb-0">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <label class="input-group-text pr-4">Notes&nbsp;</label>
                     </div>
                     <textarea type="text" name="note" class="form-control" placeholder="..." required></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-center">
               <button class="btn btn-outline-success col-6" id="addbtn"><i class="fa fa-check"></i> Save</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--End Modals Add-->

<!-- modal edit -->
<?php foreach ($po as $p) : ?>
   <div class="modal fade" id="modal_edit<?= $p->id ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content bg-light color-palette">
            <div class="modal-header">
               <h5 class="col-12 modal-title text-center">Edit Po
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h5>
            </div>
            <form onsubmit="editbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/po_edit') ?>">
               <div class="modal-body">
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text pr-4">ID Qto</label>
                     </div>
                     <input type="hidden" name="id" value="<?= $p->id ?>">
                     <input type="text" class="form-control" value="<?= strtoupper($p->id_hs) ?>" readonly>
                  </div>
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text pr-4">No PO</label>
                     </div>
                     <input type="text" name="no_po" class="form-control" value="<?= strtoupper($p->no_po) ?>" required>
                  </div>
                  <div class="form-group mb-0">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <label class="input-group-text pr-4">Notes&nbsp;</label>
                        </div>
                        <textarea type="text" name="note" class="form-control"><?= $p->note ?></textarea>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-center">
                  <button class="btn btn-outline-warning col-6" id="editbtn"><i class="fa fa-check"></i> Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <div class="modal fade" id="modal_hapus<?= $p->id; ?>" tabindex="-1" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content bg-danger">
            <div class="modal-header">
               <h5 class="col-12 modal-title text-center">Delete Po
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </h5>
            </div>
            <form onsubmit="delbtn.disabled = true; return true;" method="post" action="<?= base_url('listing/po_delete') ?>">
               <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $p->id; ?>">
                  <input type="hidden" name="id_hs" value="<?= $p->id_hs ?>">
                  <span>Are you sure delete <?= strtoupper($p->no_po) ?> ? </span>
               </div>
               <div class="modal-footer justify-content-between">
                  <button class="btn btn-outline-light" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                  <button class="btn btn-outline-light" id="delbtn"><i class="fa fa-check"></i> Yes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php endforeach; ?>
<!--End Modals Edit-->