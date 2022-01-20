<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ImageSlider;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
          'product'=>Product::all(),
        ];
        return view('DashboardPage.Product.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('DashboardPage.Product.Form');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return false|\Illuminate\Http\Response|string
     */
    public function store(StoreProductRequest $request)
    {
        //


//
        if ($request->validated()){
            Product::create([
                'title'=>$request->validated()['title'],
                'price'=>$request->validated()['price'],
                'info'=>$request->validated()['info'],
                'description'=>$request->validated()['description'],
                'image'=>$request->file('image')->storePublicly('public/thumbnails'),
                'user_id'=>auth()->user()->id,
            ]);

            $product = Product::where('title',$request->validated()['title'])->firstOrFail();
            foreach ($request->file('images') as $image)
            {
                $product->Slides()->create([
                    'name'=>$image->storePublicly('public/slides'),
                ]);


            }
            $product->Category()->sync($request->input('categories'));
            $product->tag()->sync($request->input('tags'));






            return redirect()->route('product.index')->with('message','Product Create Successfully');
        }else{
            return redirect()->route('product.create')->withErrors($request->validated());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $data = [
          'product'=>$product,
        ];
        return view('DashboardPage.Product.Form',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        if ($request->validated()){
           $product->update([
               'title'=>$request->validated()['title'],
               'info'=>$request->validated()['info'],
               'description'=>$request->validated()['description'],
               'price'=>$request->validated()['price'],
               'image'=>$request->file('image')->store('public/thumbnails'),
               'user_id'=>auth()->user()->id,
           ]);

           foreach ($request->file('images') as $image){
               $product->Slides()->update([
                   'name'=>$image->store('public/slides')

               ]);
           }
            $product->Category()->sync($request->input('categories'));
            $product->tag()->sync($request->input('tags'));


           return redirect()->route('product.index')->with('message','Product Update is Done');
        }else{
            return redirect()->route('product.create')->withErrors($request->validated());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index')->with('message','Product is Deleted');
    }
}
