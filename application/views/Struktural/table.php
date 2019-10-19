<link href="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-xl-12 col-md-12 col-xs-12 col-sm-12 mb-4">
      <div class="card border-left-primary shadow  py-2">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Strutural <?= @$strukturals[0]->Wilayah;?></h1>
            <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Tambah</span>
            </button>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped" id="tables">
            <thead style="font-weight:bold">
              <tr>
                <td>No</td>
                <td>Wilayah</td>
                <td>Jabatan</td>
                <td>User</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($strukturals as $key => $item): ?>
                <tr>
                  <td><?= $key + 1;?></td>
                  <td><?= $item->Wilayah;?></td>
                  <td><?= $item->Jabatan;?></td>
                  <td><?= $item->Username;?></td>
                  <td>
                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>