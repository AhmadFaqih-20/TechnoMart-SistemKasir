<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'customer_id';
    protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'customer_name',
        'phone',
        'email',
        'address'
    ];

    // Dates
    protected $useTimestamps = true;

   public function getCustomer($perPage, $group, $keyword = null)
    {
        $builder = $this->select('customers.*');
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('customers.customer_name', $keyword)
                ->orLike('customers.email', $keyword)
                ->orLike('customers.address', $keyword)
                ->groupEnd();
        }

        return $builder->paginate($perPage, $group);
    }
}