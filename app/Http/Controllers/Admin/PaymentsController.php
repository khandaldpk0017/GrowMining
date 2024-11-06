<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminPaymentsServiceAll;

class PaymentsController extends Controller
{
    // protected $taxService;

    public function __construct(AdminPaymentsServiceAll $paymentsService)
    {
        $this->paymentsService = $paymentsService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->paymentsService->view();
        }

        return view('admin.payments.list');
    }

    public function create()
    {
        return view('admin.taxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0|max:100',
        ]);

        Tax::create($request->all());

        return redirect()->route('tax')->with('success', 'Tax created successfully.');
    }

    public function edit($id)
    {
        $tax = Tax::findOrFail($id);
        return view('admin.taxes.edit', compact('tax'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0|max:100',
        ]);

        $tax = Tax::findOrFail($id);
        $tax->update($request->all());

        return redirect()->route('tax')->with('success', 'Tax updated successfully.');
    }

    public function destroy($id)
    {
        $tax = Tax::findOrFail($id);
        $tax->delete();
    
        return response()->json(['success' => 'Tax deleted successfully.']);
    }
}
