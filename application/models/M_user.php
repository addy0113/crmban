<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_user extends CI_Model {

		  public $table = 'user';
 
  public function __construct() {
      parent::__construct();
  }
 
  public function cekAkun($username, $password){
    //cari username lalu lakukan validasi
    $this->db->where('username', $username);
    $query = $this->db->get($this->table)->row();
    //jika bernilai 1 maka user tidak ditemukan
    if (!$query) return 1;
    //jika bernilai 2 maka user tidak aktif
    
    //jika bernilai 3 maka password salah
    $hash = $query->password;
    if (md5($password) != $hash) return 2;
    return $query;
  }
 }

?>