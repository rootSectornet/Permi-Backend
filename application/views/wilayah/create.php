<link href="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Wilayah Permikomnas</h1>
    <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah</span>
    </button>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-12 col-xs-12 col-sm-12 mb-4">
      <div class="card border-left-primary shadow  py-2">
        <div class="card-body">
          <table class="table table-hover table-striped" id="tables">
            <thead style="font-weight:bold">
              <tr>
                <td>No</td>
                <td>Wilayah</td>
                <td>Deskripsi</td>
                <td>Gambar</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<!-- start modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
<!-- end modal -->

</div>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/costum/js/wilayah.js"></script>
