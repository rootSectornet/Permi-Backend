
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Register Kampus Permikomnas</h1>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-3 col-xs-1 col-sm-1 mb-4"></div>
    <div class="col-xl-6 col-md-6 col-xs-12 col-sm-12 mb-4">
      <div class="card border-left-primary shadow"  id="createKampus">
        <div class="card-body">
          <div class="alert alert-danger" role="alert" v-if='IsError'>
            <h4 class="alert-heading">Warning!</h4>
            <p>{{error}}</p>
            <hr>
            <p class="mb-0">Perhatikan dan pastikan data yang anda input valid.</p>
          </div>
          <div class="form-group">
            <label class="control-label">Nama Kampus <span style="color:red">*</span> : </label>
            <input type="text" required class="form-control" v-model="Kampus">                
          </div>
          <div class="form-group">
            <label class="control-label">Alamat  <span style="color:red">*</span> : </label>
            <textarea class="form-control" rows="6" v-model="Alamat"></textarea>
          </div>
          <div class="form-group">
            <label class="control-label">Tgl Join  <span style="color:red">*</span> : </label>
            <input type="date" class="form-control" required v-model="TglJoin">
          </div>
          <div class="form-group">
            <label class="control-label">Wilayah  <span style="color:red">*</span> : </label> 
            <select class="form-control" v-model="Wilayah">
              <option hidden>Pilih Wilayah</option>
              <option v-for="item in DataWilayah" v-bind:value="item.ID_Wilayah">{{item.Wilayah}}</option>
            </select>
          </div>
          <div class="form-group my-2">
            <label class="control-label">Logo  : </label>
            <label><i>Max file size : 1MB</i> & <i>allowed type gif jpg png jpeg PNG JPG JPEG</i></label>
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
        <div class="card-footer">
          <button v-on:click="kembali()" class="btn btn-danger btn-user"><i class="fa fa-chevron-left"></i> Kembali</button>
          <button type="button" class="btn btn-primary btn-user" v-bind:disabled="IsLoading" v-on:click="Save()">
            Simpan <i v-if="IsLoading" class="fa fa-spinner fa-pulse"></i>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/js/vue.min.js"></script>
<script src="<?= base_url();?>assets/vendor/axios.min.js"></script>
<script src="<?= base_url();?>assets/costum/js/kampus/create_kampus.js"></script>
