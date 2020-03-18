<?php

class C_adminop extends MY_Controller {

	  public function __construct()
  {
    parent::__construct();
     $this->load->model('M_adminop');
     $this->load->model('M_admin');
    $this->cekLogin();
    if ($this->session->userdata('role') == "") {
      redirect('auth/login');
    }
  }
 
  public function index(){
    $data['pageTitle'] = 'Dashboard';
    $data['belibanyak'] = $this->M_adminop->hitungterbanyak();
    $data['rendahbeli'] = $this->M_adminop->hitungrendah();
    $data['jual'] = $this->M_adminop->hitungjual();
    $this->load->view('adminop/index',$data);
  }

// Controller Pengguna
  public function tampilpelanggan(){
    $data['pageTitle'] = 'Data Pelanggan';
    $data['pelanggan'] = $this->M_adminop->get();
   // $data['pageContent'] = $this->load->view('users/userList', $data, TRUE);

    $this->load->view('adminop/pelanggan',$data);
  }
  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
     $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|min_length[5]');
     $this->form_validation->set_rules('no_hp', 'No Hp', 'required|min_length[5]');
     $this->form_validation->set_rules('id_produk', 'Produk Beli', 'required');
     $this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'required');
     $this->form_validation->set_rules('tanggal_beli', 'Tanggal Beli', 'required');
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {
 
        $data = array(
          'nama_pelanggan' => $this->input->post('nama_pelanggan'),
          'no_hp' => $this->input->post('no_hp'),
          'id_produk' => $this->input->post('id_produk'),
          //'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'jumlah_beli' => $this->input->post('jumlah_beli'),
          'tanggal_beli' => $this->input->post('tanggal_beli'),
          
        );
 
        // Jalankan function insert pada model_users
        $query = $this->M_adminop->insert($data);
 
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan Pelanggan');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan Pelanggan');
 
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);
 
        // refresh page
        redirect('adminop/C_adminop/tampilpelanggan', 'refresh');
      } 
    }
    
    // Data untuk page users/add
    $data['pageTitle'] = 'Tambah Data Pelanggan';
    $data['pageContent'] = $this->load->view('adminop/tambahpelanggan', $data, TRUE);
  $data['produks'] = $this->M_admin->get_produk()->result();
                                
    // Jalankan view template/layout
    $this->load->view('adminop/tambahpelanggan', $data);
  }
 
  public function edit($id)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {
      
      $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|min_length[5]');
     $this->form_validation->set_rules('no_hp', 'No Hp', 'required|min_length[5]');
     $this->form_validation->set_rules('id_produk', 'Produk Beli', 'required');
     $this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'required');
     $this->form_validation->set_rules('tanggal_beli', 'Tanggal Beli', 'required');
      
 
      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');
 
      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {
 
        $data = array(
          'nama_pelanggan' => $this->input->post('nama_pelanggan'),
          'no_hp' => $this->input->post('no_hp'),
          'id_produk' => $this->input->post('id_produk'),
          //'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'jumlah_beli' => $this->input->post('jumlah_beli'),
          'tanggal_beli' => $this->input->post('tanggal_beli'),
        );
 
        // Jalankan function insert pada model_users
        $query = $this->M_adminop->update($id, $data);
 
        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui Pelanggan');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui Pelanggan');
 
        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);
 
        // refresh page
        redirect('adminop/C_adminop/tampilpelanggan', 'refresh');
      } 
    }
    
    // Ambil data user dari database
    $pelanggan = $this->M_adminop->get_where(array('id_pelanggan' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$pelanggan) show_404();
 
    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data Pelanggan';
    $data['pelanggan'] = $pelanggan;
    $data['produks'] = $this->M_admin->get_produk()->result();
    $data['record'] = $this->M_admin->get_one($id)->row_array();
    // var_dump($data['produks']);die;
    //$data['pageContent'] = $this->load->view('users/userEdit', $data, TRUE);
 
    // Jalankan view template/layout
    $this->load->view('adminop/ubahpelanggan', $data);
  }
 
  public function delete($id)
  {
    // Ambil data user dari database
    $pelanggan = $this->M_adminop->get_where(array('id_pelanggan' => $id))->row();
 
    // Jika data user tidak ada maka show 404
    if (!$pelanggan) show_404();
 
    // Jalankan function delete pada model_users
    $query = $this->M_adminop->delete($id);
 
    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Pelanggan');
    else $message = array('status' => true, 'message' => 'Gagal menghapus Pelanggan');
 
    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);
 
    // refresh page
    redirect('adminop/C_adminop/tampilpelanggan', 'refresh');
  }

  
}
?>