<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function __constructor(){
      if(!\Session::has('cart')) \Session::put('cart', array());
    }

    //Show Cart
    public function show(){
      $cart = \Session::get('cart');
      $total = $this->total();
      return view('product.cart', compact('cart','total'));
    }

    //Add item
    public function add(Product $product){
      $cart = \Session::get('cart');
      //Lo llamo quantityCart porque sino pisa al campo quantity, de la base de
      //datos, que entiendo que es el stock de ese producto.
      $product->quantityCart = 1;
      $cart[$product->id] = $product;
      \Session::put('cart', $cart);

      return redirect()->route('cart-show');
    }

    //Delete item
    public function delete(Product $product){
      $cart = \Session::get('cart');
      unset($cart[$product->id]);
      \Session::put('cart', $cart);

      return redirect()->route('cart-show');
    }

    //Update item
    public function update(Product $product, $quantityCart){
      $cart = \Session::get('cart');
      $cart[$product->id]->quantityCart=$quantityCart;
      \Session::put('cart', $cart);

      return redirect()->route('cart-show');
    }

    //Trash cart
    public function trash(){
      //Borra todo lo que hay en la variable cart
      \Session::forget('cart');

      return redirect()->route('cart-show');
    }

    //Total
    public function total(){
      $cart = \Session::get('cart');
      $total = 0;
      foreach ($cart as $item) {
        $total += $item->price * $item->quantityCart;
      }
      return $total;
    }
}
