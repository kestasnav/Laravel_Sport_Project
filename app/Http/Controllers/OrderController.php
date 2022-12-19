<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Stripe;

class OrderController extends Controller
{
    public function stripe($totalPriceDiscount) {

        return view('products.stripe', compact('totalPriceDiscount'));
    }

    public function stripePost(Request $request, $totalPriceDiscount)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalPriceDiscount * 100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "Thanks."
        ]);

        $user = Auth::user();
        $userid = $user->id;

        $carts = Cart::where('user_id', '=',$userid)->get();

        foreach ($carts as $cart) {
            $order = new Order();

            $order->user_id = $cart->user_id;
            $order->quantity = $cart->quantity;
            $order->product_id = $cart->product_id;

            $orderis = $order->order_number = rand();

            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $cart->id;
            $deleteCart = Cart::find($cart_id);
            $deleteCart->delete();

        }

        Session::flash('success', 'Payment successfull!');

        return view('products.order_number', compact('orderis'));
    }


}
