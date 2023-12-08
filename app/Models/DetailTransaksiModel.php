<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    protected $useTimestamps = true;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
    protected $dateFormat    = 'date';


    protected $allowedFields = ['kode_produk', 'id_transaksi', 'sub_harga'];

    public function findAllDetailTransaksi() {
        return $this->findAll();
    }

    public function findByIdTransaksi($id) {
        return $this->where(['id_transaksi' => $id])->get()->getResultArray();
    }

    public function deleteByIdTransaksi($id) {
        if ($this->where(['id_transaksi' => $id])->delete()) {
            return true;
        }else{
            return false;
        }
    }

    public function addDetailTransaksi($data) {
        if ($this->insert($data)) {
            return true;
        } else {
            return false;
        }
    }
}
