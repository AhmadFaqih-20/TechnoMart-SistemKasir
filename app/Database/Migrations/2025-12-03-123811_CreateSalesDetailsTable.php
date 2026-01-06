<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSalesDetailsTable extends Migration
{
    public function up()
     {
         $this->forge->addField([
            'sale_detail_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'sale_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'qty' => [
                'type' => 'INT',
                'null' => true
            ],
            'unit_price' => [
                'type' => 'INT',
                'null' => true
            ],
            'subtotal' => [
                'type' => 'INT'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
            ]);

            $this->forge->addKey('sale_detail_id',true);
            $this->forge->addForeignKey('sale_id','sales','sale_id','CASCADE','CASCADE');
            $this->forge->addForeignKey('product_id','products','product_id','CASCADE','CASCADE');
            $this->forge->createTable('sales_details');
    }

    public function down()
    {
        $this->forge->dropTable('sales_details');
    }
}
