<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.index',[
            'datas' => Product::all()
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data = [
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'category' => $request->get('category'),
            'user_id' => $request->get('user_id'),
            'updated_at' => Carbon::now()
        ];

        Product::create($data);

        return redirect('/dashboard');
    }

    
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'category' => $request->get('category'),
            'user_id' => $request->get('user_id'),
            'updated_at' => Carbon::now()
        ];

        Product::where('id', $id)->update($data);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        Product::where('id', $id)->delete();
        return redirect('/dashboard');
    }
}
