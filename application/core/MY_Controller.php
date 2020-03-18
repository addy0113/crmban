    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
     
    /* Created by: CodeCoding.ID
     * thanks for visit my website
     * www.codecoding.id
     */
     
    class MY_Controller extends CI_Controller{
     
      public function __construct()
      {
        parent::__construct();
      }
     
      public function cekLogin(){
        //Jika tidak ada session (username) maka alihkan ke controller login
        if (!$this->session->userdata('username')) {
          redirect('auth/login');
        }
      }
    }