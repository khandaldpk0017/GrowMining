<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Services\AdminPaymentsServiceAll;

class InvoiceController extends Controller
{
    // protected $taxService;

    public function show($id)
    {
        $payment = Payment::with(['order.orderproducts'])->findOrFail($id);
        
        return view('admin.invoice.invoice', compact('payment'));
    }
    public function downloadInvoice($id)
    {
        // Retrieve payment and related order products
        $payment = Payment::with('order.orderProducts')->findOrFail($id);

        // Load the view and pass the payment data
        $pdf = Pdf::loadView('admin.invoice.invoiceDownload', ['payment' => $payment]);

        // Download the PDF
        return $pdf->download('invoice_'.$payment->id.'.pdf');
    }
}
