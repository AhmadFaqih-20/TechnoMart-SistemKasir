<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
     public function up()
    {
         $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'unit_price' => [
                'type' => 'INT',
                'null' => true
            ],
            'stock' => [
                'type' => 'INT',
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'default' => 'Tersedia'
            ],
            'cover' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
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

            $this->forge->addKey('product_id',true);
            $this->forge->addForeignKey('category_id','categories','category_id','CASCADE','CASCADE');
            $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
