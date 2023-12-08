<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $allowedFields = ['id', 'username', 'password'];
    protected $useTimetamps = false;
    protected $validationRules = [
        'username' => ['rules' => 'required'],
        'password' => ['rules' => 'required']
    ];
    public function getIDadmin()
    {
        $lastUser = $this->select('id')->orderBy('id', 'DESC')->first();
        if ($lastUser) {
            $lastNumber = (int)substr($lastUser['id'], 1);
            $newNumber= $lastNumber + 1;
            $newAdminID = 'U' . sprintf('%04d', $newNumber);
        } else {
            $newAdminID = 'U0001';
        }
        return $newAdminID;
    }
    
    public function getAdmin($name = false)
    {
        if($name == false){
            return $this->findAll();
        }
        return $this->where(['username' => $name])->first();
    }


}
