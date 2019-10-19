<link href="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Kampus Permikomnas</h1>
    <a href="<?= base_url();?>Kampus/Create/<?= $uuid;?>" class="btn btn-success btn-icon-split">
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
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <fieldset>
                <legend>Filter : </legend>
                <select class="form-control" name="wilayah">
                  <option hidden readonly>Pilih Wilayah</option>
                </select>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped" id="tables">
            <thead style="font-weight:bold">
              <tr>
                <td>No</td>
                <td>Kampus</td>
                <td>Alamat</td>
                <td>Logo</td>
                <td>Tgl_Join</td>
                <td>Status</td>
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
<script type="text/javascript">
  var ID_WILAYAH = '<?= $id_wilayah;?>'
</script>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>assets/js/vue.min.js"></script>
<script src="<?= base_url();?>assets/vendor/axios.min.js"></script>
<script src="<?= base_url();?>assets/costum/js/kampus/kampus.js"></script>
