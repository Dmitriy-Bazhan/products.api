<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->input();
        // $id = Product::where('id', '<>', 0)->orderBy('id', 'desc')->select('id')->first()->id;
        $product = new Product;
        $product->name = $post['name'];
        $product->price = $post['price'];
        $product->save();
        $id = $product->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move('storage/images/', $file->getClientOriginalName());
            $product->where('id', $id)->update([
                'image' => $file->getClientOriginalName(),
            ]);
        }

        return response()->json(['success' => true,], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $post = $request->input();
        Product::where('id', $id)->update([
            'name' => $post['name'],
            'price' => $post['price'],
        ]);

        return response()->json(['success' => true,], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return response()->json(['success' => true,], 204);
    }

    public function uploadImage($id, Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move('storage/images/', $file->getClientOriginalName());
            Product::where('id', $id)->update([
                'image' => $file->getClientOriginalName(),
            ]);
        }
        return response()->json(['success' => true,], 201);
    }
}
