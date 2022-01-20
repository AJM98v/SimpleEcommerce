<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('DashboardPage.Tags.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        //
        if ($request->validated()){
            Tag::create($request->validated());
            return redirect()->route('tags.index')->with('message','Tag Created');
        }else{
            return redirect()->route('tags.index')->withErrors($request->validated());
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        $data = [
          'tag'=>$tag
        ];
        return view('DashboardPage.Tags.index',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
        if ($request->validated()){
            $tag->update($request->validated());
            return redirect()->route('tags.index')->with('message','Tag is Update');
        }else{
            return redirect()->route('tags.index')->withErrors($request->validated());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        return redirect()->route('tags.index')->with('message','Deleted Successfully');
    }
}
