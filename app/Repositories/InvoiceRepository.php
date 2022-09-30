<?php

namespace App\Repositories;

use DB;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Invoice();
    }


    public function all()
    {
        return $this->model->with('sender', 'receiver')->get();
    }


    public function save(Invoice $invoice)
    {
        $data = DB::transaction(function () use ($invoice) {

            foreach ($invoice->items as $item) {
                $product = Product::find($item['id']);
                $product->old_stock = $product->stock;
                $product->stock -= $item['stock'];
                $product->save();
            }
            $invoice->save();
            return $invoice;
        });

        return $data;

    }


    public function update(Invoice $invoice)
    {
        $data = DB::transaction(function () use ($invoice) {

            foreach ($invoice->items as $item) {
                $product = Product::find($item['id']);
                $stock = $product->old_stock;
                $stock = $stock - $item['stock'];
                $product->stock = $stock;
                $product->save();
            }
            $invoice->save();
            return $invoice;
        });

        return $data;
    }

    public function delete(Invoice $invoice)
    {
        $data = DB::transaction(function () use ($invoice) {

            foreach ($invoice->items as $item) {
                $product = Product::find($item['id']);
                $product->stock += $item['stock'];
                $product->save();
            }

            $invoice->delete();

        });

        return "delete";


    }


}
