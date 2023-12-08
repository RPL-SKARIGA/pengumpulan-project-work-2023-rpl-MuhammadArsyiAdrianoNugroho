<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Admin',
            'password' => password_hash('12345', PASSWORD_BCRYPT),
        ];
    }
}
