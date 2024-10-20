<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $products = Product::all();
        return view('home.index', compact('products'));
    }

    public function login_home()
    {
        $products = Product::all();
        return view('home.index', compact('products'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);

        return view('home.products.productDetails', compact('product'));
    }

    // public function add_cart($id)
    // {

    //     $product_id = $id;

    //     $user = Auth::user();
    //     $user_id = $user->id;

    //     $data = new Cart;
    //     $data->user_id = $user_id;
    //     $data->product_id = $product_id;
    //     $data->save();

    //     flash()->success('Product added succesfully');
    //     return redirect()->back();
    // }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id;

        // Check if the cart entry already exists
        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            // If the item exists, you can increment the quantity or handle it as needed
            $cartItem->quantity += 1; // Assuming you have a quantity field
            $cartItem->save();
        } else {
            // If the item does not exist, create a new cart item
            $data = new Cart;
            $data->user_id = $user_id;
            $data->product_id = $product_id;
            $data->quantity = 1; // Set quantity to 1 for the new item
            $data->save();
        }

        flash()->success('Product added successfully');
        return redirect()->back();
    }


    public function mycart()
    {
        // Default values
        $count = 0;
        $cart = collect();

        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;

            // Get the count of items in the cart
            $count = Cart::where('user_id', $userId)->count();
            // Get all cart items for the user
            $cart = Cart::where('user_id', $userId)->get();
        }

        // Return the view with the count and cart items
        return view('home.products.cart', compact('count', 'cart'));
    }
}
