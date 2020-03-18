
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
                    <input type="text" class="form-control form-control-user" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo set_value('nama_pelanggan'); ?>" placeholder="Nama Pelanggan">
                  </div>
                </div>
                <div class="form-group row">
                   <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="number" class="form-control form-control-user" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp'); ?>" placeholder="No Hp....">
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <select class="form-control " name="id_produk" id="id_produk">
                    <option value="" >-- Pilih Produk --</option>
                      <?php                                
                      foreach ($produks as $row) {  
                        echo "<option value='".$row->id_produk."'>".$row->nama_produk.$row->ukuran_produk."</option>";
                        }
                       
                      ?>
                    </select>
                  </div>
                
                </div>
                <div class="form-group row">
                   <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="jumlah_beli" name="jumlah_beli" value="<?php echo set_value('jumlah_beli'); ?>" placeholder="Jumlah ....">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" id="tanggal_beli" name="tanggal_beli" value="<?php echo set_value('tanggal_beli'); ?>" placeholder="tanggal">
                  </div>
                </div>
                
                <button type="submit" name="submit" value="add_pelanggan"  class="btn btn-primary btn-user btn-block">Simpan</button>
              
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