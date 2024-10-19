<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

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
}
