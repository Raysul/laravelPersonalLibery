<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::orderBy('id', 'DESC')->get();
        return view("admin.category.index", compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//dd($request->all());
        $request->validate([
            'catName' => 'bail|required|max:255',
        ]);
        
       $category = new Category;
       $category->catName = $request->catName;
       $category->save();
       return redirect()->route('category.create')->with("msg", "Category insert successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $Category = Category::find($category);
        return view("admin.category.edit", compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'catName' => 'bail|required|max:255',
        ]);
        
       $category = Category::find($category);
       $category->catName = $request->catName;
       $category->save();
       return back()->with("msg", "Category insert successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $Category = Category::find($category);
        $Category->delete();
        return back();
    }
}