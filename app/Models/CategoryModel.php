<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'category_id';
    protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'description'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getCategory($perPage, $group, $keyword = null)
    {
        $builder = $this->select('categories.*');
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('categories.name', $keyword)
                ->groupEnd();
        }

        return $builder->paginate($perPage, $group);
    }
}
