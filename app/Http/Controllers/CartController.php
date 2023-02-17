<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
       //dd($products);
        return view('home')->with(['products' => $products]);
    }

    public function check()  {
        $cartCollection = Cart::getContent();
        //dd($cartCollection);
        return view('cart.index')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto Eliminado!');
    }

    public function add(Request $request){
            Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Producto Agregado al Carrito!');
    }

    public function update(Request $request){
        Cart::where($request->id->update($request->all()),
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }

    public function clear(){
        Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'El carrito esta vacío!');
    }

}
