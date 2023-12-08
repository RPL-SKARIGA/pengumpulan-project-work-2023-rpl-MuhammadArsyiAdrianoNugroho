<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = "keranjang";
    protected $primaryKey = "id_keranjang";
    protected $allowedFields = ['id_keranjang', 'id_customer', 'kode_produk', 'harga'];
    public function getCartID()
    {
        $query = $this->db->query('SELECT MAX(id_keranjang) AS id_keranjang FROM keranjang');
        $row = $query->getRow();
        $cartId = $row->id_keranjang;
        return $cartId ? $cartId + 1 : 1;
    }

    public function getKeranjangData($id)
    {
        $sql = "SELECT * FROM produk INNER JOIN keranjang ON produk.kode_produk = keranjang.kode_produk WHERE keranjang.id_customer = '$id'";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function cekKeranjang($id, $produk)
    {
        $sql = "SELECT * FROM keranjang WHERE id_customer = $id AND kode_produk = $produk";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function hapusKeranjang($id)
    {
        $this->where(['id_customer' => $id])->delete();
    }
}
