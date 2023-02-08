<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.home', [
            'items' => Item::latest()->paginate(10)
        ]);
    }

    public function show(Item $item)
    {
        $isOutOfStock = Order::where('item_id', $item->id)->exists();
        return view('items.show', [
            'item' => $item,
            'isOutOfStock' => $isOutOfStock
        ]);
    }

    public function addToCart(Item $item)
    {
        $cart = session()->get('cart', []);
        $cart[$item->id] = true;
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'cart_item_add');
    }
}
