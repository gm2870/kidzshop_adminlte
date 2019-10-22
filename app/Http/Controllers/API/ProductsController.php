<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth('api')->user();
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'price' => 'required|integer',
            'quantity' => 'required',
        ]);
        $currentPhoto = $user->photo;
        $name = time() . '.' .
            explode('/', explode(
                ':',
                substr($request->photo, 0, strpos($request->photo, ';'))
            )[1])[1];
        \Image::make($request->photo)->save(public_path('images/product/') . $name);
        $request->merge(['photo' => $name]);

        $userPhoto = public_path('images/profile/') . $currentPhoto;
        if (file_exists($userPhoto)) {
            @unlink($userPhoto);
        }
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $name,
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'status' => 'true',
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
