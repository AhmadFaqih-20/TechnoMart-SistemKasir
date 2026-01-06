<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id',
        'sku',
        'product_name',
        'unit_price',
        'stock',
        'status',
        'cover'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getProduct($perPage, $group, $keyword = null)
    {
        $builder = $this->select('products.*, categories.name')
            ->join('categories', 'categories.category_id = products.category_id');
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('categories.name', $keyword)
                ->orLike('products.sku', $keyword)
                ->orLike('products.product_name', $keyword)
                ->orLike('products.unit_price', $keyword)
                ->orLike('products.stock', $keyword)
                ->orLike('products.status', $keyword)
                ->orLike('products.cover', $keyword)
                ->groupEnd();
        }

        return $builder->paginate($perPage, $group);
    }
}
