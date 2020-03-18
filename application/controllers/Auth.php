    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
     
    /* Created by: CodeCoding.ID
     * thanks for visit my website
     * www.codecoding.id
     */
     
    class Auth extends CI_Controller{
     
      public function __construct()
      {
        parent::__construct();
        $this->load->model('M_user');
      }
     
      public function cekAkun(){
        //membuat validasi login
        $username = $this->input->post('username');
        $password = $this->input->post('password');
     
        $query = $this->M_user->cekAkun($username, $password);
     
        if ($query === 1) {
          return "User Tidak Ditemukan!";
        }
        else if ($query === 2) {
          return "Password Salah!";
        }
        else {
          //membuat session dengan nama userdata
          $userData = array(
            'username' => $query->username,
            'role' => $query->role,
            'nama' => $query->nama,
            'logged_in' => TRUE
          );
          $this->session->set_userdata($userData);
          return TRUE;
        }
      }
     
      public function login(){
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('role') == "adminsis"){redirect('admin/C_admin');}
        if ($this->session->userdata('role') == "adminop"){redirect('adminop/C_adminop');}
        if ($this->session->userdata('role') == "marketing"){redirect('marketing/C_marketing');}
     
        //proses login dan validasi nya
        if ($this->input->post('submit')) {
          $this->load->model('M_user');
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
          $error = $this->cekAkun();
          if ($this->form_validation->run() && $error === TRUE) {
            $data = $this->M_user->cekAkun($this->input->post('username'), $this->input->post('password'));
     
            //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
            if($data->role == 'adminsis'){
              redirect('admin/C_admin');
            }
            else if($data->role == 'adminop'){
              redirect('adminop/C_adminop');
            }
            else if($data->role == 'marketing'){
              redirect('marketing/C_marketing');
            }
          }
     
          //Jika bernilai FALSE maka tampilkan error
          else{
            $data['error'] = $error;
            $this->load->view('login', $data);
          }
        }
        //Jika tidak maka alihkan kembali ke halaman login
        else{
          $this->load->view('login');
        }
      }
     
     
      public function logout(){
        //Menghapus semua session (sesi)
        $this->session->sess_destroy();
        redirect('auth/login');
      }
    }
  ?>