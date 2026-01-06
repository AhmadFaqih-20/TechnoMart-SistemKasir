<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSalesTable extends Migration
{
    public function up()
     {
         $this->forge->addField([
            'sale_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'invoice_number' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'unique' => true,
            ],
            'customer_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'employee_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'sale_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'default' => 'Cash'
            ],
            'total_amount' => [
                'type' => 'INT',
                'null' => true
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => 255
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

            $this->forge->addKey('sale_id',true);
            $this->forge->addForeignKey('customer_id','customers','customer_id','CASCADE','CASCADE');
            $this->forge->addForeignKey('employee_id','employees','employee_id','CASCADE','CASCADE');
            $this->forge->createTable('sales');
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
