<?php

class C_admin extends MY_Controller {

	  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->cekLogin();
    
    if ($this->session->userdata('role') == "") {
      redirect('auth/login');
    }

  }
 
  public function index(){
  	$data['pageTitle'] = 'Dashboard';
  	$data['total_user'] = $this->M_admin->hitunguser();
  	$data['total_produk'] = $this->M_admin->hitungproduk();
    $this->load->view('admin/index',$data);
  }

// Controller Pengguna
  public function tampiluser(){
  	$data['pageTitle'] = 'Data Pengguna';
    $data['users'] = $this->M_admin->get()->result();
   // $data['pageContent'] = $this->load->view('users/userList', $data, TRUE);

    $this->load->view('admin/user',$data);
  }

   public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data username,
      // # required = tidak boleh kosong
      // # min_length[5] = username harus terdiri dari minimal 5 karakter
      // # is_unique[users.username] = username harus bernilai unique, 
      //   tidak boleh sama dengan record yg sudah ada pada tabel users
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
 
      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
 
      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator,] = hanya boleh bernilai 
      //   salah satu di antara administrator 
      $this->form_validation->set_rules('role', 'role', 'required|in_list[adminsis,adminop,marketing]');
 
      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai 
      // salah satu di antara 0 atau 1
      
 
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {
 
        $data = array(
        	'nama' => $this->input->post('nama'),
          'username' => $this->input->post('username'),
          'password' => MD5($this->input->post('password')),
          'role' => $this->input->post('role'),
          
        );
 
        // Jalankan function insert pada model_users
        $query = $this->M_admin->insert($data);
 
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan user');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan user');
 
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);
 
        // refresh page
        redirect('admin/C_admin/tampiluser', 'refresh');
      } 
    }
    
    // Data untuk page users/add
    $data['pageTitle'] = 'Tambah Data User';
    $data['pageContent'] = $this->load->view('admin/tambahuser', $data, TRUE);
 
    // Jalankan view template/layout
    $this->load->view('admin/tambahuser', $data);
  }
 
  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
 
      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
      $this->form_validation->set_rules('role', 'role', 'required|in_list[adminsis,adminop,marketing]');
 
      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai 
      // salah satu di antara 0 atau 1
      
 
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {
 
        $data = array(
          'nama' => $this->input->post('nama'),
          'password' => MD5($this->input->post('password')),
          'role' => $this->input->post('role'),
          'nama' => $this->input->post('nama')
        );
 
        // Jalankan function insert pada model_users
        $query = $this->M_admin->update($id, $data);
 
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui user');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui user');
 
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);
 
        // refresh page
        redirect('admin/C_admin/tampiluser', 'refresh');
      } 
    }
    
    // Ambil data user dari database
    $user = $this->M_admin->get_where(array('id' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$user) show_404();
 
    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data Pengguna';
    $data['user'] = $user;
    //$data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);
 
    // Jalankan view template/layout
    $this->load->view('admin/ubahuser', $data);
  }
 
  public function delete($id)
  {
    // Ambil data user dari database
    $user = $this->M_admin->get_where(array('id' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$user) show_404();
 
    // Jalankan function delete pada model_users
    $query = $this->M_admin->delete($id);
 
    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus user');
    else $message = array('status' => true, 'message' => 'Gagal menghapus user');
 
    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);
 
    // refresh page
    redirect('admin/C_admin/tampiluser', 'refresh');
  }

// Controller Produk

  public function tampilproduk(){
  	$data['pageTitle'] = 'Data Produk';
    $data['produks'] = $this->M_admin->get_produk()->result();
   // $data['pageContent'] = $this->load->view('users/userList', $data, TRUE);

    $this->load->view('admin/produk',$data);
  }

  public function add_produk()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data username,
      // # required = tidak boleh kosong
      // # min_length[5] = username harus terdiri dari minimal 5 karakter
      // # is_unique[users.username] = username harus bernilai unique, 
      //   tidak boleh sama dengan record yg sudah ada pada tabel users
      $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[5]');
 
      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('ukuran_produk', 'Ukuran produk', 'required|min_length[5]');
 
      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
     // $this->form_validation->set_rules('role', 'role', 'required|in_list[adminsis,adminop,marketing]');
 
      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai 
      // salah satu di antara 0 atau 1
      
 
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {
 
        $data = array(
        	'nama_produk' => $this->input->post('nama_produk'),
          'ukuran_produk' => $this->input->post('ukuran_produk'),
          // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          // 'role' => $this->input->post('role'),
          
        );
 
        // Jalankan function insert pada model_users
        $query = $this->M_admin->insert_produk($data);
 
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan Produk');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan Produk');
 
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);
 
        // refresh page
        redirect('admin/C_admin/tampilproduk', 'refresh');
      } 
    }
    $data['pageTitle'] = 'Tambah Data Produk';
    $data['pageContent'] = $this->load->view('admin/tambahproduk', $data, TRUE);
 
    // Jalankan view template/layout
    $this->load->view('admin/tambahPRODUK', $data);
   }

    public function edit_produk($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|min_length[5]');
 
      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai 
      //   salah satu di antara administrator atau alumni
     // $this->form_validation->set_rules('role', 'role', 'required|in_list[adminsis,adminop,marketing]');
 	 $this->form_validation->set_rules('ukuran_produk', 'Ukuran Produk', 'required|min_length[5]');
      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai 
      // salah satu di antara 0 atau 1
      
 
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {
 
        $data = array(
          'nama_produk' => $this->input->post('nama_produk'),
          'ukuran_produk' => $this->input->post('ukuran_produk') 
          // 'role' => $this->input->post('role'),
          // 'nama' => $this->input->post('nama')
        );
 
        // Jalankan function insert pada model_users
        $query = $this->M_admin->update_produk($id, $data);
 
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui Produk');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui Produk');
 
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);
 
        // refresh page
        redirect('admin/C_admin/tampilproduk', 'refresh');
      } 
    }
    
    // Ambil data user dari database
    $produk = $this->M_admin->get_where_produk(array('id_produk' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$produk) show_404();
 
    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data Produk';
    $data['produk'] = $produk;
    //$data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);
 
    // Jalankan view template/layout
    $this->load->view('admin/ubahproduk', $data);
  }
 
  public function delete_produk($id)
  {
    // Ambil data user dari database
    $produk = $this->M_admin->get_where_produk(array('id_produk' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$produk) show_404();
 
    // Jalankan function delete pada model_users
    $query = $this->M_admin->delete_produk($id);
 
    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Produk');
    else $message = array('status' => true, 'message' => 'Gagal menghapus Produk');
 
    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);
 
    // refresh page
    redirect('admin/C_admin/tampilproduk', 'refresh');
  }
  

}

 
?>