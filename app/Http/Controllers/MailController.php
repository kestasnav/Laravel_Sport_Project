<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function index(Request $request, $id) {

        $order = Order::find($id);

            Mail::to($request->user())->send(new MailNotify($order));

    }
}
