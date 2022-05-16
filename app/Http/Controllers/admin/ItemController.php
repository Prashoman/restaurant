<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoris = Category::all();
        return view('admin.item.create',compact('categoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category_name' => 'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate= Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/item')){
                mkdir('uploads/item', 077, true);
            }
            $image->move('uploads/item', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $item = new Item();

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->category_id = $request->category_name;
        $item->image = $imagename;

        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categoris = Category::all();
        return view('admin.item.edit', compact('item','categoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            //'image' => 'required',
            'price' => 'required',
            'category_name' => 'required'
        ]);
        $item = Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate= Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/item')){
                mkdir('uploads/item', 077, true);
            }
            $image->move('uploads/slider', $imagename);
        }else{
            $imagename = $item->image;
        }

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->category_id = $request->category_name;
        $item->image = $imagename;



        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        if(file_exists('uploads/item/'.$item->image)){
            unlink('uploads/item/'.$item->image);
        }
        $item->delete();

        return redirect()->route('item.index');
    }
}
