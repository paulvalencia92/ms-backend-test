<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Invoice();
    }


    public function save(Invoice $invoice)
    {
        $invoice->save();
        return $invoice;
    }
}
