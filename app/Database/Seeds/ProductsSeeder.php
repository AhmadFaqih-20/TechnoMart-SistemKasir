<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        {
         $data = [
            ['category_id' => 1,
            'sku' => 'RC-ML18',
            'product_name' => 'Rice Cooker Digital 1.8 Liter',
            'unit_price' => 800000,
            'stock' => 20,
            'status' => 'Tersedia',
            ],
            ['category_id' => 2,
            'sku' => 'PS-HB05',
            'product_name' => 'Play Stasion 5',
            'unit_price' => 11000000,
            'stock' => 10,
            'status' => 'Tersedia',
            ],
            ['category_id' => 3,
            'sku' => 'SM-SU25',
            'product_name' => 'HP Samsung S25 Ultra',
            'unit_price' => 15800000,
            'stock' => 15,
            'status' => 'Tersedia',
            ],
        ];
        $this->db->table('products')->insertBatch($data);
    }
    }
}
