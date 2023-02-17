<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function showProductsList()
    {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function ProductsList()
    {
        $products = $this->getAllProducts()->original['products'];
        return view('home', compact('products'));
    }

    public function getProduct(Product $product)
    {
       $product = Product::get();
       return response()->json(['product' => $product], 200);
    }

    public function getAllProducts()
    {
        $products = Product::get();
        return response()->json(['products' => $products], 200);
    }

    public function showCreateProduct()
    {
        $products = $this->getAllProducts()->original['products'];
        return view('product.create.post', compact('products'));
    }

    public function saveProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image_path' => 'required'

        ]);

        Product::saveProduct($request->all());
        return redirect()->route('product.create')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function showEditProduct(Product $product)
    {

        return view('product.edit', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image_path' => 'required'
        ]);

        $product->updateProduct($request->all());

        return redirect()->route('products.create')
            ->with('success', 'Product actualizado exitosamente');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();

        return redirect()->route('products.create')
            ->with('success', 'Producto eliminado');
    }
}
