<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Berita Baru </h1>
  </div>
  <!-- Page Heading -->
  <div class="row">
    <div class="col-md-8">
      <div class="card border-bottom-success mb-2">
        <div class="card-header">
          <div class="thumbnail">
            
          </div>
          <br>
          <input type="file" name="file" id="file" class="inputfile">
          <label for="file"> <i class="fa fa-upload"></i> Pilih Thumbnail</label>
        </div>
        <div class="card-body" id="artikel">
          <div class="form-group">
            <label class="control-label">Title <span style="color: red">*</span> : </label>
            <input type="text" required name="title" v-model="title" class="form-control" placeholder="Title ... ">
          </div>
          <div class="form-group">    
            <ckeditor v-model="content"></ckeditor>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-left-warning shadow">
        <div class="card-header">Information</div>
        <div class="card-body">
          <p>Status : Draft</p>
          <hr class="divider">
          <p>Tanggal : 20 oktober 2019</p>
          <hr class="divider">
          <p>Author : <?= $this->session->userdata('login')->Username;?></p>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary"><i class="fa fa-check"></i> Publish</button>
          <button class="btn btn-danger"> Cancel</button>
        </div>
      </div>
      <br>
      <div class="card border-left-danger shadow" id="category">
        <div class="card-header">
          Category
          {{categorySelected}}
        </div>
        <div class="card-body" style="height: 400px;overflow: auto;">
          <div class="form-check mb-2 mr-sm-2" v-for="item in Data">
            <input type="checkbox" class="form-check-input" name="" v-model="categorySelected" v-bind:value="item.ID_Category">
            <label style="width: 100%;" class="form-check-label">{{item.Category_name}} <span style="float: right;cursor: pointer;" class="custom-trash" ><i class="fa fa-trash"></i></span></label>
          </div>
          <hr class="divider">
        </div>
        <div class="card-footer">
          <div class="input-group mb-3">
            <input type="text" class="form-control" v-model="category" v-bind:disabled="IsLoading" placeholder="New Category" aria-label="New Category" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" v-on:click="save()" v-bind:disabled="IsLoading" type="button"><i v-if="IsLoading" class="fa fa-spinner fa-pulse"></i><i v-else class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script src="<?= base_url();?>assets/js/vue.min.js"></script>
<script src="<?= base_url();?>assets/vendor/axios.min.js"></script>
<script src="<?= base_url();?>assets/js/ckeditor/ckeditor.js"></script>
<script src="<?= base_url();?>assets/costum/js/posting/posting.js"></script>
