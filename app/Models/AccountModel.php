<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $useTimestamps = false;

    public function search($keyword)
    {
        return $this->table('customer')->like('nama_produk', $keyword)->orLike('username', $keyword)->orLike('alamat', $keyword)
        ->orLike('kota', $keyword)->orLike('provinsi', $keyword)->orLike('kode_pos', $keyword);
    }
}