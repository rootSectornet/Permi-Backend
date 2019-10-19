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
<div class="modal fade bd-example-modal-lg" id="wilayah-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Wilayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-10 m-auto">
          <div class="form">
            <div class="form-group my-2">
              <label class="control-label">Wilayah * : </label>
              <input type="text" name="wilayah" v-model="wilayah" placeholder="wilayah" v-bind:class="Validwilayah" class="form-control">
            </div>
            <div class="form-group my-2">
              <label class="control-label">Deskripsi * : </label>
              <textarea name="deskripsi" rows="5" v-model="deskripsi"  class="form-control" v-bind:class="Validdeskripsi"></textarea>
            </div>
            <div class="form-group my-2">
              <label class="control-label">Logo  : </label>
              <div class="avatar-upload">
                  <div class="avatar-edit">
                      <input type='file' id="imageUpload" name="foto" />
                      <label for="imageUpload"></label>
                  </div><br>
                  <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url(<?= base_url();?>assets/img/permilogo.png);">
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" v-on:click="Save()" v-bind:disabled="IsLoading">Simpan <i class="fa fa-spinner fa-pulse" v-if="IsLoading"></i></button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

</div>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/js/vue.min.js"></script>
<script src="<?= base_url();?>assets/vendor/axios.min.js"></script>
<script src="<?= base_url();?>assets/costum/js/wilayah/wilayah.js"></script>
