<?php

namespace App\Http\Controllers;

use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $foodchefs = Foodchef::all();
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('home', compact('foods', 'foodchefs', 'carts'));
    }
    public function redirects()
    {
        $foods = Food::all();
        $foodchefs = Foodchef::all();
        $usertype = Auth::user()->usertype;
        if ($usertype === '1') {
            return view('admin.adminhome');
        }
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        //    dd($carts);
        return view('home', compact('foods', 'foodchefs', 'carts'));
    }

    #cart
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $cart = new Cart();
            $foodid = $id;
            $quantity = $request->quantity;
            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        if (Auth::id() == $id) {
            return view('showcart', compact('carts'));
        } else {
            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $food_id = $id;
        $cart = Cart::where('food_id', '=', $food_id)->get();
        $cart[0]->delete();
        return redirect()->back()->with('deleted', 'Remove food in cart success!');
    }

    #order
    public function orderconfirm(Request $request)
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', '=', $user_id)->get();
        foreach ($request->foodname as $key => $foodname) {
            $order = new Order();
            $order->foodname = $foodname;
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->save();
        }
        foreach ($carts as $key => $item) {
            $item->delete();
        }
        return redirect()->back()->with('status', 'You order success!');
    }
}
