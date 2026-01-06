<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        {
         $data = [
            ['customer_name' => 'Siti Aisyah',
            'email' => 'aisyah@gmail.com',
            'phone' => '089645987462',
            'address' => 'Jl. Melati No. 10'
            ],
            ['customer_name' => 'Dewi pratama',
            'email' => 'dewi@gmail.com',
            'phone' => '089645986987',
            'address' => 'Jl. Mawar No. 1'
            ],
            ['customer_name' => 'Iqbal Ardiansyah',
            'email' => 'iqbal@gmail.com',
            'phone' => '089645978945',
            'address' => 'Jl. Merapi No. 7'
            ],

        ];
        $this->db->table('customers')->insertBatch($data);
    }
    }
}
