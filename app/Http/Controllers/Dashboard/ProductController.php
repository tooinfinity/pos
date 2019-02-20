<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::when($request->search, function ($q) use ($request) {
            return $q->where('product_name', 'like', '%' . $request->search . '%');
        })->when($request->category_id, function ($q) use ($request) {
            return $q->where('category_id', $request->category_id);
        })->latest()->paginate(5);
        return view('dashboard.product.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'codebar' => 'required|digits:13|unique:products,codebar',
            'product_name' => 'required|unique:products,product_name',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
            'min_stock' => 'required',
            'image' => 'image',

        ]);
        $request_data = $request->all();
        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/product_images/' .
                            $request->image->hashName()
                    )
                );
            $request_data['image'] = $request->image->hashName();
        }
        Product::create($request_data);
        toast('Created Successfully', 'success', 'top-right');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'codebar' => [
                'digits:13',
                'required',
                Rule::unique('products')->ignore($product->id)
            ],
            'product_name' => [
                'required',
                Rule::unique('products')->ignore($product->id)
            ],
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
            'min_stock' => 'required',
            'image' => 'image',

        ]);
        $request_data = $request->all();
        if ($request->image) {
            if ($product->image != 'product.png') {
                Storage::disk('public_uploads')->delete(
                    '/product_images/' . $product->image
                );
            }
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/product_images/' .
                            $request->image->hashName()
                    )
                );
            $request_data['image'] = $request->image->hashName();
        }
        $product->update($request_data);
        toast('Product Updated Successfully', 'success', 'top-right');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image != 'product.png') {
            Storage::disk('public_uploads')->delete(
                '/product_images/' . $product->image
            );
        }

        $product->delete();
        toast('Product deleted Successfully', 'error', 'top-right');
        return redirect()->route('product.index');
    }
}