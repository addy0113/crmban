<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Tugas Akhir 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/auth/logout">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?php echo base_url(); ?>assets/js/demo/chart-bar-demo.js"></script> -->

  <!-- Bootstrap core JavaScript-->
  <!-- Core plugin JavaScript-->
  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

  

</body>
<!-- <script src="<?php echo base_url(); ?>assets/libs/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/libs/jquery.multiple.select.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/multiple-select.css"/>
    <script>
      $(document).ready(function(){
        $('#id_pelanggan').multipleSelect({
          placeholder: "Pilih Pelanggan",
          filter:true
        });
      });
    </script>
    <script src="https://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart1);
  
      function drawChart1() {
        
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Puas', 'Kurang Puas', 'Tidak Puas'],
          <?php
            foreach ($survey as $row) {
           
          echo "['{$soal_kusioner}', {$puas},{$kurang_puas},{$tidak_puas}],";
                    } 
              ?>
      ]);

      var options = {
        title: 'Survey Pelanggan Terhadap Pelayanan',
        hAxis: {title: '', titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
      chart.draw(data, options);
      }
     
    
    </script>

</html>