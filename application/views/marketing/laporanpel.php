
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

    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
<?php
include "content.php";?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
      <div>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Pelanggan</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <form class="user" method="post" action="<?php echo base_url("index.php/marketing/C_marketing/laporanpel");?>">             
                
                <div class="form-group row"><label>Tanggal Awal</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" id="tgl_awl" name="tgl_awl" required="required">
                  </div>
                </div>
                <div class="form-group row"><label>Tanggal akhir</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" id="tgl_akhr" name="tgl_akhr" required="required">
                  </div>
                </div>
                 
               
               
                  <button type="submit"  name="submit" value="add_pelanggan"  class="btn btn-primary btn-user btn-block">Tampilkan</button>
               
             
                
              
                <hr>
              </form><div id="div1">               
             <div class="card shadow mb-4">     
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pelanggan</th>
                      <th>No Hp</th>
                      <!-- <th>Produk Terjual</th> -->
                      <th>Jumlah Total Produk di Beli</th>
                      <!-- <th>Tanggal Keluar</th> -->
                      <!-- <th>Aksi</th> -->
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                      <?php $no = 0; foreach($data as $row){ ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama_pelanggan; ?></td>
                      <td><?php echo $row->no_hp; ?></td>
                      <!-- <td><?php echo $row->nama_produk;?><br><?php echo $row->ukuran_produk; ?></td>  -->
                      <td ><?php echo $row->jumlah_beli; ?></td>
                      <!-- <td ><?php echo $row->tanggal_beli; ?></td> -->
                     
                      <!-- <td class="center-align">
                        <a href="<?php echo base_url('index.php/adminop/C_adminop/edit/' . $row->id_pelanggan); ?>" class="btn btn-warning btn-circle" data-position="top" data-tooltip="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?php echo base_url('index.php/adminop/C_adminop/delete/' . $row->id_pelanggan); ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-circle " data-position="top" data-tooltip="Delete Data"><i class="fas fa-trash"></i></a>
                      </td> -->
                    </tr>
                  <?php } ?>
                  </tbody>
                
                </table>
              </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-user btn-block" onclick="printContent('div1')">Print</button>
           </div>
          <div class="row">
             
            <!-- Earnings (Monthly) Card Example -->
            
          </div>
          <div class="row">

                        
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        </div>
      </div>
      <!-- End of Main Content -->
</div>

 
 

<?php
include "footer.php";
?>      
