<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\AdminProductsServiceAll;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    protected $adminProductsServiceAll;

    
    public function __construct(AdminProductsServiceAll $adminProductsServiceAll)
    {
        $this->adminProductsServiceAll = $adminProductsServiceAll;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->adminProductsServiceAll->view('request');
        }

        $products = Product::all();
        $products->each(function ($product) {
            $product->image_url = $product->image_url;
        });
       
        return view('admin.products.products');
    }
    public function updateStatus(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();

        return redirect()->back()->with('success', 'Product Status updated successfully.');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['success' => 'Product deleted successfully']);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function create()
    {
        $taxes = Tax::all();
        return view('admin.products.createProduct',compact('taxes'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $taxes = Tax::all();
        return view('admin.products.editProduct', compact('product','taxes'));
    }

  
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'nullable|',
            'perday_earning' => 'nullable|',
            'total_earning' => 'required|',
            'expire_days' => 'required|',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $adminId = auth()->user()->id;
        // Create the product
        $imageName="";
        if ($request->hasFile("thumbnail_image")) {
            $thumbnailImage = $request->file("thumbnail_image");
            // $thumbnailImagePath = $thumbnailImage->store('public/products/variants');
            $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
                    $thumbnailImage->storeAs('public/images', $thumbnailImageName);
            $imageName = $thumbnailImageName;
        }
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'perday_earning' => $request->input('perday_earning'),
            'status' => $request->input('status'),
            'total_earning' => $request->input('total_earning'),
            'expire_days' => $request->input('expire_days'),
            'admin_id' => $adminId,
            'thumbnail_image' => $imageName,
        ]);

        // Handle variants
       

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }
    public function update(Request $request, $id)
{
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
            'price' => 'nullable|',
            'perday_earning' => 'nullable|',
            'total_earning' => 'required|',
            'expire_days' => 'required|',
            // 'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $product = Product::findOrFail($id);
    // Update the product
    $productData=[
        'name' => $request->input('name'),
        'description' => $request->input('description'),
            'price' => $request->input('price'),
            'perday_earning' => $request->input('perday_earning'),
            'status' => $request->input('status'),
            'total_earning' => $request->input('total_earning'),
            'expire_days' => $request->input('expire_days'),
    ];
   
    if ($request->hasFile("thumbnail_image")) {
        $thumbnailImage = $request->file("thumbnail_image");
        // $thumbnailImagePath = $thumbnailImage->store('public/products/variants');
        $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
                $thumbnailImage->storeAs('public/images', $thumbnailImageName);
        $productData['thumbnail_image'] = $thumbnailImageName;
    }
    $product->update($productData);
    // Handle variants
   

   

    return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
}
}