
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <!-- <pre><?php print_r($wilayah) ?></pre> -->
    <div class="card col-md-12">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img style="width: 300px" src="<?= base_url();?>assets/img/wilayah/<?= $wilayah->Gambar;?>">
          </div>
          <div class="col-md-7">
            <h2 style="color: #111;margin-left: -101px;margin-top: 25px"><?= $wilayah->Wilayah;?></h2>
            <h5 style="margin-left: -101px;"># <?= $wilayah->Deskripsi;?></h5>
          </div>
          <div class="col-md-1">
            <p style="margin-top: 30px;"><i class="fa fa-cogs fa-2x"></i></p>
          </div>
          <div class="col-md-12">
            <hr class="divider">
            <div class="row">
              <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <center>
                      <a href="<?= base_url();?>Kampus/index/<?= $wilayah->ID_Wilayah;?>" style="text-decoration: none;">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          <i class="fa fa-building fa-5x"></i>
                        </div>
                        <br>
                        <p><?= $totalKampus;?> Kampus</p>
                      </a>
                    </center>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <center>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <i class="fa fa-users fa-5x"></i>
                      </div>
                      <br>
                      <p>5 Anggota</p>
                    </center>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <center>
                      <a href="<?= base_url();?>Struktural/index/<?= $wilayah->ID_Wilayah;?>" style="text-decoration: none;">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          <i class="fas fa-fw fa-chart-area fa-5x"></i>
                        </div>
                        <br>
                        <p>Struktural</p>
                      </a>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>