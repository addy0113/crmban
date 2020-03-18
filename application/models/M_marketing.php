<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class M_marketing extends CI_Model {
 

 		public $table = 'pelanggan_beli';
 
 // Model Pengguna
		    public function get()
		    {
		      // Jalankan query
		     $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		     $this->db->select_sum('jumlah_beli');
		     $this->db->group_by('pelanggan_beli.id_produk');
		     $query = $this->db->get();
		     return $query->result();
		    }
		function carisemua(){
			
		     $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		    $this->db->where('tanggal_beli >=',$this->input->post('tgl_awl'));
		    $this->db->where('tanggal_beli <=',$this->input->post('tgl_akhr'));
		    $this->db->select_sum('jumlah_beli');
		    $this->db->group_by('pelanggan_beli.id_produk');
		    $query = $this->db->get();
		    return $query->result();
		}
		public function getpel()
		    {
		      // Jalankan query
		     $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		     $this->db->select_sum('jumlah_beli');
		     $this->db->group_by('pelanggan_beli.nama_pelanggan');
		     $query = $this->db->get();
		     return $query->result();
		    }
		 function carisemuapel(){
			
		     $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		    $this->db->where('tanggal_beli >=',$this->input->post('tgl_awl'));
		    $this->db->where('tanggal_beli <=',$this->input->post('tgl_akhr'));
		    $this->db->select_sum('jumlah_beli');
		    $this->db->group_by('pelanggan_beli.nama_pelanggan');
		    $query = $this->db->get();
		    return $query->result();
		}
		public function hitungjum()
      {   
          $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		     $this->db->select_sum('jumlah_beli');
		     $this->db->group_by('pelanggan_beli.nama_pelanggan');
           $query = $this->db->get();
           if($query->num_rows()>0)
           {
             return $query->row()->jumlah_beli;
           }
           else
           {
             return 0;
           }
      }
      public function hitungpel()
      {   
          $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		     $this->db->select_sum('jumlah_beli');
		     $this->db->group_by('pelanggan_beli.nama_pelanggan');
           $query = $this->db->get();
           if($query->num_rows()>0)
           {
             return $query->row()->nama_pelanggan;
           }
           else
           {
             return 0;
           }
      }
      
      public function get_pel()
    {
      // Jalankan query
      $this->db->select('*');
		     $this->db->from('produk');
		     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		     $this->db->group_by('pelanggan_beli.nama_pelanggan');
           $query = $this->db->get();
 
      // Return hasil query
      return $query;
    }
    public function getpromo()
		    {
		      // Jalankan query
		    // return $this->db->query('SELECT * FROM pelanggan_beli JOIN promosi ON pelanggan_beli.id_pelanggan = promosi.id_pelanggan GROUP BY promosi.judulpromo, promosi.id_pelanggan')->result();
		     $this->db->select('*');
		     $this->db->from('promosi');
		     // $this->db->join('promosi', 'pelanggan_beli.id_pelanggan = promosi.id_pelanggan');
		     // // $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
		     // // $this->db->select_sum('jumlah_beli');
		     // $this->db->group_by('promosi.judulpromo');
		     $query = $this->db->get();
		     return $query->result();
		    }
    
		function laporanTahunan()
		 {
		  
		  $bc = $this->db->query("
		  
		  select
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=1)AND (YEAR(tanggal_beli)=2019))),0) AS `Januari`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=2)AND (YEAR(tanggal_beli)=2019))),0) AS `Februari`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=3)AND (YEAR(tanggal_beli)=2019))),0) AS `Maret`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=4)AND (YEAR(tanggal_beli)=2019))),0) AS `April`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=5)AND (YEAR(tanggal_beli)=2019))),0) AS `Mei`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=6)AND (YEAR(tanggal_beli)=2019))),0) AS `Juni`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=7)AND (YEAR(tanggal_beli)=2019))),0) AS `Juli`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=8)AND (YEAR(tanggal_beli)=2019))),0) AS `Agustus`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=9)AND (YEAR(tanggal_beli)=2019))),0) AS `September`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=10)AND (YEAR(tanggal_beli)=2019))),0) AS `Oktober`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=11)AND (YEAR(tanggal_beli)=2019))),0) AS `November`,
		  ifnull((SELECT sum(jumlah_beli) FROM (pelanggan_beli)WHERE((Month(tanggal_beli)=12)AND (YEAR(tanggal_beli)=2019))),0) AS `Desember`
		 from pelanggan_beli GROUP BY YEAR(tanggal_beli) 
		  
		  ");
		  
		  return $bc;
		  
		 }
		 	public $tabel = 'promosi';
		  	public function insert($data){
		      // Jalankan query
		      $query = $this->db->insert($this->tabel, $data);
		 
		      // Return hasil query
		      return $query;
		    }
		    public function delete_promo($id){
		      // Jalankan query
		      $query = $this->db
		        ->where('id_promosi', $id)
		        ->delete($this->tabel);
		      
		      // Return hasil query
		      return $query;
		    }
		    public function get_where_promo($where){
		      // Jalankan query
		      $query = $this->db
		        ->where($where)
		        ->get($this->tabel);
		 
		      // Return hasil query
		      return $query;
		    }
		    public $tab = 'kuisioner';
		    public function getkuisioner(){
      // Jalankan query
		      $query = $this->db->get($this->tab);
		 
		      // Return hasil query
		      return $query;
		    }
		    public function insertkuis($data){
		      // Jalankan query
		      $query = $this->db->insert($this->tab, $data);
		 
		      // Return hasil query
		      return $query;
		    }
		    public function get_where_kuis($where){
		      // Jalankan query
		      $query = $this->db
		        ->where($where)
		        ->get($this->tab);
		 
		      // Return hasil query
		      return $query;
		    }
		     public function update($id, $data) {
		      // Jalankan query
		      $query = $this->db
		        ->where('id_kuisioner', $id)
		        ->update($this->tab, $data);
		      
		      // Return hasil query
		      return $query;
		    }
		    public function delete_kuis($id){
		      // Jalankan query
		      $query = $this->db
		        ->where('id_kuisioner', $id)
		        ->delete($this->tab);
		      
		      // Return hasil query
		      return $query;
		    }
		 // public function tampilsurvey(){
		 // 	$this->db->select('*');
		 //     $this->db->from('isi_kuisioner');
		 //     $this->db->join('kuisioner','kuisioner.id_kuisioner=isi_kuisioner.id_kuisioner');
		 //     //$this->db->select_sum('puas,kurang_puas,tidak_puas');
		 //     //$this->db->group_by('pelanggan_beli.nama_pelanggan');
   //         $query = $this->db->get();

   //         return $query->result();
           
   //     //       return $query->result();
		 // 	// return $this->db->query("SELECT *, (isi_kuisioner.puas)as puas,(isi_kuisioner.kurang_puas) as kurang_puas,(isi_kuisioner.tidak_puas) as tidak_puas 
		 // 	// 						 FROM kuisioner 
		 // 	// 						 LEFT JOIN isi_kuisioner 
		 // 	// 						 ON isi_kuisioner.id_kuisioner=kuisioner.id_kuisioner")->result();
           
		 // }

	// function get_row(){        
	// 	$query= $this->db->query("SELECT SUM(puas),SUM(kurang_puas),SUM(tidak_puas) as kurang_puas FROM isi_kuisioner WHERE id_kuisioner ='1' ");        
	// 	return $query->result();   
	//  }
 //    function get_row1(){       
 //     return $this->db->query("SELECT SUM(puas),SUM(kurang_puas),SUM(tidak_puas) as kurang_puas FROM isi_kuisioner WHERE id_kuisioner ='2'")->result();   
 //      }   
     // function get_row2(){        
     // return $this->db->query("SELECT COUNT(bem) as suara FROM pemilihan WHERE  bem='3'")->result();   
     //  }    
     // function get_row3(){
     // $query= $this->db->query("SELECT COUNT(bem) as suara FROM pemilihan WHEREbem='4' ");        
     // return $query->result();    }   
     // function get_row4(){        
     // return $this->db->query("SELECT COUNT(bem) as suara FROM pemilihan WHERE  bem='5'")->result();   
     //  }    
     // function get_row5(){        
     // return $this->db->query("SELECT COUNT(bem) as suara FROM pemilihan WHERE  bem='6'")->result();   
     //  }

}
?>