
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
            <h1 class="h3 mb-0 text-gray-800">Promosi</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <form class="user" method="post" action="<?php echo base_url("index.php/marketing/C_marketing/promosi");?>">             
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
                <div class="form-group row"><label>Judul Promosi</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="judulpromo" name="judulpromo" required="required" placeholder="Judul Promosi.....">
                  </div>
                </div>
                <div class="form-group row"><label>Deskripsi</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <textarea class="form-control form-control-user" id="deskripsi" name="deskripsi" required="required" placeholder="Deskripsi Promosi....."></textarea> 
                  </div>
                </div>
                <div class="form-group row"><label>Kirim Ke</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                   <select class="form-control " name="id_pelanggan[]" class="form-control" multiple="multiple" id="id_pelanggan">
                   
                      <?php                                
                      foreach ($produks as $row) {  
                        echo "<option value='".$row->nama_pelanggan."'>".$row->nama_pelanggan."</option>";
                        }
                       
                      ?>
                    </select>
                  </div>
                
                </div>
                <div class="form-group row"><label>Tanggal Akhir Promo</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" id="tgl_akhir" name="tgl_akhir" required="required">
                  </div>
                </div>
                <div class="form-group row"><label>Link Halaman Survey</label>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="survey" name="survey" required >
                  </div>
                </div>
                 
               
               
                  <button type="submit"  name="submit" value="add_pelanggan"  class="btn btn-primary btn-user btn-block">Kirim</button>
             
                
              
                <hr>
              </form>
              <div class="card shadow mb-4">     
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Promo</th>
                      <th>Deskrisi</th>
                      <th>tanggal akhir</th>
                      <th>Nama Penerima</th>
                      <!-- <th></th> -->
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                      <?php $no = 0; foreach($promo as $row){ ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->judulpromo; ?></td>
                      <td><?php echo $row->deskripsi; ?></td>
                      <!-- <td><?php echo $row->nama_produk;?><br><?php echo $row->ukuran_produk; ?></td>  -->
                      <td><?php echo $row->tgl_akhir; ?></td>
                      <td><?php echo $row->id_pelanggan; ?></td>

                      <!-- <td ><?php echo $row->tanggal_beli; ?></td> -->
                     
                      <td class="center-align">
                         <a href="<?php echo base_url('index.php/marketing/C_marketing/delete/' . $row->id_promosi); ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-circle " data-position="top" data-tooltip="Delete Data"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                   <?php } ?>
                  </tbody>
                
                </table>
              </div>
              </div>
            </div>
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
