<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'employee_id';
    protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'employee_name',
        'email',
        'phone',
        'position',
        'hire_date',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getEmployees($perPage, $group, $keyword = null)
    {
        $builder = $this->select('employees.*');
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('employees.employee_name', $keyword)
                ->orLike('employees.email', $keyword)
                ->orLike('employees.position', $keyword)
                ->orLike('employees.status', $keyword)
                ->groupEnd();
        }

        return $builder->paginate($perPage, $group);
    }
}
