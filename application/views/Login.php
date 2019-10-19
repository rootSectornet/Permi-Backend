<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Permikomnas | Login Page</title>
  <!-- Custom fonts for this template-->
  <link href="<?= base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 8rem">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" id="login-page">
              <div class="col-md-5 d-none d-lg-block bg-login-image" style="padding: 10px;">
                <img class="text-center" src="<?= base_url();?>assets/img/permilogo.png">
              </div>
              <div class="col-md-6">
                <div class="p-5" style="margin-top: 64px">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Welcome Back!</h1>
                    <p class="text-gray  mb-4">Please Login to Your Account.</p>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" v-bind:class="ValidEmail" v-model="Email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" v-bind:class="ValidPassword" v-model="Password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-user btn-block" v-bind:disabled="IsLoading" v-on:click="DoLogin()">
                      Login <i v-if="IsLoading" class="fa fa-spinner fa-pulse"></i>
                    </button>
                    <hr>
                    <div class="alert alert-danger" v-if="IsError" role="alert">
                      <h4 class="alert-heading">Warning!</h4>
                      <hr>
                      <p class="mb-0">{{Message}}</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <script src="<?= base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url();?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url();?>assets/js/vue.min.js"></script>
  <script src="<?= base_url();?>assets/vendor/axios.min.js"></script>
  <script src="<?= base_url();?>assets/costum/js/login/login.min.js"></script>
  <script>
    var BASE_URL = '<?= base_url();?>'
  </script>
</body>

</html>
