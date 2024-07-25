<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminEditProductRequest;
use App\Http\Requests\Admin\AdminCreateProductRequest;

class ProductController extends Controller
{
    // import FileUploadTrait from traits
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCreateProductRequest $request)
    {
        //         dd($request->all());
        // Handle multiple file upload
        $imgPaths = $this->handleMultipleFileUpload($request, 'image');

        // معالجة البيانات الإضافية
        $additionalData = $request->additional_data ?? [];
        $additionalDataJson = json_encode($additionalData);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product = $request->product;
        $product->category_id = $request->category_id;
        $product->image = json_encode($imgPaths); // Store paths as JSON
        $product->additional_data = $additionalDataJson; // تخزين البيانات الإضافية كـ JSON

        $product->save();

        toast(__('Product has been created successfully'), 'success');

        return redirect()->route('admin.product.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        dd($id);

        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(AdminEditProductRequest $request, $id)
//    {
//        $product = Product::findOrFail($id);
//        $oldImgPaths = json_decode($product->image, true) ?? [];
//
//// Handle new image uploads and delete old images if new ones are provided
//        if ($request->hasFile('image')) {
//            $imgPaths = $this->handleMultipleFileUpload($request, 'image', $oldImgPaths);
//        } else {
//            $imgPaths = $oldImgPaths;
//        }
//
//        $product->title = $request->title;
//        $product->description = $request->description;
//        $product->price = $request->price;
//        $product->product = $request->product;
//        $product->category_id = $request->category_id;
//        $product->image = json_encode($imgPaths); // Store paths as JSON
//
//        $additionalData = $request->additional_data ?? [];
//        $additionalDataJson = json_encode($additionalData);
//        $product->additional_data = $additionalDataJson; // تخزين البيانات الإضافية كـ JSON
//
//        $product->save();
//
//        toast(__('Product has been updated successfully'), 'success');
//
//        return redirect()->route('admin.product.index');
//    }


    public function update(AdminEditProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldImgPaths = json_decode($product->image, true) ?? [];

        // Handle deleted images
        $deletedImages = json_decode($request->input('deleted_images', '[]'), true);
        $remainingImgPaths = array_filter($oldImgPaths, function ($path, $index) use ($deletedImages) {
            return !in_array($index, $deletedImages);
        }, ARRAY_FILTER_USE_BOTH);

        // Handle new image uploads
        if ($request->hasFile('image')) {
            $newImgPaths = $this->handleMultipleFileUpload($request, 'image');
            $imgPaths = array_merge($remainingImgPaths, $newImgPaths);
        } else {
            $imgPaths = $remainingImgPaths;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product = $request->product;
        $product->category_id = $request->category_id;
        $product->image = json_encode($imgPaths); // Store paths as JSON

        $additionalData = $request->additional_data ?? [];
        $additionalDataJson = json_encode($additionalData);
        $product->additional_data = $additionalDataJson; // Store additional data as JSON

        $product->save();

        toast(__('Product has been updated successfully'), 'success');

        return redirect()->route('admin.product.index');
    }


//    public function destroy(string $id)
//    {
//        $product = Product::findOrFail($id);
//        $path = $product->image;
//        $this->deleteFile($path);
//
//        $product->delete();
//        return response(['status' => 'success', 'message' => 'Deleted successfully']);
//    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // فك تشفير مسارات الصور المخزنة كـ JSON
        $imgPaths = json_decode($product->image, true);

        // حذف كل صورة
        if ($imgPaths) {
            foreach ($imgPaths as $path) {
                $this->deleteFile($path);
            }
        }

        // حذف المنتج من قاعدة البيانات
        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}
