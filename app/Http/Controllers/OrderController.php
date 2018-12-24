<?php

namespace App\Http\Controllers;

use App\Order;

class OrderController extends Controller
{

    public function list()
    {
        $orders = Order::with('products', 'partner')->paginate(25);
        return view('order.list', ['orders' => $orders]);
    }

    public function one()
    {
        echo "ONE";
    }
}