<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'kode_produk';
    protected $useTimestamps = true;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
    protected $dateFormat    = 'date';


    protected $allowedFields = ['nama_produk', 'slug', 'deskripsi', 'harga', 'image', 'id_kategori'];

    public function getProduk($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function getProdukByName($keyword)
    {
        return $this->table('produk')->like('nama_produk', $keyword, 'after')->get()->getResultArray();
    }
    public function getProdukByKategori($id)
    {
        return $this->where(['id_kategori' => $id])->get()->getResultArray();
    }
    public function getProdukHarga($keyword)
    {
        return $this->orderBy('harga', $keyword)->get()->getResultArray();
    }
    public function search($keyword)
    {
        return $this->table('produk')->like('nama_produk', $keyword);
    }

    public function getDetailProduk($id_produk)
    {
        return $this->where(['kode_produk' => $id_produk])->get()->getResultArray();
    }

    public function findProduk($id_produk)
    {
        return $this->where(['kode_produk' => $id_produk])->get()->getRow();
    }
}
