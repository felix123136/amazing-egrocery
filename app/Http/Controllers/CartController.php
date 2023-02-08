<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        $items = Item::findMany(array_keys($cart));
        return view('cart.index', [
            'items' => $items
        ]);
    }

    public function delete(Request $request, Item $item)
    {
        $cart = session()->get('cart', []);
        unset($cart[$item->id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'cart_item_removed');
    }

    public function checkout(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->withErrors(['Your cart is empty.']);
        }

        $user = auth()->user();
        $items = Item::findMany(array_keys($cart));

        DB::beginTransaction();
        try {
            foreach ($items as $item) {
                $order = new Order();
                $order->user_id = $user->id;
                $order->item_id = $item->id;
                $order->price = $item->price;
                $order->save();
            }
            DB::commit();
            session()->forget('cart');
            return redirect('/checkout');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['An error occurred while placing the order.']);
        }
    }

    public function showCheckoutPage()
    {
        return view('cart.checkout');
    }
}
