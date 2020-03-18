 <div class="card shadow mb-4">
            <div class="card-header py-3">
               <!-- <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6> -->
               
            </div>        
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <!-- <th>Nama Pelanggan</th>
                      <th>No Hp</th> -->
                      <th>Produk Terjual</th>
                      <th>Jumlah Total</th>
                      <!-- <th>Tanggal Keluar</th> -->
                      <!-- <th>Aksi</th> -->
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                      <?php $no = 0; foreach($data as $row){ ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <!-- <td><?php echo $row->nama_pelanggan; ?></td>
                      <td><?php echo $row->no_hp; ?></td> -->
                      <td><?php echo $row->nama_produk;?><br><?php echo $row->ukuran_produk; ?></td> 
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
          <script>
    window.print();
  </script>