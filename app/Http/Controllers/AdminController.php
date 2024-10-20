<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:200',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
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
        $data->category = $request->input('category');
        $image = $request->image;
        //if request has image
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }
        // Save the product to the database
        $data->save();

        // Redirect with Toastr success message
        flash()->success('Category Added sucessfully.');
        return redirect()->back();
    }

    public function view_product()
    {
        // Retrieve all products
        $product = Product::all();


        // Check if there are any products in the collection
        if ($product->isEmpty()) {
            flash()->error('There are currently no products.');
            return redirect()->back();
        }

        // Filter out the products that are not marked as deleted
        $activeProducts = $product->where('is_delete', 0);

        // Check if there are any active products
        if ($activeProducts->isEmpty()) {
            flash()->error('All products are deleted.');
            return redirect()->back();
        }

        // Return the view with active products



        return view('admin.products.list', compact('activeProducts'));
    }



    public function edit_product(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if (!$product) {
            flash()->error('product not found.');
            return redirect()->back();
        } else {
            return view('admin.products.edit', compact('product', 'categories'));
        }
    }

    public function update_product(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:200',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:9048', // 9MB Max
        ]);


        // Check for validation failures
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Redirect back with input and error messages
        }

        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category');


        // If a new image is uploaded, handle the file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                $oldImagePath = public_path('products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        // Save the updated product
        $product->save();
        flash()->success('Category Updated sucessfully.');
        return redirect('/view_product');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        $product->is_delete = 1;
        $product->save();

        flash()->success('Product deleted successfully!');
        return redirect()->back();
    }
}
