<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Stripe;

class OrderController extends Controller
{
    public function stripe($totalPriceDiscount) {

        return view('products.stripe', compact('totalPriceDiscount'));
    }

    public function stripePost(Request $request)
    {

        $user = Auth::user();
        $userid = $user->id;

        $carts = Cart::where('user_id', '=',$userid)->get();

        $totalAmount = 0;

        foreach ($carts as $cart) {
            $order = new Order();
            $procuct = Product::find($cart->product_id);
            $order->user_id = $cart->user_id;
            $order->quantity = $cart->quantity;
            $order->product_id = $cart->product_id;
             if($procuct->discount_price == null) {
                 $order->amount = $procuct->price * $cart->quantity;
            } else {
                 $order->amount = $procuct->discount_price * $cart->quantity;;
             }

            $orderis = $order->order_number = time();

            $order->payment_status = 'Paid';
            $order->order_status = 'processing';

            $order->save();

                Mail::to($request->user())->send(new MailNotify($order));

            $cart_id = $cart->id;
            $deleteCart = Cart::find($cart_id);
            $deleteCart->delete();

            $totalAmount = $totalAmount + $order->amount;

        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
            "amount" => $totalAmount * 100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "Thanks."
        ]);

        Session::flash('success', 'Payment successfull!');

        return view('products.order_number', compact('orderis'));
    }

    public function index() {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function show(Order $order){
        return view('orders.order_details', compact('order'));
    }

    public function complete($id) {
        $order = Order::find($id);
        $order->order_status = 'Completed';
        $order->save();
        $orderProductID = $order->product_id;
        $product = Product::find($orderProductID);
        $product->quantity = $product->quantity - $order->quantity;
        $product->save();

        return redirect()->back()->with('message','Order status changed to completed.');
    }

    public function delivery($id) {
        $order = Order::find($id);
        $order->order_status = 'Delivered';
        $order->save();
        return redirect()->back()->with('message','Order status changed to delivered.');
    }

    public function destroy($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->back()->with('message','Order deleted successfully.');
    }

    public function myOrders() {
        $orders = Order::where('user_id','=',Auth::user()->id,)->get();
        return view('orders.user_orders',compact('orders'));
    }

}
