<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $createdField  = 'create_at';
    protected $updatedField  = 'update_at';
    protected $dateFormat    = 'date';


    protected $allowedFields = ['id_customer', 'total_harga', 'status'];

    public function transaksiByCustomer($id) {
        return $this->where(['id_customer' => $id])->get()->getResultArray();
    }

    public function findTransaksi($id) {
        return $this->where(['id_transaksi' => $id])->get()->getRow();
    }
    
    public function addTransaksi($data) {
        if ($this->insert($data)) {
            $insertID = $this->insertID();
            return $insertID;
        } else {
            return false;
        }
    }

    public function deleteTransaksi($id) {
        if ($this->where(['id_transaksi' => $id])->delete()) {
            return true;
        }else{
            return false;
        }
    }
}
