<?php

namespace App\Http\Controllers\Admin;

use App\Models\Salary;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminSalaryServiceAll;

class SalaryController extends Controller
{
    // protected $taxService;

    public function __construct(AdminSalaryServiceAll $taxService)
    {
        $this->taxService = $taxService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->taxService->view();
        }

        return view('admin.salary.index');
    }

    public function create()
    {
        return view('admin.salary.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'refer_count' => 'required|string|max:255',
            'salary' => 'required|numeric|',
        ]);

        Salary::create($request->all());

        return redirect()->route('salary')->with('success', 'Salary created successfully.');
    }

    public function edit($id)
    {
        $tax = Salary::findOrFail($id);
        return view('admin.salary.edit', compact('tax'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'refer_count' => 'required|string|max:255',
            'salary' => 'required|numeric|',
        ]);

        $tax = Salary::findOrFail($id);
        $tax->update($request->all());

        return redirect()->route('salary')->with('success', 'salary updated successfully.');
    }

    public function destroy($id)
    {
        $tax = Salary::findOrFail($id);
        $tax->delete();
    
        return response()->json(['success' => 'Salary deleted successfully.']);
    }
}
