
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
               --><a href="<?php echo base_url('index.php/admin/C_admin/add'); ?>" class="btn btn-primary btn-icon-split" >
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
                      <th>Nama</th>
                      <th>Nama Pengguna</th>
                      <!-- <th>Kata Sandi</th> -->
                      <th>Level</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                      <?php $no = 0; foreach($users as $row){ ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <!-- <td><?php echo $row->password; ?></td> -->
                      <td ><?php if($row->role == 'adminop'){
                        echo "Admin Oprasional";
                      }elseif ($row->role == 'adminsis') {
                        echo "Admin Sistem";
                      } else{
                        echo "Admin Marketing";
                      }
                      // echo $row->role; ?></td>
                     
                      <td class="center-align">
                        <a href="<?php echo base_url('index.php/admin/C_admin/edit/' . $row->id); ?>" class="btn btn-warning btn-circle" data-position="top" data-tooltip="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                        <?php if ($row->role != 'adminsis'): ?>
                          
                          <a href="<?php echo base_url('index.php/admin/C_admin/delete/' . $row->id); ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-circle " data-position="top" data-tooltip="Delete Data"><i class="fas fa-trash"></i></a>
                        <?php endif ?>
                        
                        
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