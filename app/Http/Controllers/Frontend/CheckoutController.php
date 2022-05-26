<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function Checkout()
    {
        $old_cartitems=Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=', $item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems=Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }

    public function placorder(Request $request)
    {
        $order = new Order();
        $order->user_id=Auth::id();
        $order->name=$request->input('name');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address=$request->input('address');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->postcode=$request->input('postcode');

        //calculate total price
        $total =0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $total += $prod->product-> selling_price;
        }
        $order->total_price = $total;

        $order->tracking_no= 'shama'.rand(1111,9999);
        $order->save();
        
        $order->id;

        $cartitems=Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->product->selling_price,
            ]);
            $prod=Product::where('id',$item->prod_id)->first();
            $prod->qty=$prod->qty-$item->prod_qty;
            $prod->update();
        }

        $cartitems=Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status', "Order placed successfully");

    }
}
