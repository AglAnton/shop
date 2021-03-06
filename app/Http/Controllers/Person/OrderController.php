<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->paginate(10);
        // return view('auth.orders.index', compact('orders'));
        return view('person.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        if (!Auth::user()->orders->contains($orderId)) {
            return redirect()->back();
        }
        $order = Order::find($orderId);
        return view('person.orders.show', compact('order'));
    }
}
