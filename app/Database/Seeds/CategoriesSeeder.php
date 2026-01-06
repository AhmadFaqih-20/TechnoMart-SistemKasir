<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        {
         $data = [
            ['name' => 'Elektronik Rumah Tangga',
            'description' => 'Mempermudah Anda dalam Mengerjakan Sesuatu dalam Rumah Tangga',
            ],
            ['name' => 'Elektronik Hiburan',
            'description' => 'Menghibur Waktu Luang Anda sehingga tidak Kosong Waktu Weekend Anda',
            ],
            ['name' => 'Elektronik Komunikasi',
            'description' => 'Mempermudah Anda dalam Berkomunikasi dengan yang Lain',
            ],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
    }
}
