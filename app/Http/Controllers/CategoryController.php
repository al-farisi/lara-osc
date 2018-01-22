<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('categories.index',compact('categories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        // dd($request->input());

        $category = new Category();
        $category->name = $request->input('name');
        $category->display_name = $request->input('display_name');
        $category->description = $request->input('description');
        $category->status = $request->has('status');
        $category->save();

        return redirect()->route('categories.index')
                        ->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $sub_categories = SubCategory::select('display_name', 'description')->where('category_id', $id)->get();
        return view('categories.show',compact('category', 'sub_categories'))->with('i', 0);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($id);
        $category->display_name = $request->input('display_name');
        $category->description = $request->input('description');
        $category->status = $request->has('status');
        $category->save();

        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("categories")->where('id',$id)->delete();
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
