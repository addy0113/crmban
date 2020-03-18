<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class M_admin extends CI_Model {
 
    public $table = 'user';
 
 // Model Pengguna
    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);
 
      // Return hasil query
      return $query;
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
        ->where('id', $id)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }
 
    public function delete($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }
    public function hitunguser()
      {   
          $query = $this->db->get('user');
          if($query->num_rows()>0)
          {
            return $query->num_rows();
          }
          else
          {
            return 0;
          }
      }
//Model Produk
      public $tabel = 'produk';

      public function hitungproduk()
      {   
          $query = $this->db->get('produk');
          if($query->num_rows()>0)
          {
            return $query->num_rows();
          }
          else
          {
            return 0;
          }
      }

      public function get_produk()
    {
      // Jalankan query
      $query = $this->db->get($this->tabel);
 
      // Return hasil query
      return $query;
    }
    public function insert_produk($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->tabel, $data);
 
      // Return hasil query
      return $query;
    }

     public function update_produk($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_produk', $id)
        ->update($this->tabel, $data);
      
      // Return hasil query
      return $query;
    }

    public function get_where_produk($where)
    {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->tabel);
 
      // Return hasil query
      return $query;
    }

    public function delete_produk($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('id_produk', $id)
        ->delete($this->tabel);
      
      // Return hasil query
      return $query;
    }
    function get_one($id)
  {
    // $param = array('id_produk' => $id);
    // return $this->db->get_where('pelanggan_beli', $param);
    $this->db->select('produk.id_produk');
    $this->db->from('produk');
    $this->db->join('pelanggan_beli','produk.id_produk = pelanggan_beli.id_produk');
    $this->db->where('pelanggan_beli.id_pelanggan',$id);
    $query = $this->db->get();
    return $query;
  }

}