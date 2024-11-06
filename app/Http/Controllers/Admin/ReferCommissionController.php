<?php

namespace App\Http\Controllers\Admin;

use App\Models\ReferCommission;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminTaxesServiceAll;

class ReferCommissionController extends Controller
{
    // protected $taxService;

 

    
    public function edit()
    {
        $tax = ReferCommission::first();
        
        return view('admin.referCommission.edit', compact('tax'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'parent' => 'required|string|max:255',
            'parent_of_parent' => 'required|numeric|min:0|max:100',
            'grand_parent' => 'required|numeric|min:0|max:100',
        ]);

        $tax = ReferCommission::findOrFail($id);
        $tax->update($request->all());

        return redirect()->route('edit-referCommission')->with('success', 'Tax updated successfully.');
    }

    public function destroy($id)
    {
        $tax = Tax::findOrFail($id);
        $tax->delete();
    
        return response()->json(['success' => 'Tax deleted successfully.']);
    }
}
