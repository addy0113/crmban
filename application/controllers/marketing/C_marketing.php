<?php

class C_marketing extends MY_Controller {

	  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->model('M_adminop');
    $this->load->model('M_marketing');
    $this->cekLogin();
    
    if ($this->session->userdata('role') == "") {
      redirect('auth/login');
    }

  }
 
  public function index(){
  	$data['pageTitle'] = 'Dashboard';
  	$data['total_user'] = $this->M_admin->hitunguser();
  	$data['pelanggan'] = $this->M_marketing->hitungjum();
    $data['pelanggan1'] = $this->M_marketing->hitungpel();
    $data['belibanyak'] = $this->M_adminop->hitungterbanyak();
    $data['rendahbeli'] = $this->M_adminop->hitungrendah();
    $data['jual'] = $this->M_adminop->hitungjual();
    foreach($this->M_marketing->laporanTahunan()->result_array() as $row)
  {
   $data['grafik'][]=(float)$row['Januari'];
   $data['grafik'][]=(float)$row['Februari'];
   $data['grafik'][]=(float)$row['Maret'];
   $data['grafik'][]=(float)$row['April'];
   $data['grafik'][]=(float)$row['Mei'];
   $data['grafik'][]=(float)$row['Juni'];
   $data['grafik'][]=(float)$row['Juli'];
   $data['grafik'][]=(float)$row['Agustus'];
   $data['grafik'][]=(float)$row['September'];
   $data['grafik'][]=(float)$row['Oktober'];
   $data['grafik'][]=(float)$row['November'];
   $data['grafik'][]=(float)$row['Desember'];
  }
  $this->load->view('marketing/index',$data);
 }
   public function promo(){
    $data['pageTitle'] = 'Promosi';
    $data['produks'] = $this->M_marketing->get_pel()->result();
    $data['promo'] = $this->M_marketing->getpromo();
    $this->load->view('marketing/promosi',$data);
  }
  public function promosi()
  {
  if ($this->input->post('submit')) {
    $judul = $this->input->post('judulpromo');
    $deskripsi = $this->input->post('deskripsi');
    $tgl = $this->input->post('tgl_akhir');
    $survey = $this->input->post('survey');
    $pengirim = "Toko Roda Kencana Ban";
    $id_pelanggan = $this->input->post('id_pelanggan');
                  $count = implode('","',$id_pelanggan);
                  $nomor = $this->db->query('SELECT no_hp FROM pelanggan_beli WHERE nama_pelanggan IN ("'.$count.'")')->result();
                  // var_dump($count);die;
                  //$nama = $this->db->query('SELECT nama_pelanggan FROM pelanggan_beli WHERE id_pelanggan IN ('.$count.')')->result();
                  //$array = $nama_pelanggan;
                  // var_dump($count);
                  
                  $itung = count($nomor);
                  for ($i=0; $i < $itung ; $i++) { 
                    // api url dan token dari chat-api.com gratis tiga hari.
                     $nomor[$i]->no_hp; echo"<br>";
                    $apiURL = 'https://eu62.chat-api.com/instance67664/';
                    $token = '6mor3ri4yyh4vljv';

                    $message = "DARI :".'['.$pengirim.']'.' '.'*'.$judul.'*'.' '.$deskripsi.' '."Promo ini berakhir sampai dengan ".$tgl.' '."jika bersedia silahkan isi survey dengan klik link berikut".' '.$survey;
                    $phone = $nomor[$i]->no_hp;

                    $data = json_encode(
                        array(
                            'chatId'=>$phone.'@c.us',
                            'body'=>$message
                        )
                    );
                    $url = $apiURL.'message?token='.$token;
                    $options = stream_context_create(
                        array('http' =>
                            array(
                                'method'  => 'POST',
                                'header'  => 'Content-type: application/json',
                                'content' => $data
                            )
                        )
                    );
                    $response = file_get_contents($url,false,$options);

                    //insert databese
                  }
    $array = [
      'judulpromo' => $judul,
      'deskripsi' => $deskripsi,
      'id_pelanggan' => str_replace('"', '', $count),
      'tgl_akhir' => $tgl
    ];
    $query = $this->M_marketing->insert($array);
     
    //$this->load->view('marketing/promosi',$data);
   
     if ($query) $message = array('status' => true, 'message' => 'Berhasil Menambahkan promo');
        else $message = array('status' => true, 'message' => 'Gagal Menambahkan Promo');
        $this->session->set_flashdata('message', $message);
        redirect('marketing/C_marketing/promo', 'refresh');
       
  }
    $data['pageTitle'] = 'Promosi';
    $data['produks'] = $this->M_marketing->get_pel()->result();
    $data['promo'] = $this->M_marketing->getpromo();
     $this->load->view('marketing/promosi',$data);
  }
  public function delete($id){
    // Ambil data user dari database
    $user = $this->M_marketing->get_where_promo(array('id_promosi' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$user) show_404();
 
    // Jalankan function delete pada model_users
    $query = $this->M_marketing->delete_promo($id);
 
    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus promosi');
    else $message = array('status' => true, 'message' => 'Gagal menghapus promosi');
 
    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);
 
    // refresh page
    redirect('marketing/C_marketing/promo', 'refresh');
  }
  //  public function survey(){
  //   $data['pageTitle'] = 'Kelola Survey';
  //   $data['kuisioner'] = $this->M_marketing->getkuisioner()->result();
   
  //   $this->load->view('marketing/survey',$data);
  // }
function lap(){
  $data['pageTitle'] = 'Laporan';
  $data['data'] = $this->M_marketing->get();
  //$data['data'] = $this->M_marketing->carisemua();
  $this->load->view('marketing/laporanpen',$data);
}
function laporan(){
  $data['pageTitle'] = 'Laporan Penjualan';
  
  $data['data'] = $this->M_marketing->carisemua();
  $this->load->view('marketing/laporanpen',$data);
}
function lapel(){
  $data['pageTitle'] = 'Laporan Pelanggan';
  $data['data'] = $this->M_marketing->getpel();
  //$data['data'] = $this->M_marketing->carisemua();
  $this->load->view('marketing/laporanpel',$data);
}
function laporanpel(){
  $data['pageTitle'] = 'Laporan Penjualan';
  
  $data['data'] = $this->M_marketing->carisemuapel();
  $this->load->view('marketing/laporanpel',$data);
}


  //  public function tambahkuis(){
  //   if ($this->input->post('submit')) {
  //     $this->form_validation->set_rules('soal_kusioner', 'Soal Kusioner', 'required|min_length[5]');
  //     $this->form_validation->set_message('required', '%s tidak boleh kosong!');
  //     $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
  //   if ($this->form_validation->run() === TRUE) {
 
  //       $data = array(
  //       	'soal_kusioner' => $this->input->post('soal_kusioner'),
  //         // 'username' => $this->input->post('username'),
  //         // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
  //         // 'role' => $this->input->post('role'),
          
  //       );

  //       $query = $this->M_marketing->insertkuis($data);
 
  //       // cek jika query berhasil
  //       if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan Pertanyaan');
  //       else $message = array('status' => true, 'message' => 'Gagal menambahkan Pertanyaan');
 
  //       // simpan message sebagai session
  //       $this->session->set_flashdata('message', $message);
 
  //       // refresh page
  //       redirect('marketing/C_marketing/survey', 'refresh');
  //     } 
  //   }
    
  //   // Data untuk page users/add
  //   $data['pageTitle'] = 'Kelola Survey';
  //   //$data['pageContent'] = $this->load->view('marketing/survey', $data, TRUE);
  //  $data['kuisioner'] = $this->M_marketing->getkuisioner()->result();
  //   // Jalankan view template/layout
  //   $this->load->view('marketing/survey', $data);
  // }
 
  // public function edit($id = null){
  //   if ($this->input->post('submit')) {
      
  //     // Mengatur validasi data password,
  //     // # required = tidak boleh kosong
  //     // # min_length[5] = password harus terdiri dari minimal 5 karakter
  //     $this->form_validation->set_rules('soal_kusioner', 'Soal kuisioner', 'required|min_length[5]');
  //     $this->form_validation->set_message('required', '%s tidak boleh kosong!');
  //     $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
  //     // Jalankan validasi jika semuanya benar maka lanjutkan
  //     if ($this->form_validation->run() === TRUE) {
 
  //       $data = array(
  //         'soal_kusioner' => $this->input->post('soal_kusioner')
  //       );
 
  //       // Jalankan function insert pada model_users
  //       $query = $this->M_marketing->update($id, $data);
 
  //       // cek jika query berhasil
  //       if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui Soal');
  //       else $message = array('status' => true, 'message' => 'Gagal memperbarui Soal');
 
  //       // simpan message sebagai session
  //       $this->session->set_flashdata('message', $message);
 
  //       // refresh page
  //       redirect('marketing/C_marketing/survey', 'refresh');
  //     } 
  //   }
    
  //   // Ambil data user dari database
  //   $kuisioner = $this->M_marketing->get_where_kuis(array('id_kuisioner' => $id))->row();
 
  //   // Jika data user tidak ada maka show 404
  //   if (!$kuisioner) show_404();
 
  //   // Data untuk page users/add
  //   $data['pageTitle'] = 'Edit Data kuisioner';
  //   $data['kuisioner'] = $kuisioner;
  //   //$data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);
 
  //   // Jalankan view template/layout
  //   $this->load->view('marketing/ubahkuis', $data);
  // }
  // public function deletekuis($id){
  //   // Ambil data user dari database
  //   $user = $this->M_marketing->get_where_kuis(array('id_kuisioner' => $id))->row();
 
  //   // Jika data user tidak ada maka show 404
  //   if (!$user) show_404();
 
  //   // Jalankan function delete pada model_users
  //   $query = $this->M_marketing->delete_kuis($id);
 
  //   // cek jika query berhasil
  //   if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Soal');
  //   else $message = array('status' => true, 'message' => 'Gagal menghapus Soal');
 
  //   // simpan message sebagai session
  //   $this->session->set_flashdata('message', $message);
 
  //   // refresh page
  //  redirect('marketing/C_marketing/survey', 'refresh');
  // }
 
//   public function delete($id)
//   {
//     // Ambil data user dari database
//     $user = $this->M_admin->get_where(array('id' => $id))->row();
 
//     // Jika data user tidak ada maka show 404
//     if (!$user) show_404();
 
//     // Jalankan function delete pada model_users
//     $query = $this->M_admin->delete($id);
 
//     // cek jika query berhasil
//     if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus user');
//     else $message = array('status' => true, 'message' => 'Gagal menghapus user');
 
//     // simpan message sebagai session
//     $this->session->set_flashdata('message', $message);
 
//     // refresh page
//     redirect('admin/C_admin/tampiluser', 'refresh');
//   }

// // Controller Produk

//   public function tampilproduk(){
//   	$data['pageTitle'] = 'Data Produk';
//     $data['produks'] = $this->M_admin->get_produk()->result();
//    // $data['pageContent'] = $this->load->view('users/userList', $data, TRUE);

//     $this->load->view('admin/produk',$data);
//   }

//   public function add_produk()
//   {
//     // Jika form di submit jalankan blok kode ini
//     if ($this->input->post('submit')) {
      
//       // Mengatur validasi data username,
//       // # required = tidak boleh kosong
//       // # min_length[5] = username harus terdiri dari minimal 5 karakter
//       // # is_unique[users.username] = username harus bernilai unique, 
//       //   tidak boleh sama dengan record yg sudah ada pada tabel users
//       $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[5]');
 
//       // Mengatur validasi data password,
//       // # required = tidak boleh kosong
//       // # min_length[5] = password harus terdiri dari minimal 5 karakter
//       $this->form_validation->set_rules('ukuran_produk', 'Ukuran produk', 'required|min_length[5]');
 
//       // Mengatur validasi data level,
//       // # required = tidak boleh kosong
//       // # in_list[administrator, alumni] = hanya boleh bernilai 
//       //   salah satu di antara administrator atau alumni
//      // $this->form_validation->set_rules('role', 'role', 'required|in_list[adminsis,adminop,marketing]');
 
//       // Mengatur validasi data active,
//       // # required = tidak boleh kosong
//       // # in_list[0, 1] = hanya boleh bernilai 
//       // salah satu di antara 0 atau 1
      
 
//       // Mengatur pesan error validasi data
//       $this->form_validation->set_message('required', '%s tidak boleh kosong!');
//       $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
//       // Jalankan validasi jika semuanya benar maka lanjutkan
//       if ($this->form_validation->run() === TRUE) {
 
//         $data = array(
//         	'nama_produk' => $this->input->post('nama_produk'),
//           'ukuran_produk' => $this->input->post('ukuran_produk'),
//           // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
//           // 'role' => $this->input->post('role'),
          
//         );
 
//         // Jalankan function insert pada model_users
//         $query = $this->M_admin->insert_produk($data);
 
//         // cek jika query berhasil
//         if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan Produk');
//         else $message = array('status' => true, 'message' => 'Gagal menambahkan Produk');
 
//         // simpan message sebagai session
//         $this->session->set_flashdata('message', $message);
 
//         // refresh page
//         redirect('admin/C_admin/tampilproduk', 'refresh');
//       } 
//     }
//     $data['pageTitle'] = 'Tambah Data Produk';
//     $data['pageContent'] = $this->load->view('admin/tambahproduk', $data, TRUE);
 
//     // Jalankan view template/layout
//     $this->load->view('admin/tambahPRODUK', $data);
//    }

//     public function edit_produk($id = null)
//   {
//     // Jika form di submit jalankan blok kode ini
//     if ($this->input->post('submit')) {
      
//       // Mengatur validasi data password,
//       // # required = tidak boleh kosong
//       // # min_length[5] = password harus terdiri dari minimal 5 karakter
//       $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[5]');
 
//       // Mengatur validasi data level,
//       // # required = tidak boleh kosong
//       // # in_list[administrator, alumni] = hanya boleh bernilai 
//       //   salah satu di antara administrator atau alumni
//      // $this->form_validation->set_rules('role', 'role', 'required|in_list[adminsis,adminop,marketing]');
//  	 $this->form_validation->set_rules('ukuran_produk', 'Ukuran Produk', 'required|min_length[5]');
//       // Mengatur validasi data active,
//       // # required = tidak boleh kosong
//       // # in_list[0, 1] = hanya boleh bernilai 
//       // salah satu di antara 0 atau 1
      
 
//       // Mengatur pesan error validasi data
//       $this->form_validation->set_message('required', '%s tidak boleh kosong!');
//       $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
//       // Jalankan validasi jika semuanya benar maka lanjutkan
//       if ($this->form_validation->run() === TRUE) {
 
//         $data = array(
//           'nama_produk' => $this->input->post('nama_produk'),
//           'ukuran_produk' => $this->input->post('ukuran_produk') 
//           // 'role' => $this->input->post('role'),
//           // 'nama' => $this->input->post('nama')
//         );
 
//         // Jalankan function insert pada model_users
//         $query = $this->M_admin->update_produk($id, $data);
 
//         // cek jika query berhasil
//         if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui Produk');
//         else $message = array('status' => true, 'message' => 'Gagal memperbarui Produk');
 
//         // simpan message sebagai session
//         $this->session->set_flashdata('message', $message);
 
//         // refresh page
//         redirect('admin/C_admin/tampilproduk', 'refresh');
//       } 
//     }
    
//     // Ambil data user dari database
//     $produk = $this->M_admin->get_where_produk(array('id_produk' => $id))->row();
 
//     // Jika data user tidak ada maka show 404
//     if (!$produk) show_404();
 
//     // Data untuk page users/add
//     $data['pageTitle'] = 'Edit Data Produk';
//     $data['produk'] = $produk;
//     //$data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);
 
//     // Jalankan view template/layout
//     $this->load->view('admin/ubahproduk', $data);
//   }
 
//   public function delete_produk($id)
//   {
//     // Ambil data user dari database
//     $produk = $this->M_admin->get_where_produk(array('id_produk' => $id))->row();
 
//     // Jika data user tidak ada maka show 404
//     if (!$produk) show_404();
 
//     // Jalankan function delete pada model_users
//     $query = $this->M_admin->delete_produk($id);
 
//     // cek jika query berhasil
//     if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Produk');
//     else $message = array('status' => true, 'message' => 'Gagal menghapus Produk');
 
//     // simpan message sebagai session
//     $this->session->set_flashdata('message', $message);
 
//     // refresh page
//     redirect('admin/C_admin/tampilproduk', 'refresh');
//   }
  

}

 
?>