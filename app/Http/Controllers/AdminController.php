<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function view_categoty()
    {
        $data = Category::where('is_delete', 0)->get();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {

        $category = new  Category;

        $category->category_name = $request->category;

        $category->save();

        // toastr()->closeButton()->timeOut(5000)->addSuccess('categoty added');
        flash()->success('Categoty Added Successfully.');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->is_delete = 1;
        $data->save();

        flash()->success('Category deleted sucessfully.');


        return redirect()->back();
    }


    public function edit_category($id, Request $request)
    {
        $data = Category::find($id);

        if ($data && $data->is_delete == 0) {

            return view('admin.editCategory', compact('data'));
        } else {
            return redirect()->back()->with('error', 'category not found');
        }
    }


    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        flash()->success('Category Updadted sucessfully.');
        return redirect('/view_categoty');
    }

    public function add_products()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }



    public function upload_product(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:200',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required|exists:categories,id', // Ensure the category exists in the 'categories' table
            'image' => 'required|image|mimes:jpeg,png,jpg|max:9048', // 9MB Max
        ]);

        // Check for validation failures
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // If validation passes, create a new Product instance
        $data = new Product;

        // Set attributes
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->price = $request->input('price');
        $data->quantity = $request->input('quantity');
        $data->category_id = $request->input('category'); // Use 'category_id' instead of 'category_name'

        // Handle image upload
        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }

        // Save the product to the database
        $data->save();

        // Redirect with success message
        flash()->success('Product added successfully.');
        return redirect()->back();
    }

    public function view_product()
    {
        // Retrieve only active products (not marked as deleted) and paginate them
        $activeProducts = Product::orderBy('created_at', 'DESC')->where('is_delete', 0)->paginate(4);

        // Check if there are any active products
        if ($activeProducts->isEmpty()) {
            flash()->error('There are currently no active products.');
            return redirect()->back();
        }

        return view('admin.products.list', compact('activeProducts'));
    }


    public function edit_product(Request $request, $id)
    {
        $product = Product::with('category')->find($id); // Eager load the category

        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        $categories = Category::all(); // Get all categories for the dropdown

        return view('admin.products.edit', compact('product', 'categories'));
    }

    // public function update_product(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required|min:5|max:200',
    //         'description' => 'required',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|numeric',
    //         'category' => 'required',
    //         'image' => 'image|mimes:jpeg,png,jpg|max:9048', // 9MB Max
    //     ]);


    //     // Check for validation failures
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput(); // Redirect back with input and error messages
    //     }

    //     $product = Product::find($id);
    //     $product->title = $request->input('title');
    //     $product->description = $request->input('description');
    //     $product->price = $request->input('price');
    //     $product->quantity = $request->input('quantity');
    //     $product->category_id = $request->input('category');


    //     // If a new image is uploaded, handle the file upload
    //     if ($request->hasFile('image')) {
    //         // Delete the old image if it exists
    //         if ($product->image) {
    //             $oldImagePath = public_path('products/' . $product->image);
    //             if (file_exists($oldImagePath)) {
    //                 unlink($oldImagePath);
    //             }
    //         }

    //         // Upload the new image
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('products'), $imageName);
    //         $product->image = $imageName;
    //     }

    //     // Save the updated product
    //     $product->save();
    //     flash()->success('Category Updated sucessfully.');
    //     return redirect('/view_product');
    // }
    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;

        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }

        $data->save();
        flash()->success('Category Updated sucessfully.');
        return redirect(url('view_product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        //for deleting image in public folder
        $image_path = public_path('products/' . $product->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }
        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        $product->is_delete = 1;
        $product->save();

        flash()->success('Product deleted successfully!');
        return redirect()->back();
    }


    public function product_search(Request $request)
    {
        $search = $request->input('search'); // Get the search term

        // Filter active products based on search term (title and category)
        $activeProducts = Product::where('is_delete', 0)
            ->where(function ($query) use ($search) {
                // Searching only in title and category
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('category_name', 'LIKE', '%' . $search . '%'); // Adjust 'name' if your category column is named differently
                    });
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        return view('admin.products.list', compact('activeProducts', 'search'));
    }


    public function view_orders()
    {
        $datas = Order::orderBy('updated_at', 'DESC')->paginate(3);
        return view('admin.oders.list', compact('datas'));
    }
}
