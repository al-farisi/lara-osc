<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sub_categories = SubCategory::orderBy('id','DESC')->paginate(10);
        return view('sub_categories.index',compact('sub_categories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_category = SubCategory::get();
        return view('sub_categories.create',compact('sub_category'));
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
            'name' => 'required|unique:sub_categories,name',
            'display_name' => 'required',
            'description' => 'required',
        ]);


        $sub_category = new SubCategory();
        $sub_category->name = $request->input('name');
        $sub_category->display_name = $request->input('display_name');
        $sub_category->description = $request->input('description');
        $sub_category->status = $request->input('status');
        $sub_category->category_id = $request->input('category_id');
        $sub_category->save();

        return redirect()->route('sub_categories.index')
                        ->with('success','Sub Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = SubCategory::find($id);

        return view('sub_categories.show',compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = SubCategory::find($id);

        return view('sub_categories.edit',compact('sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $sub_category = SubCategory::find($id);
        $sub_category->display_name = $request->input('display_name');
        $sub_category->description = $request->input('description');
        $sub_category->status = $request->input('status');
        $sub_category->save();

        return redirect()->route('sub_categories.index')
                        ->with('success','Sub Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("sub_categories")->where('id',$id)->delete();
        return redirect()->route('sub_categories.index')
                        ->with('success','Sub Category deleted successfully');
    }
}
