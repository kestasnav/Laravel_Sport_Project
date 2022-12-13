<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function add_cart(Request $request, $id) {

        if(Auth::id()){

            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart();

            $cart->user_id = $user->id;

            $cart->quantity = $request->quantity;
            $cart->product_id = $product->id;

            $cart->save();

            return redirect()->back()->with('message', 'Item added to cart successfully.');

        } else {
            return redirect('login');
        }
    }

    public function cart() {

        if(Auth::id()) {
            $user = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $user)->get();
            return view('products.cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_item($id) {

        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }
}
