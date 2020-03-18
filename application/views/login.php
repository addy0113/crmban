<?php 
include "css/header_login.php";
?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <!-- kode agar backgroud putih login lebih besar untuk tempat gambar -->
      <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->
        <!-- Akhir kode agar backgroud putih login lebih besar untuk tempat gambar -->

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- untuk nampilin gambar di login -->
            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
            <!-- Akhir nampilin gambar di login -->
              <!-- <div position="center"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Dihalaman Login</h1>
                  </div>
                         <?php
                          //menampilkan error menggunakan alert javascript
                            if(isset($error)){
                            echo '<script>
                            alert("'.$error.'");
                            </script>';
                            }
                          ?>
                  <form class="user" method="post" action="<?php echo base_url(); ?>index.php/Auth/login">
                   
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Nama Penggunna..."><?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password"><?php echo form_error('password'); ?>
                    </div>
                   <!--  <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <button class="btn btn-primary btn-user btn-block" name="submit" value="login" type="submit">Login</button>
                    
                    <hr>
                    <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                    
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <?php 
include "css/footer_login.php";
?>