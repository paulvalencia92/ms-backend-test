<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function index()
    {
        $invoices = $this->invoiceRepository->all();
        return response()->json($invoices, 200);
    }

    public function store(InvoiceRequest $request)
    {
        $invoice = new Invoice($request->all());
        $invoice = $this->invoiceRepository->save($invoice);
        return response()->json($invoice, 201);
    }

    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->fill($request->all());
        $invoice = $this->invoiceRepository->update($invoice);
        return response()->json($invoice, 201);
    }


    public function destroy(Invoice $invoice)
    {
        $this->invoiceRepository->delete($invoice);
        return response()->json('deleted success', 200);
    }
}
