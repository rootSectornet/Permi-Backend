<link href="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Anggota Permikomnas</h1>
    <a href="<?= base_url();?>Anggota/Create/" class="btn btn-success btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah</span>
    </a>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-12 col-xs-12 col-sm-12 mb-4">
      <div class="card border-left-primary shadow">
        <div class="card-header">
          <div class="">
              <fieldset>
                <legend>Filter : </legend>
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="wilayah">
                      <option hidden readonly>Pilih Wilayah</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="Kampus">
                      <option hidden readonly>Pilih Kampus</option>
                    </select>
                  </div>
                </div>
              </fieldset>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped table-responsive" width="100%" id="tables">
            <thead style="font-weight:bold">
              <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Email</td>
                <td>telp</td>
                <td>Alamat</td>
                <td>Foto</td>
                <td>Kampus</td>
                <td>Wilayah</td>
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

</div>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/js/vue.min.js"></script>
<script src="<?= base_url();?>assets/vendor/axios.min.js"></script>
<script src="<?= base_url();?>assets/costum/js/anggota/anggota.js"></script>
