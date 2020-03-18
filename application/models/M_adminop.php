<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class M_adminop extends CI_Model {
 
    public $table = 'pelanggan_beli';
 
 // Model Pengguna
    public function get()
    {
      // Jalankan query
     $this->db->select('*');
     $this->db->from('produk');
     $this->db->join('pelanggan_beli','pelanggan_beli.id_produk=produk.id_produk');
     $query = $this->db->get();
     return $query->result();
    }
 
    public function get_where($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);
 
      // Return hasil query
      return $query;
    }
 
    public function insert($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);
 
      // Return hasil query
      return $query;
    }
 
    public function update($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_pelanggan', $id)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }
 
    public function delete($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_pelanggan', $id)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
    public function hitungterbanyak()
      {   
          $this->db->select_max('jumlah_beli');
           $query = $this->db->get('pelanggan_beli');
           if($query->num_rows()>0)
           {
             return $query->row()->jumlah_beli;
           }
           else
           {
             return 0;
           }
      }
      public function hitungrendah()
      {   
          $this->db->select_min('jumlah_beli');
           $query = $this->db->get('pelanggan_beli');
           if($query->num_rows()>0)
           {
             return $query->row()->jumlah_beli;
           }
           else
           {
             return 0;
           }
      }
      public function hitungjual()
      {   
          $this->db->select_sum('jumlah_beli');
           $query = $this->db->get('pelanggan_beli');
           if($query->num_rows()>0)
           {
             return $query->row()->jumlah_beli;
           }
           else
           {
             return 0;
           }
      }
    // public function hitunguser()
    //   {   
    //       $query = $this->db->get('user');
    //       if($query->num_rows()>0)
    //       {
    //         return $query->num_rows();
    //       }
    //       else
    //       {
    //         return 0;
    //       }
    //   }
//Model Produk
    //   public $tabel = 'produk';

    //   public function hitungproduk()
    //   {   
    //       $query = $this->db->get('produk');
    //       if($query->num_rows()>0)
    //       {
    //         return $query->num_rows();
    //       }
    //       else
    //       {
    //         return 0;
    //       }
    //   }

    //   public function get_produk()
    // {
    //   // Jalankan query
    //   $query = $this->db->get($this->tabel);
 
    //   // Return hasil query
    //   return $query;
    // }
    // public function insert_produk($data)
    // {
    //   // Jalankan query
    //   $query = $this->db->insert($this->tabel, $data);
 
    //   // Return hasil query
    //   return $query;
    // }

    //  public function update_produk($id, $data)
    // {
    //   // Jalankan query
    //   $query = $this->db
    //     ->where('id_produk', $id)
    //     ->update($this->tabel, $data);
      
    //   // Return hasil query
    //   return $query;
    // }

    // public function get_where_produk($where)
    // {
    //   // Jalankan query
    //   $query = $this->db
    //     ->where($where)
    //     ->get($this->tabel);
 
    //   // Return hasil query
    //   return $query;
    // }

    // public function delete_produk($id)
    // {
    //   // Jalankan query
    //   $query = $this->db
    //     ->where('id_produk', $id)
    //     ->delete($this->tabel);
      
    //   // Return hasil query
    //   return $query;
    // }

}