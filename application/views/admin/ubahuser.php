
<?php
include "header.php";
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- menu -->
      <?php
        include "menu.php";
        
      ?>
    <!-- end menu -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include "content.php";
        
      ?>
<!-- Begin Page Content -->
        <div class="container-fluid">
          <div>
          <!-- Page Heading -->
          
          <form class="user" method="post" action="">
                <?php if(validation_errors()): ?>
                  <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($message = $this->session->flashdata('message')): ?>
                  <div class="col s12">
                    <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                      <span class="white-text"><?php echo $message['message']; ?></span>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?php echo $user->nama; ?>" placeholder="Nama Lengkap">
                    
                  </div>
                </div>
                <div class="form-group row">
                   <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo $user->username; ?>" placeholder="Nama Pengguna">
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" value="" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <select class="form-control " id="role" name="role">
                        <option value="">---Pilih Level---</option>
                          <option <?php echo ($user->role === 'adminsis') ? 'selected' : ''; ?> value="adminsis">Admin Sistem</option>
                          <option <?php echo ($user->role === 'adminop') ? 'selected' : ''; ?> value="adminop">Admin Oprasional</option>
                          <option <?php echo ($user->role === 'marketing') ? 'selected' : ''; ?> value="marketing">Admin Marketing</option>
                      </select>
                      
                  </div>
                </div>
                <button type="submit" name="submit" value="<?php echo $user->id; ?>""  class="btn btn-primary btn-user btn-block">Simpan</button>
              
                <hr>
              </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</div>






<?php
      include"footer.php";
      ?>