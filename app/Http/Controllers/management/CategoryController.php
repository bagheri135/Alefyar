<?php

namespace App\Http\Controllers\management;

use Illuminate\Http\Request;
use App\Models\management\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view("management.category.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("management.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $message = "ایجاد دسته بندی با شکست مواجه شد";
        $validate = $request->validate([
            "name" => "required",
        ]);

        $category = new Category([
            "name" => $name
        ]);
        $result = $category->save();
        $category->replicate();

        if ($result) {
            $message = "ایجاد دسته بندی با موفقیت انجام شد";
        }
        return redirect()->back()->with(["result" => $result, "message" => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("management.category.edit",get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd("MMM");
        $message = "ویرایش دسته با شکست مواجه شد";
        $validate = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id.',id'
        ]);

        // dd($category);
        $result = $category->update($request->all());

        if ($result) {
            $message = "ایجاد دسته بندی با موفقیت انجام شد";
        }
        return redirect()->back()->with(["result" => $result, "message" => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $message = "عملیات حذف با شکست مواجه شد";
        $result = $category->delete();
        if ($result) {
            $message = "کاربر با موفقیت حذف شد";
        }
        return redirect()->back()->with(['result' => $result, 'message' => $message]);
    }
}
