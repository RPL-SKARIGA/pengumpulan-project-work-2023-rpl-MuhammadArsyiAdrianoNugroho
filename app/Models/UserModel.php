<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Validation;

class UserModel extends Model
{
    protected $table  = "customer";
    protected $primarykey = "id";
    protected $allowedFields = ['id', 'nama', 'email', 'username', 'password', 'telp', 'provinsi', 'kota', 'alamat', 'kode_pos'];
    protected $useTimetaps = false;
    protected $validationRules = [
        'nama' => ['rules' => 'required'],
        'username' => ['rules' => 'required'],
        'telp' => ['rules' => 'required'],
        'alamat' => ['rules' => 'required'],
        'provinsi' => ['rules' => 'required'],
        'kota' => ['rules' => 'required'],
        'kode_pos' => ['rules' => 'required'],
        'email' => ['rules' => 'required|valid_email'],
        'password' => ['rules' => 'required']
    ];

    public function search($keyword)
    {
        return $this->table('customer')->like('nama', $keyword)->Orlike('username', $keyword)->Orlike('alamat', $keyword)
            ->Orlike('kota', $keyword)->Orlike('provinsi', $keyword)->Orlike('kode_pos', $keyword);
    }

    public function getIDuser()
    {
        $lastUser = $this->select('id')->orderBy('id', 'DESC')->first();
        if ($lastUser) {
            $lastNumber = (int)substr($lastUser['id'], 1);
            $newNumber = $lastNumber + 1;
            $newUserID = 'U' . sprintf('%04d', $newNumber);
        } else {
            $newUserID = 'U0001';
        }
        return $newUserID;
    }

    public function getUser($name = false)
    {
        if ($name == false) {
            return $this->findAll();
        }
        return $this->where(['username' => $name])->first();
    }

    public function getUserbyId($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function createUser($nama, $email, $username, $password, $telp, $provinsi, $kota, $alamat, $kode_pos)
    {
        $data = [
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'telp' => $telp,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
        ];

        if ($this->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateUser($id, $data)
    {
        if ($this->update($id, $data)) {
            return true;
        } else {
            return false;
        }
    }
}
