<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
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
        //

        return view('DashboardPage.Category.index');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //

        if ($request->validated()){
            Category::create($request->validated());
            return  redirect()->route('category.index')->with('message','Category is Created');
        }else{
            return redirect()->route('category.index')->withErrors($request->validated());
        }
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $data =[
            'category'=>$category
        ];
        return view('DashboardPage.Category.index',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //

        if ($request->validated()){
            $category->update($request->validated());
            return redirect()->route('category.index')->with('message','Category is Updated');
        }else{
            return redirect()->route('category.index')->withErrors($request->validated());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('category.index')->with('message','Category is Deleted');
    }
}
