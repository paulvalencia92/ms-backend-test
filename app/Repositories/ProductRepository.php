<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function all()
    {
        return $this->model
            ->where('stock', '>', 0)
            ->get();
    }
}
