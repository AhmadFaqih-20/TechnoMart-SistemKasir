<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    public function run()
    {
        {
         $data = [
            ['employee_name' => 'Yunita Jeni',
            'email' => 'yunita@gmail.com',
            'phone' => '089912345678',
            'position' => 'Kasir',
            'hire_date' => '2025-12-02',
            'status' => 'Aktif',
            ],
            ['employee_name' => 'Agung Coros',
            'email' => 'agung@gmail.com',
            'phone' => '089912345679',
            'position' => 'Admin Gudang',
            'hire_date' => '2025-11-10',
            'status' => 'Aktif',
            ],
        ];
        $this->db->table('employees')->insertBatch($data);
    }
    }
}
