<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $categories = Category::all();
        return view('admin.catagory', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'CategoryName' => 'required|unique:categories',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->CategoryName = $request->CategoryName;
        $category->description = $request->description;
        $category->save();

        toastr()->timeOut(10000)->closeButton()->addsuccess('Category added successfully');

        return redirect()->back();
    }


    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();

        toastr()->timeOut(10000)->closeButton()->addsuccess('Category deleted successfully');

        return redirect()->back();
    }
}
