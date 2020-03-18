
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
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
               --><a href="<?php echo base_url('index.php/adminop/C_adminop/add'); ?>" class="btn btn-primary btn-icon-split" >
                    <span class="icon text-white-50">
                      <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                  </a>
            </div>        
            <div class="card-body">
              <div class="table-responsive">
                <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pelanggan</th>
                      <th>No Hp</th>
                      <th>Produk Beli</th>
                      <th>Jumlah</th>
                      <th>Tanggal Beli</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                      <?php $no = 0; foreach($pelanggan as $row){ ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama_pelanggan; ?></td>
                      <td><?php echo $row->no_hp; ?></td>
                      <td><?php echo $row->nama_produk;?><br><?php echo $row->ukuran_produk; ?></td> 
                      <td ><?php echo $row->jumlah_beli; ?></td>
                      <td ><?php echo $row->tanggal_beli; ?></td>
                     
                      <td class="center-align">
                        <a href="<?php echo base_url('index.php/adminop/C_adminop/edit/' . $row->id_pelanggan); ?>" class="btn btn-warning btn-circle" data-position="top" data-tooltip="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?php echo base_url('index.php/adminop/C_adminop/delete/' . $row->id_pelanggan); ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-circle " data-position="top" data-tooltip="Delete Data"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                      
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</div>






<?php
      include"footer.php";
      ?>